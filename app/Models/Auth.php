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




} // End Class