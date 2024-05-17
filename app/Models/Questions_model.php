<?php

// namespace Model;

/**
 * Tests model
 */
class Questions_model extends Model
{
	protected $table = "test_questions";
	protected $allowedColumns = [
		'test_id',
		'question',
		'date',
		'question_type',
		'correct_answer',
		'choices',
		'user_id',
		'image',
	];

	protected $beforeInsert = [
		'generate_user_id',
	];

	protected $afterSelect = [
		'get_user'
	];

	public function validate($DATA, $id ='')
	{
		// to be sure the errors property in Model class is refreshed with empty value
		$this->errors = array();

		// check for class name
		if (isset($DATA['question']) && empty($DATA['question'])) {
			$this->errors['question'] = "Question cannot be empty";
		}

		
		// check if no error
		if (count($this->errors) == 0) {
			return true;
		}


		return false;

	}


	// to know the user that created the class
	public function generate_user_id($data)
	{
		if (isset($_SESSION['USER']->user_id)) {
			$data['user_id'] = $_SESSION['USER']->user_id;
		}
		
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