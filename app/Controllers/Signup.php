<?php

/**
 * signup controller
 */
class Signup extends Controller
{
	
	public function index()
	{
		$errors = array();

		if (count($_POST) > 0) {
			
			$user = new User();

			if ($user->validate($_POST)) {
				
				$this->redirect('login');
			}else {
				// errors
				$errors = $user->errors;
				print_r($errors);
			}
		}

		$this->view('auth/signup', $errors);
	}


} // End Class