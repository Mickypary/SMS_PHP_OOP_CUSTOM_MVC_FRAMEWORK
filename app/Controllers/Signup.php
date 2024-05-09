<?php

/**
 * signup controller
 */
class Signup extends Controller
{
	
	public function index()
	{
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$errors = array();
		$mode = isset($_GET['mode']) ? $_GET['mode'] : '';

		if (Auth::access('admin')) {
			// code...
			if (count($_POST) > 0) {
			
				// instantiate the User Class since the class file has been included globally in the autoload file using spl_autoload_register
				$user = new User();

				if ($user->validate($_POST)) {
					$_POST['date'] = date('Y-m-d H:i:s');

					if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
						$_POST['rank'] = 'admin';
					}

					$user->insert($_POST);
					if (!empty($mode)) {
						$this->redirect($mode);
					}
					
					$this->redirect('users');
					
				}else {
					// errors
					$errors = $user->errors;	
				}
			}
		}else {
			$this->load_view('access-denied');
		}

		

		if (Auth::access('admin')) {
			// code...
			$data['errors'] = $errors;
			$data['mode'] = $mode;
			$this->load_view('auth/signup', $data);
		}else {
			$this->load_view('access-denied');
		}
		
	}


} // End Class