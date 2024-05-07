<?php

/**
 * users controller
 */
class Users extends Controller
{
	
	public function index()
	{

		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		if (Auth::access('admin')) {
			// code...
			$user = new User();
			$school_id = Auth::getSchool_id();
			$rank = Auth::getRank();
			$arr['school_id'] = $school_id;
			$query = "select * from users where school_id = :school_id && rank not in ('student') order by id desc";

			if (isset($_GET['find'])) {
				$find = "%" . $_GET['find'] . "%"; 
				$query = "select * from users where school_id = :school_id && rank not in ('student') && (firstname like :find || lastname like :find) order by id desc";
				$arr['find'] = $find;
			}

			$data = $user->query($query ,$arr);

			$crumbs[] = ['Dashboard','/school/public'];
			$crumbs[] = ['Staff','users'];
			$data['rows'] = $data;
			$data['crumbs'] = $crumbs;
			$this->load_view('users',$data);
		}else {
			$this->load_view('access-denied');
		}
		
	}


} // End Class