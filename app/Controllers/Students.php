<?php

/**
 * students controller
 */
class Students extends Controller
{
	
	public function index()
	{
		$this->load_view('student');
	}


} // End Class