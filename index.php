<?php
// This is the main controller for phpmotors website.

// set $action to the filtered input post/get for security reasons.
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }


// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';// Get the database connection file


// Get the array of classifications
$classifications = getClassifications();

// The commented out code below is to test the connection to the database.

// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

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
 
 default:
  include 'view/home.php';
}


?>