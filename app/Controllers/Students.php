<?php

/**
 * students controller
 */
class Students extends Controller
{
	
	public function index()
	{
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (Auth::access('reception')) {
			// code...
			$user = new User();
			$school_id = Auth::getSchool_id();

			// for pagination
			$limit = 10;	
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$query = "select * from users where school_id = :school_id && rank in ('student') order by id desc limit $limit offset $offset";
			$arr['school_id'] = $school_id;

			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%";
				$query = "select * from users where school_id = :school_id && rank in ('student') && (firstname like :find || lastname like :find) order by id desc limit $limit offset $offset";
				$arr['find'] = $find;
			}

			$data = $user->query($query ,$arr);

			$crumbs[] = ['Dashboard','/school/public'];
			$crumbs[] = ['Students','students'];
			$data['rows'] = $data;
			$data['crumbs'] = $crumbs;
			$data['pager'] = $pager;
			$this->load_view('students',$data);
		}else {
			$this->load_view('access-denied');
		}
		
		
	}


} // End Class