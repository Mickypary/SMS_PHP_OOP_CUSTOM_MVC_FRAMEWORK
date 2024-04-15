<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	public function index($id = "")
	{
		$this->view('home');
	}


} // End Class