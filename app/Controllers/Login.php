<?php

/**
 * login controller
 */
class Login extends Controller
{
	
	public function index()
	{
		$errors = array();

		if (count($_POST) > 0) {
			
			// instantiate the User Class since the class file has been included globally in the autoload file using spl_autoload_register
			$user = new User();

			if ($user->validate($_POST)) {
				if($row = $user->where('email',$_POST['email'])) {
					Auth::authenticate($row);
					$this->redirect('home');
				}else {
					$errors['email'] = "Wrong email or password!";
				}
			}else {
				print_r($errors);
				echo 'errors';
				// errors
				$errors = $user->errors;	
			}
		}

		$this->view('auth/login',['errors' => $errors]);
	}


} // End Class