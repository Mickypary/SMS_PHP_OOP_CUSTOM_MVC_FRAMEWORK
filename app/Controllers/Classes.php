<?php

/**
 * classes controller
 */
class Classes extends Controller
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
		
		$classes = new Classes_model();

		$school_id = Auth::getSchool_id();

		if (Auth::access('reception')) {
			// code...
			$query = "select * from classes where school_id = :school_id order by id desc limit $limit offset $offset";
			$arr['school_id'] = $school_id;
			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select * from classes where school_id = :school_id && class like :find order by id desc limit $limit offset $offset";
				$arr['find'] = $find;
			}

				$results = $classes->query($query , $arr);
		}else {

			$class = new Classes_model();
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

			$arr['stud_classes'] = $class->query($query, $arr);
			// $results = $class->query($query, ['user_id' => Auth::getUser_id()]);
			
			// to get the actual class name and creator of the class from the classes table
			if ($arr['stud_classes']) {
				foreach ($arr['stud_classes'] as $key => $srow) {
					$results[] = $class->getWhere('class_id', $srow->class_id);
				}
				// print_r($results);
			}	
		}

		
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];
		$data['rows'] = $results;
		$data['crumbs'] = $crumbs;
		$data['pager'] = $pager;
		$this->load_view('classes', $data);
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
				if ($classes->validate($_POST, $row->id)) {
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