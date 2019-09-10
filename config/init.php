<?php

	/* 
		REQUIRED Config File
	*/
require_once 'config.php';

	/* Auto Loader function 
		This method loads all the function inside lib
		automatically
	*/
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}