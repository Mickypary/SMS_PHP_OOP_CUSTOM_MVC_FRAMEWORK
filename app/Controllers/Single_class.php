<?php

/**
 * single class controller
 */
class Single_class extends Controller
{
	
	public function index($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		// For Pagination
			$limit = 10;	
			$pager = new Pager($limit);
			$offset = $pager->offset;

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : "students";

		$lect = new Lecturers_model(); 

		$user_id = Auth::getUser_id();

		$results = false;
		if($page_tab == 'lecturers') {
			// display lecturers
			$arr['class_id'] = $id;
			$query = "select * from class_lecturers where class_id = :class_id && disabled = 0 order by id desc limit $limit offset $offset ";

			// find
			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select class_lecturers.*, users.firstname, users.lastname from class_lecturers join users on class_lecturers.user_id = users.user_id where class_lecturers.class_id = :class_id && class_lecturers.disabled = 0 && (firstname like :find || lastname like :find) order by id desc limit $limit offset $offset";
				$arr['find'] = $find;
			}

			$lecturer = $lect->query($query, $arr);
			$data['lecturers'] 		= $lecturer;
		}elseif ($page_tab == 'students') {
			// display students
			$arr['class_id'] = $id;
			$query = "select * from class_students where class_id = :class_id && disabled = 0 order by id desc limit $limit offset $offset ";

			// find
			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select class_students.*, users.firstname, users.lastname from class_students join users on class_students.user_id = users.user_id where class_students.class_id = :class_id && class_students.disabled = 0 && (firstname like :find || lastname like :find) order by id desc limit $limit offset $offset";
				$arr['find'] = $find;
			}

