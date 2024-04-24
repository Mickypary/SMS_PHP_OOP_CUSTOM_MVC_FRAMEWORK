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

		$_SESSION['errors'] = $errors;
		$this->load_view('schools.add');
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
		$this->load_view('schools.edit',$data);
	}

	// update school
	public function update($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (count($_POST) > 0) {
			$school = new School();
			if ($school->validate($_POST)) {
				$school->update($id,$_POST);
				$this->redirect('schools');
			}else {
				$errors = $school->errors;
				$_SESSION['errors'] = $errors;
				$this->redirect('schools/edit/'.$id);
			}
		}
	}

	// delete new school
	public function delete($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$school = new School();
			$school->delete($id);
			sleep(1);
			$this->redirect('schools');
			die();

		// $row = $school->where('id',$id);	
            
		// $data['row'] = $row;
		// $this->load_view('schools.delete',$data);
	}


} // End Class