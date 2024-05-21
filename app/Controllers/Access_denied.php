<?php

/**
 * access-denied controller
 */
class Access_denied extends Controller
{
	
	public function index()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}


		$this->load_view('access-denied');
	}


} // End Class