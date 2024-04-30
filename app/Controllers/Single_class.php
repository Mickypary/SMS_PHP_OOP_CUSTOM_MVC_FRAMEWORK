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

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : "lecturers";

		$lect = new Lecturers_model(); 

		$results = false;
		if (($page_tab == 'lecturers-add' || $page_tab == 'lecturers-remove') && count($_POST) > 0 ) {
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
				$query = "select id from class_lecturers where user_id = :user_id && class_id = :class_id limit 1";
				$check = $lect->query($query, ['user_id' => $_POST['selected'], 'class_id' => $id]);
				// print_r($check); die();
				if (!$check) {
					$arr = array();
					$arr['user_id'] = $_POST['selected'];
					$arr['class_id'] = $id;
					$arr['disabled'] = 0; 
					$arr['date'] = date("Y-m-d H:i:s");

					$lect->insert($arr);
					$this->redirect('single_class/'.$id.'?tab=lecturers');
				}else {
					$errors[] = "Lecturer already assigned in this class!";
				}
				
			}elseif (isset($_POST['deselected'])) {
				// code...
				$lecturer = $lect->where('class_id', $id, 'desc');
				$query = "delete from class_lecturers where user_id = :user_id && class_id = :class_id limit 1";
				$check = $lect->query($query, ['user_id' => $_POST['deselected'], 'class_id' => $id]);
				$this->redirect('single_class/'.$id.'?tab=lecturers');
			}
			
		}elseif($page_tab == 'lecturers') {
			// display lecturers
			$lecturer = $lect->where('class_id', $id, 'desc');
			$data['lecturers'] 		= $lecturer;
		}

		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		$this->load_view('single_class',$data);
	}


} // End Class