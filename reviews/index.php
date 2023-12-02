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
// connect to model/reviews-model.php
require_once '../model/reviews-model.php';

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
    if($_SESSION['loggedin']){
      // $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
      $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
      $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_SPECIAL_CHARS));
      $clientId = $_SESSION['clientData']['clientId'];

      insertReview($reviewText, $invId, $clientId);
      echo "test";
      header("location: ../vehicles/?action=vehDetail&invId=$invId");
    }else {
      $message = '<p id="errorMsg">Login before leaving a review.</p>';
      include '../view/login.php';
    }
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
