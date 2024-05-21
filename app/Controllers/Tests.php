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
				// $a = $test->query($query , $arr);
				// $merge = array_merge($results, $a);
				// print_r($merge); die();

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
				$query = "select tests.test, tests.test_id, $mytable.* from $mytable join tests on $mytable.class_id = tests.class_id where $mytable.user_id = :user_id && $mytable.disabled = 0 && $mytable.school_id = :school_id && tests.test like :find order by id desc";
				$arr['find'] = $find;
			}

			// $arr['stud_classes'] = $test->query($query, $arr);
			$results = $test->query($query, $arr);
			// $results = $class->query($query, ['user_id' => Auth::getUser_id()]);
			
			// to get the actual class name and creator of the class from the classes table
			if ($results && !isset($_GET['find'])) {
				foreach ($results as $key => $srow) {
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

	


} // End Class