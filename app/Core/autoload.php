<?php


require 'config.php';
require 'helpers.php';
require 'database.php';
require 'controller.php';
require 'app.php';
require 'model.php';


spl_autoload_register(function($classname) {
	// echo $classname . " class was not found";
	require '../app/Models/' . ucfirst($classname) . ".php";
});
