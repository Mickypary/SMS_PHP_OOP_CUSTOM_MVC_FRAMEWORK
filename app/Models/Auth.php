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
		if (isset($_SESSION['USER']) && $_SESSION['USER']->rank == 'super_admin') {
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





} // End Class