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
		$row = $user->getWhere('user_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Profile','profile'];
		if ($row) {
			$crumbs[] = [$row->firstname,'profile'];
		}

		// get more info
		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : "info";

		$this->load_view('profile',[	
			'row' => $row,
			'page_tab' => $page_tab,
			'crumbs' => $crumbs,
		]);
	}


} // End Class