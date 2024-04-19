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
		if (!preg_match("/^[a-zA-z ]+$/", $DATA['firstname']) ) {
			$this->errors[] = "Only letters allowed in firstname";
		}

		// check for password
		if ($DATA['password'] != $DATA['password2']) {
			$this->errors[] = "The passwords do not match";
		}

		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}






} // End Class