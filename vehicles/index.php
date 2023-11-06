<?php
// This is the vehicles controller

// create/access to session
session_start();


// Set $action to filer input post/get
$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL){
    $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
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
$navList = navList($classifications);

// if user logged in display 'welcome userName' in header
if(isset($_SESSION['clientData'])){
  $sessionFirstname = $_SESSION['clientData']['clientFirstname'];
}

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
    $invStock         = trim(filter_input(INPUT_POST, 'invStock',  FILTER_SANITIZE_NUMBER_INT));
    $invColor         = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId',  FILTER_SANITIZE_NUMBER_INT));
    
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
      empty(minLength($invPrice, 0))      ||
      empty($invStock)                    || 
      empty(maxLength($invStock, 20))     || 
      empty($invColor)                    ||
      empty(maxLength($invColor, 20))     || 
      empty($classificationId)            ||
      empty(maxLength($classificationId, 11))      
      
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
      
  case 'getInventoryItems': 
    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */ 
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId); 
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray); 
  break;
    
  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if(count($invInfo) < 1){
      $message = '<p id="errorMsg">Sorry, no vehicle information could be found.</p>';
    }
    include '../view/vehicle-update.php';
    exit;
  break;

  case 'updateVehicle':
    // filter and store data
    $invMake          = trim(filter_input(INPUT_POST, 'invMake',           FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel         = trim(filter_input(INPUT_POST, 'invModel',          FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription   = trim(filter_input(INPUT_POST, 'invDescription',    FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage         = trim(filter_input(INPUT_POST, 'invImage',          FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail     = trim(filter_input(INPUT_POST, 'invThumbnail',      FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice         = trim(filter_input(INPUT_POST, 'invPrice',          FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $invStock         = trim(filter_input(INPUT_POST, 'invStock',          FILTER_SANITIZE_NUMBER_INT));
    $invColor         = trim(filter_input(INPUT_POST, 'invColor',          FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId',  FILTER_SANITIZE_NUMBER_INT));
    $invId            = trim(filter_input(INPUT_POST, 'invId',             FILTER_SANITIZE_NUMBER_INT));
    
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
      empty(minLength($invPrice, 0))      ||

      empty($invStock)                    || 
      empty(maxLength($invStock, 20))     || 

      empty($invColor)                    ||
      empty(maxLength($invColor, 20))     || 

      empty($classificationId)            ||
      empty(maxLength($classificationId, 11))      
      
      ){
        $message = '<p id="errorMsg">Please provide correct information for all fields.</p>';
        include '../view/vehicle-update.php';
        exit;
    }
      
    // send data to vehicles-model
    try {
      
      $updateResult = updateVehicle(
        $invMake,
        $invModel,
        $invDescription,
        $invImage,
        $invThumbnail,
        $invPrice,
        $invStock,
        $invColor,
        $classificationId,
        $invId
      );
    } catch (Exception $e) {
      $updateResult = 0;
      
    }
    if($updateResult){
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p id='errorMsg'>Sorry, but the update failed. Please try again.</p>";
      
      include '../view/vehicle-update.php';
      exit;
    }
  break;
      
  default:
    
    $classificationList = buildClassificationList($classifications);
    include '../view/vehicle-manage.php';
}      
      
      ?>