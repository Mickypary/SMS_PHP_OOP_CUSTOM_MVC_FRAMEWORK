<?php

/**
 * profile controller
 */
class Profile extends Controller
{
	
	public function index($id = '')
	{
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$user = new User();
		$id = trim($id == '') ? Auth::getUser_id() : $id;
		// print_r($id);
		$row = $user->getWhere('user_id',$id);

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
			$data['stud_classes'] = $class->query($query, ['user_id' => $id]);
			// print_r($data['stud_classes']); die();
			
			$data['student_classes'] = array();
			if ($data['stud_classes']) {
				foreach ($data['stud_classes'] as $key => $srow) {
					$data['student_classes'][] = $class->getWhere('class_id', $srow->class_id);
				}
			}
		}
		
		$data['row'] = $row;
		$data['crumbs'] = $crumbs;
		if (Auth::access('reception') || Auth::i_own_content($row)) {
			$this->load_view('profile', $data);
		}else {
			$this->load_view('access-denied');
		}
		
	}


} // End Class