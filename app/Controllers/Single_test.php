<?php

/**
 * single test controller
 */
class Single_test extends Controller
{
	
	public function index($id = '')
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		// For Pagination
			$limit = 10;	
			$pager = new Pager($limit);
			$offset = $pager->offset;

		$tests = new Tests_model();
		$row = $tests->getWhere('test_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Tests','tests'];

		if ($row) {
			$crumbs[] = [$row->test,''];
		}


		$results = false;

		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['results'] 	= $results;
		$data['errors'] 	= $errors;
		$data['pager'] 	= $pager;
		$this->load_view('single_test',$data);
	}

	


} // End Class