
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
     $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
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
    $dv .= "<p class='veh-display'>Price: $$dollars</p>";
    $dv .= "</div>";

     return $dv;
}

?>