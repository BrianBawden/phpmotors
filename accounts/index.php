<?php
// This is the accounts controller for phpmotors website.

// create/access to session
session_start();


// set $action to the filter input post/get for security reasons.
$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
 if ($action == NULL){
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


// Get the array of classifications from the database.
$classifications = getClassifications();

// The commented out code below is to test the connection to the database.
// var_dump($classifications);
// 	exit;
// Build a navigation bar using the $classifications array
$navList = navList($classifications);


// if user logged in display 'welcome userName' in header
if(isset($_SESSION['clientData'])){
  $sessionFirstname = $_SESSION['clientData']['clientFirstname'];
}
// The commented out code below is to test the nav bar code. 

// echo $navList;
// exit;

// switch statement reading the $action value to know what view to show, with a default of view/home.php
switch ($action){
     
  case 'sign_in':
    include '../view/login.php';
  break;
      
  case 'Login':
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    
    if(empty($clientEmail) || empty($checkPassword)){
      
      $message = '<p id="errorMsg">Invalid email or password.</p>';
      include '../view/login.php';
      exit; 
    }
    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail); // array of client info that matches email.
    // Compare the password just submitted against
    // the hashed password for the matching client
    
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']); // true/false if parameters match.
    // If the hashes don't match create an error
    // and return to the login view

    if(!$hashCheck) {

      $message = '<p id="errorMsg">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    if (!isset($_SESSION['loggedin'])) {
      $message = 'p id="errorMsg">Error with session logging in.</p>';
      include '../view/login.php';
    }
    // Remove the password from the array
    // the array_pop function removes the last element from an array
    array_pop($clientData);

    // Store the array into the session
    $_SESSION['clientData'] = $clientData;

    if($_SESSION['clientData']['clientLevel'] > 1){
      $adminMessage = '
      <h2>Inventory Management</h2>
      <p>Use this link to manage the inventory.</p>
      <a href="../vehicles">Vehicle Management</a>
      ';
    }

    // Send them to the admin view
    header('Location: /phpmotors/accounts/?action=admin');
  break;
    
  case 'register':
    include '../view/register.php';
  break;
      
  case 'account-update':
    include '../view/account-update.php';
  break;

  case 'updateAccount':
    include '../view/home.php';
  break;
  
  case 'registered':
      
    // Filter and store the data
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check if email in database
    $checkClientEmail = checkForDuplicateEmail($clientEmail);

    if ($checkClientEmail){
      $message = '<p id"successMsg">Email already exists. Login?';
      include '../view/login.php';
      exit;
    }
    
    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      
      $message = '<p id="errorMsg">Please provide information for all empty form fields.</p>';
      include '../view/register.php';
      exit; 
    }
    
    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
    
    // Check and report the result
    if($regOutcome === 1){
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION["message"] = "<p id='successMsg'>Thanks for registering <strong>$clientFirstname<?strong>. Please use your email and password to login.</p>";
      header('Location: /phpmotors/accounts/?action=Login');
      // include '../view/login.php';
      exit;
    } else {
      $message = "<p id ='errorMsg'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/register.php';
      exit;
    }
  break;

  case 'admin':
    include '../view/admin.php';
  break;

  case 'logout':
    session_unset();
    session_destroy();
    header('Location: /phpmotors');
  break;

  default:
  include '../view/admin.php';
}
