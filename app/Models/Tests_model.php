<?php

// namespace Model;

/**
 * Tests model
 */
class Tests_model extends Model
{
	protected $table = "tests";
	protected $allowedColumns = [
		'test',
		'date',
		'class_id',
		'description',
		'disabled',
	];

	protected $beforeInsert = [
		'generate_user_id', 
		'generate_school_id',
		'generate_test_id',
	];

	protected $afterSelect = [
		'get_user'
	];

	public function validate($DATA, $id ='')
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for class name
		if (isset($DATA['test']) && empty($DATA['test'])) {
			$this->errors['test'] = "Test Name field is required";
		}elseif (isset($DATA['test']) && !preg_match("/^[a-zA-Z0-9 ]+$/", $DATA['test'])) {
			$this->errors['test'] = "Only letters and numbers allowed in Test Name";
		}else {
			if (trim($id) == '') {
				if ($this->getWhere('test',$DATA['test'])) {
					$this->errors['test'] = "Test already exist";
				}
			}else {
				if ($this->query("select test from $this->table where test = :test && id != :id", ['test' => $DATA['test'], 'id' => $id])) {
					$this->errors['test'] = "Test already exist";
				}
			}
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
	public function generate_test_id($data)
	{
		$data['test_id'] = random_string(60);
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