<?php

// namespace Model;

/**
 * Classes model
 */
class Classes_model extends Model
{
	protected $table = "classes";
	protected $allowedColumns = [
		'class', 'date'
	];

	protected $beforeInsert = [
		'generate_class_id', 'generate_user_id', 'generate_school_id',
	];

	protected $afterSelect = [
		'get_user'
	];

	public function validate($DATA)
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for class name
		if (isset($DATA['class']) && empty($DATA['class'])) {
			$this->errors['class'] = "Class Name field is required";
		}elseif (isset($DATA['class']) && !preg_match("/^[a-zA-Z0-9 ]+$/", $DATA['class'])) {
			$this->errors['class'] = "Only letters and numbers allowed in Class Name";
		}elseif(!empty($this->where('class',$DATA['class']))) {
			// print_r($this->where('class',$DATA['class']));
			echo 'now here';
			// die();
			$this->errors['class'] = "Class already exist";
		}

		
		// check if no error
		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}

	// set school_id for class to know the school the class was created in
	public function generate_school_id($data)
	{
		if (isset($_SESSION['USER']->school_id)) {
			$data['school_id'] = $_SESSION['USER']->school_id;
		}
		
		return $data;
	}

	// to know the user that created the class
	public function generate_user_id($data)
	{
		if (isset($_SESSION['USER']->user_id)) {
			$data['user_id'] = $_SESSION['USER']->user_id;
		}
		
		return $data;
	}

	// to generate a unique class id
	public function generate_class_id($data)
	{
		$data['class_id'] = random_string(60);
		return $data;
	}

	// to get the user name that created the class using the user_id to fetch from the users table
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