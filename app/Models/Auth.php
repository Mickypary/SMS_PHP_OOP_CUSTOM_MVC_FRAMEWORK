<?php

/**
 * 
 */
class Auth
{
	// to authenticate user
	public static function authenticate($row)
	{
		$_SESSION['USER'] = $row;
		// print_r($_SESSION); die();
	}


	public static function logout()
	{		
		if (isset($_SESSION['USER'])) {
			unset($_SESSION['USER']);
			session_destroy();
		}
	}

	public static function logged_in()
	{
		// code...
		if (isset($_SESSION['USER'])) {
			return true;
		}
		return false;
	}

	public static function user()
	{
		// code...
		if (isset($_SESSION['USER'])) {
			return $_SESSION['USER']->firstname;
		}
		return false;
	}

	public static function __callStatic($method, $param)
	{
		$prop = strtolower(str_replace("get", "", $method));
		if (isset($_SESSION['USER']->$prop)) {
			return $_SESSION['USER']->$prop;
		}
		return 'Unknown';	
	}

	public static function switch_school($id)
	{
		// code...
		if (isset($_SESSION['USER']) && $_SESSION['USER']->rank == 'super_admin' || $_SESSION['USER']->rank == 'admin' || $_SESSION['USER']->rank == 'lecturer' || $_SESSION['USER']->rank == 'reception') {
			$school =  new School();
			
			if ($row = $school->where('id',$id)) {
				$row = $row[0];
				$arr['school_id'] = $row->school_id;
				$user = new User();
				if ($user->update($_SESSION['USER']->id,$arr)) {
					$_SESSION['USER']->school_id = $row->school_id;
					$_SESSION['USER']->school_name = $row->school;
				}			

			}
			
			return true;
		}
		return false;
	}

	public static function access($rank = 'student')
	{
		// code...
		if (!isset($_SESSION['USER'])) {
			return false;
		}

		$logged_in_rank = $_SESSION['USER']->rank;
		$RANK['super_admin'] = ['super_admin','admin','lecturer','reception','student'];
		$RANK['admin'] = ['admin','lecturer','reception','student'];
		$RANK['lecturer'] = ['lecturer','reception','student'];
		$RANK['reception'] = ['reception','student'];
		$RANK['student'] = ['student'];

		if (!isset($RANK[$logged_in_rank])) {
			return false;
		}

		if (in_array($rank, $RANK[$logged_in_rank])) {
			return true;
		}

		return false;
	}

	public static function i_own_content($row)
	{
		// code...
		if (!isset($_SESSION['USER'])) {
			return false;
		}

		if (isset($row)) {
			if ($_SESSION['USER']->user_id == $row->user_id) {
				return true;
			}
		}

		$allowed[] = 'super_admin';
		$allowed[] = 'admin';
		if (in_array($_SESSION['USER']->rank, $allowed)) {
			return true;
		}
		return false;
		
	}





} // End Class