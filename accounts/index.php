<?php
// This is the accounts controller for phpmotors website.

// set $action to the filter input post/get for security reasons.
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }


// Get the database connection file
require_once '../library/connections.php';
// get the functions file from library
require_once '../library/functions.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';// Get the database connection file
// Get the accounts model
require_once '../model/accounts-model.php';


// Get the array of classifications from the database.
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

  case 'sign_in':
    include '../view/login.php';
    break;

  case 'Login';
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    if(empty($clientEmail) || empty($checkPassword)){

      $message = '<p id="errorMsg">Invalid email or password.</p>';
      include '../view/login.php';
      exit; 
    }
    break;

  case 'register':
    include '../view/register.php';
    break;

  case 'registered':

    // Filter and store the data
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){

      $message = '<p id="errorMsg">Please provide information for all empty form fields.</p>';
      include '../view/register.php';
      exit; 
    }

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

    // Check and report the result
    if($regOutcome === 1){
      $message = "<p id='successMsg'>Thanks for registering <strong>$clientFirstname<?strong>. Please use your email and password to login.</p>";
      include '../view/login.php';
      exit;
    } else {
      $message = "<p id ='errorMsg'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/register.php';
      exit;
    }
 
 default:
    include 'view/home.php';
}


?>