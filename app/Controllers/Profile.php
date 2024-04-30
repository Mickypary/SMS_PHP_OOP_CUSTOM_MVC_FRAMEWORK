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
		$row = $user->getWhere('user_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Profile','profile'];
		if ($row) {
			$crumbs[] = [$row->firstname,'profile'];
		}
		$this->load_view('profile',[
			'row' => $row,
			'crumbs' => $crumbs,
		]);
	}


} // End Class