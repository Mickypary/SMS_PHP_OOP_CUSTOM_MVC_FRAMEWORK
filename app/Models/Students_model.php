<?php

// namespace Model;

/**
 * Students model
 */
class Students_model extends Model
{
	protected $table = "class_students";
	protected $allowedColumns = [
		'user_id', 
		'school_id', 
		'class_id', 
		'date', 
		'disabled',
	];

	protected $beforeInsert = [
		'generate_school_id',
	];

	protected $afterSelect = [
		'get_user'
	];


	// set school_id for class to know the school the class was created in
	public function generate_school_id($data)
	{
		if (isset($_SESSION['USER']->school_id)) {
			$data['school_id'] = $_SESSION['USER']->school_id;
		}
		
		return $data;
	}


	// to get the user name that created the class using the user_id to fetch from the users table
	public function get_user($data)
	{
		$user = new User();
		foreach ($data as $key => $row) {
			if (isset($row->user_id)) {
				$result = $user->where('user_id',$row->user_id);
				//  just like array push. its adding to the array $data
				$data[$key]->user = is_array($result) ? $result[0] : false;
			}
			
		}

		return $data;
	}






} // End Class