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

		$data = $user->findAll();

		$data['rows'] = $data;

		$this->view('users',$data);
	}


} // End Class