			$students = $lect->query($query,$arr);
			$data['students'] 		= $students;
		}

		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		$data['pager'] 	= $pager;
		$this->load_view('single_class',$data);
	}

	public function lectureradd($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = "lecturer-add";

		$lect = new Lecturers_model(); 

		$results = false;
		if (count($_POST) > 0 && Auth::access('admin')) {
			// find lecturer
			if (isset($_POST['search'])) {
				if (trim($_POST['name']) != "") {
					$user = new User();
					$name = "%" . trim($_POST['name']) . "%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && rank = 'lecturer' limit 10";
					$results = $user->query($query, ['fname' => $name, 'lname' => $name]);
				}else {
					$errors[] = "You haven't typed anything!";
				}
				
			}elseif (isset($_POST['selected'])) {
				// add lecturer
				$query = "select id, disabled from class_lecturers where user_id = :user_id && class_id = :class_id limit 1";

					$check = $lect->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
					if (!$check) {
						$arr = array();
						$arr['user_id'] = $_POST['selected'];
						$arr['class_id'] = $id;
						$arr['disabled'] = 0; 
						$arr['date'] = date("Y-m-d H:i:s");

						$lect->insert($arr);
						$this->redirect('single_class/'.$id.'?tab=lecturers');
					}elseif(isset($check[0]->disabled) && $check[0]->disabled == '1') {
						$arr = array();
						$arr['disabled'] = 0; 
						$arr['updated_at'] = date("Y-m-d H:i:s");

						$lect->update($check[0]->id, $arr);
						$this->redirect('single_class/'.$id.'?tab=lecturers');
					}elseif($check[0]->disabled == '0') {
						$errors[] = "Lecturer already assigned in this class!";
					}			
				}	
			}


		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		if (Auth::access('admin')) {
			$this->load_view('single_class',$data);
		}else {
			$this->load_view('access-denied');
		}
	}

	public function lecturerremove($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = "lecturer-remove";

		$lect = new Lecturers_model(); 

		$results = false;
		if (count($_POST) > 0 && Auth::access('lecturer')) {
			// find lecturer
			if (isset($_POST['search'])) {
				if (trim($_POST['name']) != "") {
					// print_r('here'); die();
					$user = new User();
					$name = "%" . trim($_POST['name']) . "%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && rank = 'lecturer' limit 10";
					$results = $user->query($query, ['fname' => $name, 'lname' => $name]);
				}else {
					$errors[] = "You haven't typed anything!";
				}
				
			}elseif (isset($_POST['selected'])) {
				// add lecturer
				$query = "select * from class_lecturers where user_id = :user_id && class_id = :class_id && disabled = 0 limit 1";

					$check = $lect->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
					if ($check) {
						$arr['disabled'] = 1; 
						$arr['updated_at'] = date("Y-m-d H:i:s");
						$lect->update($check[0]->id, $arr);
						$this->redirect('single_class/'.$id.'?tab=lecturers');
					}else {
						$errors[] = "Ensure the lecturer is assigned before removing!";
					}							
			}
			
		}


		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		if (Auth::access('admin')) {
			$this->load_view('single_class',$data);
		}else {
			$this->load_view('access-denied');
		}
	}


	// add student
	public function studentadd($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = "student-add";

		$stud = new Students_model(); 

		$results = false;
		if (count($_POST) > 0 && Auth::access('admin') ) {
			// find student
			if (isset($_POST['search'])) {
				if (trim($_POST['name']) != "") {
					// print_r('here'); die();
					$user = new User();
					$name = "%" . trim($_POST['name']) . "%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && rank = 'student' limit 10";
					$results = $user->query($query, ['fname' => $name, 'lname' => $name]);
					// print_r($results); die();
				}else {
					$errors[] = "You haven't typed anything!";
				}
				
			}elseif (isset($_POST['selected'])) {
				// add lecturer
				// $query = "select id from class_lecturers where user_id = :user_id && class_id = :class_id limit 1";
				$query = "select id, disabled from class_students where user_id = :user_id && class_id = :class_id limit 1";

					$check = $stud->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
					// print_r($check); die();
					if (!$check) {
						$arr = array();
						$arr['user_id'] = $_POST['selected'];
						$arr['class_id'] = $id;
						$arr['disabled'] = 0; 
						$arr['date'] = date("Y-m-d H:i:s");

						$stud->insert($arr);
						$this->redirect('single_class/'.$id.'?tab=students');
					}elseif(isset($check[0]->disabled) && $check[0]->disabled == '1') {
						$arr = array();
						$arr['disabled'] = 0; 
						$arr['updated_at'] = date("Y-m-d H:i:s");

						$stud->update($check[0]->id, $arr);
						$this->redirect('single_class/'.$id.'?tab=students');
					}elseif($check[0]->disabled == '0') {
						$errors[] = "Student already assigned in this class!";
					}				
			}	
		}

		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		if (Auth::access('admin')) {
			$this->load_view('single_class',$data);
		}else {
			$this->load_view('access-denied');
		}
		
	}


	// remove student
	public function studentremove($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = "student-remove";

		$stud = new Students_model(); 

		$results = false;
		if (count($_POST) > 0 && Auth::access('admin')) {
			// find student
			if (isset($_POST['search'])) {
				if (trim($_POST['name']) != "") {
					$user = new User();
					$name = "%" . trim($_POST['name']) . "%";
					$query = "select * from users where (firstname like :fname || lastname like :lname) && rank = 'student' limit 10";
					$results = $user->query($query, ['fname' => $name, 'lname' => $name]);
					// print_r($results); die();
				}else {
					$errors[] = "You haven't typed anything!";
				}
				
			}elseif (isset($_POST['selected'])) {
				// add lecturer
				// $query = "select id from class_lecturers where user_id = :user_id && class_id = :class_id limit 1";
				$query = "select * from class_students where user_id = :user_id && class_id = :class_id && disabled = 0 limit 1";

					$check = $stud->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
					if ($check) {
						// $query = "update class_lecturers set disabled = 1 where user_id = :user_id && class_id = :class_id limit 1";
						$arr['disabled'] = 1; 
						$arr['updated_at'] = date("Y-m-d H:i:s");

						// $lect->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
						$stud->update($check[0]->id, $arr);
						$this->redirect('single_class/'.$id.'?tab=students');
					}else {
						$errors[] = "Ensure the student is assigned before removing!";
					}							
			}
		}


		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		if (Auth::access('admin')) {
			$this->load_view('single_class',$data);
		}else {
			$this->load_view('access-denied');
		}
	}


} // End Class