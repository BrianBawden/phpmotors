
<?php

// navBar gets the $classifications argument from the db and a string is returned with the html for the nav bar.
function navList($classifications) {
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
      $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
      .urlencode($classification['classificationName']).
      "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// checkEmail will return a valid email if true or null if false.
function checkEmail($clientEmail) {
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword) {
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function maxLength($textLength, $maxLength){

    if(strlen($textLength) <= $maxLength){
        return 1;
    } else{
        return 0;
    }
}

function minLength($textLength, $minLength){

    if(strlen($textLength) >= $minLength){
        return 1;
    } else{
        return 0;
    }
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
}

// dynamically build an html unordered list of vehicles 
function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
     $dollars = number_format($vehicle['invPrice'], 2, '.', ',');
     $dv .= '<li>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehDetail&invId="
     .urlencode($vehicle['invId'])."' title='View our $vehicle[invMake] $vehicle[invModel]'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
     $dv .= "<a href='/phpmotors/vehicles/?action=vehDetail&invId="
     .urlencode($vehicle['invId'])."' title='View our $vehicle[invMake] $vehicle[invModel]'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
     $dv .= "<span class='vehPrice'>$$dollars</span>";
     $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

function buildVehiclePage($vehicle){
    $dollars = number_format($vehicle['invPrice'], 2, '.', ',');
    $dv = "<h1 class='veh-display'>$vehicle[invMake] $vehicle[invModel]</h1>";
    $dv .= "<img class='veh-display' src ='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel]'>";
    $dv .= "<div class='veh-detail'>";
    $dv .= "<h2 class='veh-display'>$vehicle[invMake] $vehicle[invModel] Details:</h2>";
    $dv .= "<p class='veh-display'>$vehicle[invDescription]</p>";
    $dv .= "<p class='veh-display'>Color: $vehicle[invColor]</p>";
    $dv .= "<p class='veh-display'>In Stock: $vehicle[invStock]</p>";
    $dv .= "<p class='veh-display'>Price: <span class='price'>$$dollars</span></p>";
    $dv .= "</div>";

     return $dv;
}


/* * ********************************
*  Functions for working with images
* ********************************* */

// Adds "-tn" designation to file name
function makeThumbnailName($image) {
    $i = strrpos($image, '.');
    $image_name = substr($image, 0, $i);
    $ext = substr($image, $i);
    $image = $image_name . '-tn' . $ext;
    return $image;
}

// Build images display for image management view
function buildImageDisplay($imageArray) {
    $id = '<ul id="image-display">';
    foreach ($imageArray as $image) {
     $id .= '<li>';
     $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
     $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
     $id .= '</li>';
   }
    $id .= '</ul>';
    return $id;
}

// Build the vehicles select list
function buildVehiclesSelect($vehicles) {
    $prodList = '<select name="invId" id="invId">';
    $prodList .= "<option>Choose a Vehicle</option>";
    foreach ($vehicles as $vehicle) {
     $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
    }
    $prodList .= '</select>';
    return $prodList;
}

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
    // Gets the paths, full and local directory
    global $image_dir, $image_dir_path;
    if (isset($_FILES[$name])) {
     // Gets the actual file name
     $filename = $_FILES[$name]['name'];
     if (empty($filename)) {
      return;
     }
    // Get the file from the temp folder on the server
    $source = $_FILES[$name]['tmp_name'];
    // Sets the new path - images folder in this directory
    $target = $image_dir_path . '/' . $filename;
    // Moves the file to the target folder
    move_uploaded_file($source, $target);
    // Send file for further processing
    processImage($image_dir_path, $filename);
    // Sets the path for the image for Database storage
    $filepath = $image_dir . '/' . $filename;
    // Returns the path where the file is stored
    return $filepath;
    }
}



?>