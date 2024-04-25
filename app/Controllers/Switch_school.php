<?php

/**
 * switch school controller
 */
class Switch_school extends Controller
{
	
	public function index($id = '')
	{
		Auth::switch_school($id);
		$this->redirect('schools');
	}


} // End Class