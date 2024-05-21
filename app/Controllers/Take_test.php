<?php

/**
 * take test controller
 */
class Take_test extends Controller
{
	
	public function index($test_id = '')
	{
		$errors = array();

		if(!Auth::access('student')) {
			$this->redirect('access_denied');
		}

		// For Pagination
			$limit = 10;	
			$pager = new Pager($limit);
			$offset = $pager->offset;

		$tests = new Tests_model();
		$row = $tests->getWhere('test_id',$test_id);
		
		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Tests','tests'];

		if ($row) {
			$crumbs[] = [$row->test,''];

			// make test not editable once it comes to this controller
			$query = "update tests SET is_editable = 0 where test_id = :test_id limit 1";
			$tests->query($query, ['test_id' => $row->test_id]);
		}

		$page_tab = "view";

		$results = false;
		
		$qst = new Questions_model();
		$questions = $qst->where('test_id', $row->test_id, 'asc');

		if (is_array($questions) && $questions) {
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
		$this->load_view('take_test',$data);
	}


	public function add_question($id = '')
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

		$page_tab = "add_question";

		$question = new Questions_model();

		if (count($_POST) > 0 ) {		

			if ($question->validate($_POST)) {

				if ($myimage = upload_image($_FILES)) {
					$_POST['image'] = $myimage;
				}
				
				$_POST['date'] = date("Y-m-d H:i:s");
				$_POST['test_id'] = $row->test_id;

				if (isset($_GET['type']) && $_GET['type'] == 'objective') {
					$_POST['question_type'] = 'objective';
					$_POST[''] = 'objective';
				}elseif(isset($_GET['type']) && $_GET['type'] == 'multiple') {
					$_POST['question_type'] = 'multiple';
					// for multiple choice
					$num = 0;
					$arr = [];
						$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
						foreach ($_POST as $key => $value) {
							if (strstr($key, 'choice')) {
								$arr[$letters[$num]] = $value;
								// unset($_POST[$key]);
								$num++;
							}
						}

						$_POST['choices'] = json_encode($arr);
				}else {
					$_POST['question_type'] = 'subjective';
				}

				if ($question->insert($_POST)) {
					$_SESSION['alert-type'] = 'success';
					$_SESSION['message'] = "Inserted Successfully";
				}
				
				$this->redirect('single_test/'.$row->test_id);
			}else {
				$errors = $question->errors;
			}
		}

		$results = false;
		
		$data['row'] 		= $row;
		$data['crumbs'] 	= $crumbs;
		$data['page_tab'] 	= $page_tab;
		$data['errors'] 	= $errors;
		$data['pager'] 		= $pager;
		$this->load_view('single_test',$data);
	}


	public function edit_question($test_id, $qst_id)
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
		$row = $tests->getWhere('test_id',$test_id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Tests','tests'];

		if ($row) {
			$crumbs[] = [$row->test,''];
		}

		$page_tab = "edit_question";

		$question = new Questions_model();
		$edit_qst = $question->getWhere('id', $qst_id);

		if (count($_POST) > 0 ) {		

			if ($question->validate($_POST)) {

				if ($myimage = upload_image($_FILES)) {
					$_POST['image'] = $myimage;
					// remove old image
					$old_image = $edit_qst->image;
				}

				$type = '';
				if ($edit_qst->question_type == 'objective') {
					$type = '?type=objective';
				}elseif ($edit_qst->question_type == 'multiple') {
					$type = '?type=multiple';
					// for multiple choice
					$num = 0;
					$arr = [];
						$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
						foreach ($_POST as $key => $value) {
							if (strstr($key, 'choice')) {
								$arr[$letters[$num]] = $value;
								// unset($_POST[$key]);
								$num++;
							}
						}

						$_POST['choices'] = json_encode($arr);
				}
				// show($_POST); die();

				if ($question->update($edit_qst->id, $_POST)) {

					// remove old image
					if (isset($old_image) && file_exists($old_image)) {
						unlink($old_image);
					}

					$_SESSION['alert-type'] = 'success';
					$_SESSION['message'] = "Updated Successfully";
				}
				
				$this->redirect('single_test/edit_question/'.$row->test_id.'/'.$edit_qst->id.$type);
			}else {
				$errors = $question->errors;
			}
		}

		$results = false;
		
		$data['row'] 			= $row;
		$data['edit_qst'] 		= $edit_qst;
		$data['crumbs'] 		= $crumbs;
		$data['page_tab'] 		= $page_tab;
		$data['errors'] 		= $errors;
		$data['pager'] 			= $pager;
		$this->load_view('single_test',$data);
	}


	public function delete_question($test_id, $qst_id)
	{
		$errors = array();

		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$tests = new Tests_model();
		$row = $tests->getWhere('test_id',$test_id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Tests','tests'];

		if ($row) {
			$crumbs[] = [$row->test,''];
		}

		$page_tab = "delete_question";

		$question = new Questions_model();
		$quest = $question->getWhere('id', $qst_id);

		if (Auth::access('lecturer')) {

			if ($question->delete($qst_id)) {			
				// remove old image
				if (isset($quest->image) && file_exists($quest->image)) {
					unlink($quest->image);
				}
			}
		}		

		$this->redirect('single_test/'.$row->test_id);
	}


	


} // End Class