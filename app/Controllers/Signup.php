<?php

/**
 * signup controller
 */
class Signup extends Controller
{
	
	public function index()
	{
		$errors = array();
		$mode = isset($_GET['mode']) ? $_GET['mode'] : '';

		if (count($_POST) > 0) {
			
			// instantiate the User Class since the class file has been included globally in the autoload file using spl_autoload_register
			$user = new User();

			if ($user->validate($_POST)) {
				$_POST['date'] = date('Y-m-d H:i:s');
				$user->insert($_POST);
				if (!empty($mode)) {
					$this->redirect($mode);
				}
				$this->redirect('user');
				
			}else {
				// errors
				$errors = $user->errors;	
			}
		}
		// var_dump($errors);

		$this->load_view('auth/signup', [
			'errors' => $errors,
			'mode' => $mode,
		]);
	}


} // End Class