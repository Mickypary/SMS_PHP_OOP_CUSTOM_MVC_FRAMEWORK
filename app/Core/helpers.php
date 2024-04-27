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
   		$image = $image_url;
   }

   return $image;
}