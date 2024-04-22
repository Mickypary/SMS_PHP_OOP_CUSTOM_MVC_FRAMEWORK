<?php

/**
 * logout controller
 */
class Logout extends Controller
{
	
	public function index()
	{
		Auth::logout();
		$this->redirect('login');
	}


} // End Class