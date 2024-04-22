<?php


require 'config.php';
require 'helpers.php';
require 'database.php';
require 'controller.php';
require 'app.php';
require 'model.php';


// any class trying to be instantiated will be automatically searched for in the models directory  and required
spl_autoload_register(function($classname) {
	// echo $classname . " class was not found";
	require '../app/Models/' . ucfirst($classname) . ".php";
});
