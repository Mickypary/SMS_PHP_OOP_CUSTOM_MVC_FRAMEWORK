<?php

/**
 * schools controller
 */
class Schools extends Controller
{
	
	public function index()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}
		
		$school = new School();

		$data = $school->findAll();

		$this->view('schools',[
			'rows' => $data,
		]);
	}

	// add new school
	public function add()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}
		
		$school = new School();

		$data = $school->findAll();

		

		$this->view('schools.add',[
			'rows' => $data,
		]);
	}


} // End Class