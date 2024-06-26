<?php

/**
 * profile controller
 */
class Profile extends Controller
{
	
	public function index($user_id = '')
	{
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$user = new User();
		$user_id = trim($user_id == '') ? Auth::getUser_id() : $user_id;
		$row = $user->getWhere('user_id',$user_id);
		if ($row->rank == 'student') {
			$student = new Students_model();
			$student_class_assign = $student->getWhere('user_id',$user_id);
			if (isset($student_class_assign->class_id)) {
				$query = "select users.*, classes.class from users join class_students on users.user_id = class_students.user_id join classes on classes.class_id = class_students.class_id where users.user_id = :user_id";
				$row = $user->query($query, ['user_id' => $user_id]);
				$row = $row[0];
			}else {
				$row->class = 'Not Assigned to class yet';
			}
		}
		

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Profile','profile'];
		if ($row) {
			$crumbs[] = [$row->firstname,'profile'];
		}

		// get more info using $page_tab
		$data['page_tab'] = isset($_GET['tab']) ? $_GET['tab'] : "info";

		if ($data['page_tab'] == 'classes' && $row) {
			// note the query function in database class can work using any model instances irrespective of the table you are loading from since its inherited by the class extension of the instantiated model
			$class = new Classes_model();
			$mytable = "class_students";
			if ($row->rank == 'lecturer') {
				$mytable = "class_lecturers";

			}
			$query = "select * from $mytable where user_id = :user_id and disabled = 0";
			$data['stud_classes'] = $class->query($query, ['user_id' => $user_id]);
			// print_r($data['stud_classes']); die();
			
			$data['student_classes'] = array();
			if ($data['stud_classes']) {
				foreach ($data['stud_classes'] as $key => $srow) {
					$data['student_classes'][] = $class->getWhere('class_id', $srow->class_id);
				}
			}
		}elseif($data['page_tab'] == 'tests' && $row) {
			$class = new Classes_model();
			$mytable = "class_students";
			if ($row->rank == 'lecturer') {
				$mytable = "class_lecturers";

			}
			$query = "select * from $mytable where user_id = :user_id and disabled = 0";
			$data['stud_classes'] = $class->query($query, ['user_id' => $user_id]);
			
			$data['student_classes'] = array();
			if ($data['stud_classes']) {
				foreach ($data['stud_classes'] as $key => $srow) {
					$data['student_classes'][] = $class->getWhere('class_id', $srow->class_id);
				}
			}

			// Collect all the class ids
			$class_ids = [];
			foreach ($data['student_classes'] as $key => $classrow) {
				$class_ids[] = $classrow->class_id;
			}

			$class_ids = "'" . implode("','", $class_ids) . "'";
			$test = new Tests_model();
			$query = "select * from tests where class_id IN ($class_ids) and disabled = 0";
			$data['test_rows'] = $test->query($query);
			
		}
		
		$data['row'] = $row;
		$data['crumbs'] = $crumbs;
		if (Auth::access('reception') || Auth::i_own_content($row)) {
			$this->load_view('profile', $data);
		}else {
			$this->load_view('access-denied');
		}
		
	}

	public function edit($user_id)
	{
		$errors = array();
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$user = new User();
		$id = trim($user_id == '') ? Auth::getUser_id() : $user_id;
		$row = $user->getWhere('user_id',$id);

		$data['row'] = $row;
		// $data['crumbs'] = $crumbs;
		$data['errors'] = $errors;
		if (Auth::access('admin') || Auth::i_own_content($row)) {
			$this->load_view('profile_edit', $data);
		}else {
			$this->load_view('access-denied');
		}
	}

	public function update($user_id)
	{

		$errors = array();
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$user = new User();
		$id = trim($user_id == '') ? Auth::getUser_id() : $user_id;
		$row = $user->getWhere('user_id',$id);

		if (count($_POST) > 0 && (Auth::access('admin') || Auth::i_own_content($row))) {

			// unset passwords so we can save without the password field
			if (trim($_POST['password']) == '') {
				unset($_POST['password']);
				unset($_POST['password2']);
			}

			if ($user->validate($_POST, $row->id)) {

				// check for files upload
				// print_r($_FILES); die();
				if ($myimage = upload_image($_FILES)) {
					$_POST['profile_image'] = $myimage;
				}
				
				// Note i have to create a funtion upload_image in helper to put the below function for reususabilty
				// if (count($_FILES['image']) > 0) {
				// 	$allowed[] = "image/jpeg";
				// 	$allowed[] = "image/jpg";
				// 	$allowed[] = "image/png";

				// 	if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
				// 		// code...
				// 		$folder = 'uploads/';
				// 		if (!file_exists($folder)) {
				// 			mkdir($folder, 0777, true);
				// 		}
				// 		$destination = $folder.$_FILES['image']['name'];
				// 		move_uploaded_file($_FILES['image']['tmp_name'], $destination);
				// 		$_POST['profile_image'] = $destination;
				// 	}
				// }

				if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
					$_POST['rank'] = 'admin';
				}

				// code...
				if ($user->update($row->id, $_POST)) {
					$_SESSION['alert-type'] = 'success';
					$_SESSION['message'] = "Updated Successfully";
				}
				
				$this->redirect('profile/'.$user_id);

			}else {
				$errors = $user->errors;
				// $_SESSION['errors'] = $errors;
				// $this->redirect('profile/edit/'.$user_id);
			}
			
		}else {
			$this->load_view('access-denied');
		}

		$data['errors'] = $errors;
		$data['row'] = $row;

		if (Auth::access('admin') || Auth::i_own_content($row)) {
			$this->load_view('profile_edit', $data);
		}else {
			$this->load_view('access-denied');
		}
	}


} // End Class