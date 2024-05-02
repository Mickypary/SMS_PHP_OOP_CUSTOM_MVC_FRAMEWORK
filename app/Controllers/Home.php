<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	public function index()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}


		$this->load_view('home');
	}


} // End Class