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

		$data['rows'] = $data;
		$this->load_view('schools',$data);
	}

	// add new school
	public function add()
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (count($_POST) > 0) {
			$school = new School();
			if ($school->validate($_POST)) {
				$_POST['date'] = date('Y-m-d H:i:s');
				$school->insert($_POST);
				$this->redirect('schools');
			}else {
				$errors = $school->errors;
			}
		}
		
		
		
		$data['errors'] = $errors;
		$this->load_view('schools.add',$data);
	}

	// add new school
	public function edit($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$school = new School();
		$row = $school->where('id',$id);

		$data['rows'] = $row;
		$data['errors'] = $errors;
		$this->load_view('schools.edit',$data);
	}

	// add new school
	public function update($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (count($_POST) > 0) {
			$school = new School();
			if ($school->validate($_POST)) {
				$result = $school->update($id,$_POST);
				$this->redirect('schools');
			}else {
				$errors = $school->errors;
			}
		}
			
		$data['errors'] = $errors;
		$this->load_view('schools.add',$data);
	}


} // End Class