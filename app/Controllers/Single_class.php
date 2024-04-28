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
		$row = $classes->whereRow('class_id',$id);

		$crumbs[] = ['Dashboard','/school/public'];
		$crumbs[] = ['Classes','classes'];

		if ($row) {
			$crumbs[] = [$row->class,''];
		}
		$this->load_view('single_class',[
			'row' => $row,
			'crumbs' => $crumbs,
		]);
	}


} // End Class