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

		$rows = $classes->findAll('desc');

		// $data['rows'] = $data;
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];
		$this->load_view('classes',[
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
	}

	// add new school
	public function edit($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->where('id',$id);

		// $data['rows'] = $row;
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Classes','classes'];
		$crumbs[] = ['Edit','classes/edit'];
		$this->load_view('classes.edit',[
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
	}

	// delete new school
	public function delete($id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
			$classes->delete($id);
			sleep(1);
			$this->redirect('classes');
			die();

		// $row = $school->where('id',$id);	
            
		// $data['row'] = $row;
		// $this->load_view('schools.delete',$data);
	}


} // End Class