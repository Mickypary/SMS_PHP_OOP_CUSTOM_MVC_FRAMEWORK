<?php

function input_val($key, $default = "")
{
	if (isset($_POST[$key])) {
		return $_POST[$key];
	}

	return $default;
}

function select_val($key, $value='')
{
	if (isset($_POST[$key])) {	
		if ($_POST[$key] == $value) {
			return "selected";
		}
	}	

	return "";
}

function esc($data)
{
	return htmlspecialchars($data);
}

function random_string($length)
{
	$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$text = "";
	for ($i=0; $i < $length; $i++) { 
		$random = rand(0,61);
		$text .= $array[$random];
	}
	return $text;
}

function format_date($date)
{
	return date('l jS M, Y', strtotime($date));
}

function show($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function get_image($image_url, $extra = '')
{

	if (!file_exists($image_url)) {
   		if ($extra == 'female') {
   			$image = ASSETS . "/user_female.jpg";
   		}else {
   			$image = ASSETS . "/user_male.jpg";
   		}				   		
   }else {
   		$class = new Image();
   		// $image = ROOT . '/'. $image_url;
   		$image = ROOT . '/'. $class->profile_thumb($image_url);
   }

   return $image;
}

 function views_path($view)
{
	// code...
	if (file_exists("../app/Views/".$view.".inc.php")) {		
		return "../app/Views/".$view.".inc.php";
	}else {
		return "../app/Views/404.view.php";
	}
}

function upload_image($FILES) 
{
	if (count($FILES['image']) > 0) {
		$allowed[] = "image/jpeg";
		$allowed[] = "image/jpg";
		$allowed[] = "image/png";

		if ($FILES['image']['error'] == 0 && in_array($FILES['image']['type'], $allowed)) {
			// code...
			$folder = 'uploads/';
			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
			}
			$destination = $folder. time() . '_' . $FILES['image']['name'];
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return $destination;
		}
	}

	return false;
}