<?php

/**
 * classes controller
 */
class Classes extends Controller
{
	
	public function index()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		
		$classes = new Classes_model();

		$school_id = Auth::getSchool_id();
		$results = $classes->query("select * from classes where school_id = :school_id order by id desc" ,['school_id' => $school_id]);

		// $data['rows'] = $data;
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];
		$this->load_view('classes',[
			'rows' => $results,
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

		if (Auth::access('admin')) {
			if (count($_POST) > 0) {
				$classes = new Classes_model();  
				if ($classes->validate($_POST)) {
					$_POST['date'] = date('Y-m-d H:i:s');
					$classes->insert($_POST);
					$this->redirect('classes');
				}else {
					$errors = $classes->errors;
				}
			}

			$_SESSION['errors'] = $errors;
			$crumbs[] = ['Dashboard',''];
			$crumbs[] = ['Classes','classes'];
			$crumbs[] = ['Add','classes/add'];
			$this->load_view('classes.add',[
				'crumbs' => $crumbs,
			]);

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

		$classes = new Classes_model();
		$row = $classes->getWhere('id',$id);
		if (Auth::access('admin') && Auth::i_own_content($row)) {
			// $data['rows'] = $row;
			$crumbs[] = ['Dashboard',''];
			$crumbs[] = ['Classes','classes'];
			$crumbs[] = ['Edit','classes/edit'];
			$data['rows'] = $row;
			$data['crumbs'] = $crumbs;
			$this->load_view('classes.edit', $data);
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

		$classes = new Classes_model();
		$row = $classes->getWhere('id',$id);
		if (Auth::access('admin') && Auth::i_own_content($row)) {
			if (count($_POST) > 0) {
				$classes = new Classes_model();
				if ($classes->validate($_POST)) {
					$classes->update($id,$_POST);
					$this->redirect('classes');
				}else {
					$errors = $classes->errors;
					$_SESSION['errors'] = $errors;
					$this->redirect('classes/edit/'.$id);
				}
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

		$classes = new Classes_model();
		$row = $classes->getWhere('id', $id);
		if (Auth::access('admin') && Auth::i_own_content($row)) {	
			$classes->delete($id);
			sleep(1);
			$this->redirect('classes');
			die();
		}else {
			$this->load_view('access-denied');
		}

		

		// $row = $school->where('id',$id);	
            
		// $data['row'] = $row;
		// $this->load_view('schools.delete',$data);
	}


} // End Class