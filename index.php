<?php
// This is the main controller for phpmotors website.

// set $action to the filtered input post/get for security reasons.
$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
 if ($action == NULL){
  $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
 }

 // Get the database connection file
 require_once 'library/connections.php';
 // get the functions file from library
 require_once 'library/functions.php';
 // Get the PHP Motors model for use as needed
 require_once 'model/main-model.php';// Get the database connection file
 

// Get the array of classifications
$classifications = getClassifications();

// The commented out code below is to test the connection to the database.

// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = navList($classifications);


// The commented out code below is to test the nav bar code. 

// echo $navList;
// exit;

// switch statement reading the $action value to know what view to show, with a default of view/home.php
  switch ($action){

  case 'template':
    include 'view/template.php';
  break;

  case 'sign_in':
    include 'view/sign_in.php';
  break;

  case 'register':
    include 'view/register.php';
  break;

  case 'test':
    include 'view/500.php';
  break;

  case 'vehicle-manage':
    include 'view/vehicle-manage.php';
  break;
 
 default:
  include 'view/home.php';
}


?>