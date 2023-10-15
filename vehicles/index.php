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






?>