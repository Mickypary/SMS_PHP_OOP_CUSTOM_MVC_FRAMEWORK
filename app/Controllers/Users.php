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
			$data = $user->query("select * from users where school_id = :school_id && rank not in ('student') order by id desc" ,['school_id' => $school_id]);

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