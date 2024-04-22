<?php


/**
 * User model
 */
class User extends Model
{
	// protected $table = "users";

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






} // End Class