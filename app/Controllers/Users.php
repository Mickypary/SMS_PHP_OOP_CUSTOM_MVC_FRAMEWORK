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
		
		$user = new User();
		$school_id = Auth::getSchool_id();
		$rank = Auth::getRank();
		$data = $user->query("select * from users where school_id = :school_id" ,['school_id' => $school_id]);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Staff','users'];
		$data['rows'] = $data;
		$data['crumbs'] = $crumbs;
		$this->load_view('users',$data);
	}


} // End Class