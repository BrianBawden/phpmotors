<?php
// This is the main controller for phpmotors website.

// set $action to the filered input post/get for security reasons.
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }


// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();

// The commented out code below is to test the connection to the database.

// var_dump($classifications);
// 	exit;


// switch statement reading the $action value to know what view to show, with a default of view/home.php
 switch ($action){
 case 'template':
    include 'view/template.php';
  
  break;
 
 default:
  include 'view/home.php';
}


?>