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
			
			// instantiate the User Class since the class file has been included globally in the autoload file using spl_autoload_register
			$user = new User();

			if ($user->validate($_POST)) {
				$_POST['date'] = date('Y-m-d H:i:s');
				$user->insert($_POST);
				$this->redirect('login');
			}else {
				// errors
				$errors = $user->errors;	
			}
		}
		// var_dump($errors);

		$this->load_view('auth/signup', [
			'errors' => $errors,
		]);
	}


} // End Class