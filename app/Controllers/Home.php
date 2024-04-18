<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	public function index()
	{
		// $user = $this->load_model("user"); 

		$user = new User();

		// $data = $user->where('firstname','Jane');
		$data = $user->findAll();

		$this->view('home',$data);
	}


} // End Class