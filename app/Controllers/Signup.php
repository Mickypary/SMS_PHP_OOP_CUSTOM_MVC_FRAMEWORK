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
				$arr['firstname'] = $_POST['firstname'];
				$arr['lastname'] = $_POST['lastname'];
				$arr['email'] = $_POST['email'];
				$arr['gender'] = $_POST['gender'];
				$arr['rank'] = $_POST['rank'];
				$arr['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT) ;
				$arr['date'] = date('Y-m-d H:i:s');
				$user->insert($arr);
				$this->redirect('login');
			}else {
				// errors
				$errors = $user->errors;
				
			}
		}
		// var_dump($errors);

		$this->view('auth/signup', [
			'errors' => $errors,
		]);
	}


} // End Class