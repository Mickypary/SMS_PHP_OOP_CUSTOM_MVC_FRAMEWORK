<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	public function index($id = "")
	{
		echo $this->view('home');
	}


} // End Class