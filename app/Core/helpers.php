<?php

function input_val($key)
{
	return isset($_POST[$key]) ? $_POST[$key] : "";

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