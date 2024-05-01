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
				// check email address
				if($row = $user->where('email',$_POST['email'])) {
					$row = $row[0];
					//verify password
					if(password_verify($_POST['password'], $row->password)) {
						// instantiate the school object
						$school = new School();
						$school_row = $school->getWhere('school_id', $row->school_id);
						// add school_name to the row object so that school_name becomes part of the row object to be added to session array
						$row->school_name = $school_row->school;
						// $_SESSION['school_name'] = $school_row->school;
						Auth::authenticate($row);
						$this->redirect('home');
					}
				}

				// add to errors array
				$errors['email'] = "Invalid email or password!";	
			}else {
				// errors
				$errors = $user->errors;	
			}
		}

		$_SESSION['errors'] = $errors;
		$this->load_view('auth/login');
	}


} // End Class