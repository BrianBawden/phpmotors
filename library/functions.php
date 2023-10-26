
<?php

// navBar gets the $classifications argument from the db and a string is returned with the html for the nav bar.
function navList($classifications) {
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
      $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
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


?>