<?php

/**
 * test controller
 */
class Tests extends Controller
{
	
	public function index()
	{
		$results = array();
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		// For Pagination
			$limit = 10;	
			$pager = new Pager($limit);
			$offset = $pager->offset;
		
		$test = new Tests_model();

		$school_id = Auth::getSchool_id();

		if (Auth::access('reception')) {
			// code...
			$query = "select * from tests where school_id = :school_id order by id desc limit $limit offset $offset";
			$arr['school_id'] = $school_id;
			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select * from tests where school_id = :school_id && test like :find order by id desc limit $limit offset $offset";
				$arr['find'] = $find;
			}

				$results = $test->query($query , $arr);

		}else {

			$test = new Tests_model();
			$mytable = "class_students";
			if (Auth::getRank() == 'lecturer') {
				$mytable = "class_lecturers";
			}

			$query = "select * from $mytable where user_id = :user_id && school_id = :school_id and disabled = 0";
			$arr['school_id'] = $school_id;
			$arr['user_id'] = Auth::getUser_id();
			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select classes.class, $mytable.* from $mytable join classes on $mytable.class_id = classes.class_id where $mytable.user_id = :user_id && $mytable.disabled = 0 && $mytable.school_id = :school_id && classes.class like :find order by id desc";
				$arr['find'] = $find;
			}

			$arr['stud_classes'] = $test->query($query, $arr);
			// $results = $class->query($query, ['user_id' => Auth::getUser_id()]);
			
			// to get the actual class name and creator of the class from the classes table
			if ($arr['stud_classes']) {
				foreach ($arr['stud_classes'] as $key => $srow) {
					$results = $test->where('class_id', $srow->class_id);
				}
				// print_r($results);
			}	
		}

		
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Tests','tests'];
		$data['test_rows'] = $results;
		$data['crumbs'] = $crumbs;
		$data['pager'] = $pager;
		$this->load_view('tests', $data);
	}

	// add new school
	public function add()
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (count($_POST) > 0 && Auth::access('lecturer') ) {

			if (isset($_POST['test'])) {

				$test_class = new Tests_model();  

				$arr = array();
				$arr['test'] = $_POST['test'];
				$arr['description'] = $_POST['description'];
				$arr['class_id'] = $id;
				$arr['disabled'] = 0; 
				$arr['date'] = date("Y-m-d H:i:s");

				$test_class->insert($arr);
				$this->redirect('tests');
	
			}	
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

			// $_SESSION['errors'] = $errors;

			$crumbs[] = ['Dashboard',''];
			$crumbs[] = ['Classes','classes'];
			$crumbs[] = ['Add','classes/add'];
			$data['errors'] = $errors;
			$data['crumbs'] = $crumbs;
			$this->load_view('tests.add', $data);

		}else {
			$this->load_view('access-denied');
		}
	}

	// add new school
	public function edit($test_id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$tests = new Tests_model();
		$row = $tests->getWhere('test_id',$test_id);

		if (Auth::access('admin')) {
			// $data['rows'] = $row;
			$crumbs[] = ['Dashboard',''];
			$crumbs[] = ['Classes','classes'];
			$crumbs[] = ['Edit','classes/edit'];
			$data['errors'] = $errors;
			$data['row'] = $row;
			$data['crumbs'] = $crumbs;
			$this->load_view('tests.edit', $data);
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

		$tests = new Tests_model();
		$row = $tests->getWhere('id',$id);

		if (Auth::access('admin') && Auth::i_own_content($row)) {
			if (count($_POST) > 0) {
				if ($tests->validate($_POST, $row->id)) {
					if ($tests->update($id,$_POST)) {
						$_SESSION['alert-type'] = 'success';
						$_SESSION['message'] = "Updated Successfully";
					}
					
					$this->redirect('tests');
				}else {
					$errors = $tests->errors;
					$_SESSION['errors'] = $errors;
					$this->redirect('tests/edit/'.$id);
				}
			}
		}else {
			$this->load_view('access-denied');
		}

		
	}

	// delete new school
	public function delete($test_id)
	{
		$errors = array();

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$tests = new Tests_model();
		$row = $tests->getWhere('test_id', $test_id);
		if (Auth::access('admin') && Auth::i_own_content($row)) {	
			if ($tests->delete($row->id)) {
				$_SESSION['alert-type'] = 'success';
				$_SESSION['message'] = "Deleted Successfully";
			}
			
			sleep(1);
			$this->redirect('tests');
			die();
		}else {
			$this->load_view('access-denied');
		}

		

		// $row = $school->where('id',$id);	
            
		// $data['row'] = $row;
		// $this->load_view('schools.delete',$data);
	}


} // End Class