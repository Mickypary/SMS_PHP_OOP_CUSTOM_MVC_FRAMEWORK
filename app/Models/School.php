<?php


/**
 * School model
 */
class School extends Model
{
	// protected $table = "users";
	protected $allowedColumns = [
		'school', 'date'
	];

	protected $beforeInsert = [
		'generate_school_id', 'generate_user_id'
	];

	public function validate($DATA)
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for school name
		if (isset($DATA['school']) && empty($DATA['school'])) {
			$this->errors['school'] = "School field is required";
		}elseif (isset($DATA['school']) && !preg_match("/^[a-zA-z]+$/", $DATA['school'])) {
			$this->errors['school'] = "Only letters allowed in School Name";
		}

		
		// check if no error
		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}

	public function generate_user_id($data)
	{
		$data['user_id'] = random_string(60);
		return $data;
	}

	public function generate_school_id($data)
	{
		$data['school_id'] = random_string(60);
		return $data;
	}






} // End Class