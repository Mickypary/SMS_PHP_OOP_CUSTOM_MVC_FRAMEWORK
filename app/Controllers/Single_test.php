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

		$page_tab = "view";

		$results = false;
		
		$qst = new Questions_model();
		$questions = $qst->where('test_id', $row->test_id, 'desc');
		if ($questions) {
			$total_questions = count($questions);
		}else {
			$total_questions = 0;
		}
		


		$data['row'] 			= $row;
		$data['crumbs'] 		= $crumbs;
		$data['page_tab'] 		= $page_tab;
		$data['questions'] 		= $questions;
		$data['total_questions'] 	= $total_questions;
		$data['results'] 		= $results;
		$data['errors'] 		= $errors;
		$data['pager'] 			= $pager;
		$this->load_view('single_test',$data);
	}


	public function addsubjective($id = '')
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

		$page_tab = "add_subjective";

		$qst = new Questions_model();

		if (count($_POST) > 0 ) {		

			if ($qst->validate($_POST)) {

				if ($myimage = upload_image($_FILES)) {
					$_POST['image'] = $myimage;
				}
				
				$_POST['date'] = date("Y-m-d H:i:s");
				$_POST['test_id'] = $row->test_id;
				$_POST['question_type'] = 'subjective';
				$qst->insert($_POST);
				$this->redirect('single_test/'.$row->test_id);
			}else {
				$errors = $qst->errors;
			}
		}

		$results = false;
		
		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['errors'] 	= $errors;
		$data['pager'] 	= $pager;
		$this->load_view('single_test',$data);
	}

	


} // End Class