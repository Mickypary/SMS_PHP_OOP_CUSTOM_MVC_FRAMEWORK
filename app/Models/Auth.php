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





} // End Class