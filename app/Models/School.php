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

	protected $afterSelect = [
		'get_user'
	];

	public function validate($DATA)
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for school name
		if (isset($DATA['school']) && empty($DATA['school'])) {
			$this->errors['school'] = "School Name field is required";
		}elseif (isset($DATA['school']) && !preg_match("/^[a-zA-Z0-9\- ]+$/", $DATA['school'])) {
			$this->errors['school'] = "Only letters allowed in School Name";
		}elseif(!empty($this->where('school',$DATA['school']))) {
			// print_r($this->where('school',$DATA['school']));
			echo 'now here';
			// die();
			$this->errors['school'] = "School already exist";
		}

		
		// check if no error
		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}

	public function generate_user_id($data)
	{
		if (isset($_SESSION['USER']->user_id)) {
			$data['user_id'] = $_SESSION['USER']->user_id;
		}
		
		return $data;
	}

	public function generate_school_id($data)
	{
		$data['school_id'] = random_string(60);
		return $data;
	}

	public function get_user($data)
	{
		$user = new User();
		foreach ($data as $key => $row) {
			$result = $user->where('user_id',$row->user_id);
			//  just like array push. its adding to the array $data
			$data[$key]->user = is_array($result) ? $result[0] : false;
		}

		return $data;
	}






} // End Class