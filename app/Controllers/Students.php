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
			$data = $user->query("select * from users where school_id = :school_id && rank in ('student') order by id desc" ,['school_id' => $school_id]);

			$crumbs[] = ['Dashboard','/school/public'];
			$crumbs[] = ['Students','students'];
			$data['rows'] = $data;
			$data['crumbs'] = $crumbs;
			$this->load_view('students',$data);
		}else {
			$this->load_view('access-denied');
		}
		
		
	}


} // End Class