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

		if (Auth::access('reception')) {
			$school = new School();
			$rows = $school->findAll();

			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select * from schools where school like :find order by id desc";
				$arr['find'] = $find;

				$rows = $school->query($query ,$arr);
			}

			$crumbs[] = ['Dashboard','/school/public'];
			$crumbs[] = ['Schools','schools'];
			$data['rows'] = $rows;
			$data['crumbs'] = $crumbs;
			$this->load_view('schools', $data);
		}else {
			$this->load_view('access-denied');
		}
		
		
	}

	// add new school
	public function add()
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (Auth::access('super_admin')) {
			// code...
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
			$data['crumbs'] = $crumbs;
			$this->load_view('schools.add', $data);
		}else {
			$this->load_view('access-denied');
		}

		
	}

	// add new school
	public function edit($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (Auth::access('super_admin')) {
			// code...
			$school = new School();
			$row = $school->getWhere('id',$id);

			// $data['rows'] = $row;
			$crumbs[] = ['Dashboard',''];
			$crumbs[] = ['Schools','schools'];
			$crumbs[] = ['Edit','schools/edit'];
			$data['rows'] = $row;
			$data['crumbs'] = $crumbs;
			$this->load_view('schools.edit', $data);
		}else {
			$this->load_view('access-denied');
		}
	}

	// update school
	public function update($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$school = new School();
		$row = $school->getWhere('id',$id);

		if (count($_POST) > 0 && Auth::access('super_admin')) {
			if ($school->validate($_POST, $row->id)) {
				$school->update($id,$_POST);
				$this->redirect('schools');
			}else {
				$errors = $school->errors;
				$_SESSION['errors'] = $errors;
				$this->redirect('schools/edit/'.$id);
			}
		}else {
			$this->load_view('access-denied');
		}
	}

	// delete new school
	public function delete($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (Auth::access('super_admin')) {
			// code...
			$school = new School();
			$school->delete($id);
			sleep(1);
			$this->redirect('schools');
			die();
		}else {
			$this->load_view('access-denied');
		}		

		// $row = $school->where('id',$id);	
            
		// $data['row'] = $row;
		// $this->load_view('schools.delete',$data);
	}


} // End Class