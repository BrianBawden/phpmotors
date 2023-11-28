<?php
// This is the reviews controller.

session_start();

$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == Null){
  $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

// Get the database connection file
require_once '../library/connections.php';
// get the functions file from library
require_once '../library/functions.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';// Get the database connection file
// Get the accounts model
require_once '../model/accounts-model.php';
// connect to model/vehicles-model.php
require_once '../model/vehicles-model.php';

// Get the array of classifications from the database for the navbar.
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = navList($classifications);

// if user logged in display 'welcome userName' in header
if(isset($_SESSION['clientData'])){
  $sessionFirstname = $_SESSION['clientData']['clientFirstname'];
}


switch ($action){

  case 'newReview':
    echo "newReview";
  break;

  case 'newReview':
    echo "newReview";
  break;

  case 'newReview':
    echo "newReview";
  break;

  case 'newReview':
    echo "newReview";
  break;

  case 'newReview':
    echo "newReview";
  break;

  default:
   echo "admin or home(if not logged in)";
}


?>
