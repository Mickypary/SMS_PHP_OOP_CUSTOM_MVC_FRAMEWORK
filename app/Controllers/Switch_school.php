<?php

/**
 * switch school controller
 */
class Switch_school extends Controller
{
	
	public function index($id = '')
	{
		if (Auth::access('super_admin')) {
			// code...
			Auth::switch_school($id);
		}else {
			$this->load_view('access-denied');
		}
		
		$this->redirect('schools');
	}


} // End Class