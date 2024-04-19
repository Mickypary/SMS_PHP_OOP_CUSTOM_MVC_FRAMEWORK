<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	public function index()
	{
		// $user = $this->load_model("user"); 
		$arr = ['gender' => 'male', 'firstname' => "Kareem", 'lastname' => "Jerrymiah", 'user_id' => "24fgddhcbdjd"];

		$user = new User();

		// $data = $user->where('firstname','Jane');
		// $data = $user->insert($arr);
		// $data = $user->update(1,$arr);
		// $data = $user->delete(4);
		// $data = $user->findAll();

		$this->view('home');
	}


} // End Class