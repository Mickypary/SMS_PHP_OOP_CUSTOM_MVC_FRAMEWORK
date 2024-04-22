<?php


/**
 * User model
 */
class User extends Model
{
	// protected $table = "users";
	protected $allowedColumns = [
		'firstname', 'lastname', 'email', 'password', 'rank', 'gender', 'date'
	];

	protected $beforeInsert = [
		'generate_user_id', 'generate_school_id', 'hash_password'
	];

	public function validate($DATA)
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for firstname
		switch ($DATA) {
			case empty($DATA['firstname']):
				$this->errors['firstname'] = "Firstname field is required";
				break;

			case !preg_match("/^[a-zA-z]+$/", $DATA['firstname']):
				$this->errors['firstname'] = "Only letters allowed in firstname";
				break;
			
			default:
				// code...
				break;
		}

		// check for lastname
		switch ($DATA) {
			case empty($DATA['lastname']):
				$this->errors['lastname'] = "Lastname field is required";
				break;

			case !preg_match("/^[a-zA-z]+$/", $DATA['lastname']):
				$this->errors['lastname'] = "Only letters allowed in lastname";
				break;
			
			default:
				// code...
				break;
		}

		// check for email
		switch ($DATA) {
			case empty($DATA['email']):
				$this->errors['email'] = "Email field is required";
				break;

			case !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL):
				$this->errors['email'] = "Email is not valid";
				break;
			
			default:
				// code...
				break;
		}

		// check for gender
		$genders = ['male', 'female'];
		switch ($DATA) {
			case empty($DATA['gender']):
				$this->errors['gender'] = "Gender field is required";
				break;

			case !in_array($DATA['gender'], $genders):
				$this->errors['email'] = "Gender is not valid";
				break;
			
			default:
				// code...
				break;
		}

		// check for ranks
		$ranks = ['student', 'reception', 'lecturer', 'admin', 'super_admin'];
		switch ($DATA) {
			case empty($DATA['rank']):
				$this->errors['rank'] = "Rank field is required";
				break;

			case !in_array($DATA['rank'], $ranks):
				$this->errors['rank'] = "Rank is not valid";
				break;
			
			default:
				// code...
				break;
		}

		// check for password
		switch ($DATA) {
			case empty($DATA['password']):
				$this->errors['password'] = "Password field is required";
				break;

			case strlen($DATA['password']) < 8:
				$this->errors['password'] = "Password field cannot be less than 8 chars";
				break;

			case $DATA['password'] != $DATA['password2']:
				$this->errors['password'] = "The passwords do not match";
				break;
			
			default:
				// code...
				break;
		}

		
		// check if no error
		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}

	public function generate_user_id($data)
	{
		$data['user_id'] = $this->random_string(60);
		return $data;
	}

	public function generate_school_id($data)
	{
		if (isset($_SESSION['USER']->school_id)) {
			$data['school_id'] = $_SESSION['USER']->school_id;
		}
		
		return $data;
	}

	public function hash_password($data)
	{
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		return $data;
	}

	private function random_string($length)
	{
		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text = "";
		for ($i=0; $i < $length; $i++) { 
			$random = rand(0,61);
			$text .= $array[$random];
		}
		return $text;
	}






} // End Class