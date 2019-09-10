<?php include_once 'config/init.php' ?>

<?php

/*
	creating instance of the Template class
*/

$template = new Template('templates/index.html.php');


/* 
	Passing dynamic value to the template
*/

$template->someText = "Welcome to Crimson Template";
/* 
	echo the template to the browser 
*/
echo $template;