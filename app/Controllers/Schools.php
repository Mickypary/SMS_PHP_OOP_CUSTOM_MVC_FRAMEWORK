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

		$rows = $school->findAll();

		// $data['rows'] = $data;
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Schools','schools'];
		$this->load_view('schools',[
			'rows' => $rows,
			'crumbs' => $crumbs,
		]);
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
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Add','schools/add'];
		$this->load_view('schools.add',[
			'crumbs' => $crumbs,
		]);
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

		// $data['rows'] = $row;
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Edit','schools/edit'];
		$this->load_view('schools.edit',[
			'rows' => $row,
			'crumbs' => $crumbs,
		]);
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