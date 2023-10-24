<?php
// This is the vehicles controller

// Set $action to filer input post/get
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

// connect to database
require_once '../library/connections.php';
// connect to functions.php library
require_once '../library/functions.php';
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
$classificationList = '<label for="carClass">*<strong>Choose car class:</strong></label><br>';
$classificationList .= "<select id='carClass' name='classificationId'>";
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
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // check for missing data
    if(
       empty($classificationName) || 
       empty(maxLength($classificationName, 30))
      ){
      $message = '<p id="errorMsg">Error adding Classification, please try again.</p>';
      include '../view/add-classification.php';
      exit;
    }

    // send data to vehicles-model
    $newClass = insertNewClassification($classificationName);

    if($newClass === 1){
      header("Location: ../vehicles");
      // exit;
    } else {
      $message = "<p id='errorMsg'>Sorry, but the new classification failed.</p>";
      include '../add-classifications.php';
      exit;
    }
    break;

    
    case 'newVehicle':

      
      // filter and store data
      $invMake          = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invModel         = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invDescription   = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invImage         = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invThumbnail     = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invPrice         = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
      $invStock         = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION));
      $invColor         = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
      
      
      // check for missing data
      if(
        empty($invMake)                     ||
        empty(maxLength($invMake, 30))      ||
        empty($invModel)                    ||
        empty(maxLength($invModel, 30))     || 
        empty($invDescription)              || 
        empty($invImage)                    || 
        empty(maxLength($invImage, 50))     || 
        empty($invThumbnail)                || 
        empty(maxLength($invThumbnail, 50)) || 
        empty($invPrice)                    || 
        empty($invStock)                    || 
        empty($invColor)                    ||
        empty(maxLength($invColor, 20))     || 
        empty($classificationId)
        ){
          
          $message = '<p id="errorMsg">Please provide correct information for all fields.</p>';
          include '../view/add-vehicle.php';
          exit;
        }

        // send data to vehicles-model
        try {

          $newVehicle = insertNewVehicle(
            $invMake,
            $invModel,
            $invDescription,
            $invImage,
            $invThumbnail,
            $invPrice,
            $invStock,
            $invColor,
            $classificationId
          );
        } catch (Exception $e) {
          $newVehicle = 0;
          
        }
        if($newVehicle === 1){
          $message = "<p id='successMsg'>$invMake $invModel added to inventory.</p>";
          include '../view/add-vehicle.php';
          // header  ("Location: /vehicles?action='add-vehicle'");  // ("Location: ../add-vehicle.php");
          exit;
        } else {
          $message = "<p id='errorMsg'>Sorry, but the new vehicle failed to add. Please try again.</p>";

          include '../view/add-vehicle.php';
          exit;
        }
        break;

        default:
          include '../view/vehicle-manage.php';
      }      

      ?>