<?php
// This is the vehicles controller

// Set $action to filer input post/get
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

// connect to database
require_once '../library/connections.php';
// connect to model/main-model.php
require_once '../model/main-model.php';
// connect to model/vehicles-model.php
require_once '../model/vehicles-model.php';

$classifications = GetClassifications();

// Test connection to db: passed
// var_dump($classifications);
// exit;

// build nav with $classifications.
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// // test $navList: passed
// echo $navList;
// exit;

// build dynamic classification select list with $classifications.
$classificationList = '<label for="carClass">Choose car class:</label>';
$classificationList .= "<select id='carClass' name='carClass'>";
foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';

// test $classificationList: passed
// echo $classificationList;
// exit;

// switch for 'action' value default home.php.
switch($action){
  case 'register':
    include '../view/register.php';
    break;

  case 'sign_in':
    include '../view/sign_in.php';
    break;

  case 'add-vehicle':
    include '../view/add-vehicle.php';
    break;

  case 'add-classification':
    include '../view/add-classification.php';
    break;

  case 'newClass':
    
    // filter and store data
    $classificationName = filter_input(INPUT_POST, 'classificationName');

    // check for missing data
    if(empty($classificationName)){
      $message = 'Please provide information for all empty form fields.';
      include '../view/add-classification.php';
      exit;
    }

    // send data to vehicles-model
    $newClass = insertNewClassification($classificationName);

    if($newClass !== 1){
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/vehicle-manage.php';
      exit;
    }
    break;

  default:
    include '../view/vehicle-manage.php';
}




?>