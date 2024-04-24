<?php


/**
 *  main controller
 */
class Controller
{
	
	public function load_view($view, $data = array())
	{
		if (is_array($data)) {
			extract($data);
		}
		
		// code...
		if (file_exists("../app/Views/".$view.".view.php")) {		
			require "../app/Views/".$view.".view.php";
		}else {
			require "../app/Views/404.view.php";
		}
	}


	public function load_model($model)
	{
		if (file_exists("../app/Models/".ucfirst($model).".php")) {
			require "../app/Models/".ucfirst($model).".php";
			return $model = new $model();
		}
		
		return false;
	}


	public function redirect($link)
	{
		header("Location: ".ROOT."/".trim($link,"/"));
		die();
	}



} // End Class