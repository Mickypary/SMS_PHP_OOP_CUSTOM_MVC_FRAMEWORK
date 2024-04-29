<?php

/**
 * single class controller
 */
class Single_class extends Controller
{
	
	public function index($id = '')
	{
		if($check = !Auth::logged_in()) {
			$this->redirect('login');
		}

		$classes = new Classes_model();
		$row = $classes->getWhere('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}

		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : "lecturers";

		if ($page_tab == 'lecturers-add' && count($_POST) > 0 ) {
			// add lecturer
			$user = new User();
			$name = "%" . $_POST['name'] . "%";
			$results = $user->query('select * from users where firstname like :firstname', ['firstname' => $name]);
		}
		$this->load_view('single_class',[
			'row' => $row,
			'crumbs' => $crumbs,
			'page_tab' => $page_tab,
			'results' => $results,
		]);
	}


} // End Class