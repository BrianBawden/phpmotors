<?php
//reviews model

function insertReview($reviewText, $invId, $clientId){
  
  $db = phpmotorsConnect();
  $sql = 
    'INSERT INTO reviews (
      reviewText,
       invId,
       clientId) 
    VALUES (
      :reviewText,
      :invId,
      :clientId
      )';
  $stmt = $db ->prepare($sql);
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':invId',      $invId,      PDO::PARAM_INT);
  $stmt->bindValue(':clientId',   $clientId,   PDO::PARAM_INT);
  $stmt->execute();
  $newReview = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $newReview;

}

// invItemReview gets all reviews for the inventory id($invId) and sorts them by date.
function invItemReview($invId){
  $db = phpmotorsConnect();
  $sql = 
    'SELECT 
      reviewId,
      reviewDate,
      reviewText,
      clients.clientFirstname as fname,
      clients.clientLastname as lname
    FROM
      reviews
    JOIN
      clients on reviews.clientId = clients.clientId
    WHERE
      invId = :invId
    ORDER BY reviewDate ASC';
  $stmt = $db ->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewInfo;
}

function clientReviews($clientId){
  $db = phpmotorsConnect();
  $sql = 
    'SELECT 
      reviewId,
      reviewDate,
      reviewText,
      clients.clientFirstname as fname,
      clients.clientLastname as lname
    FROM
      reviews
    JOIN
      clients on reviews.clientId = clients.clientId
    WHERE
    clientId = :clientId
    ORDER BY reviewDate ASC';
    $stmt = $db ->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    echo json_encode($reviewInfo); exit;
    return $reviewInfo;
}

function specificReview(){

}

function updateReview(){

}

function deleteReview(){
  
}


?>