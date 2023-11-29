<?php
//reviews model

function insertReview(){

}

// invItemReview gets all reviews for the inventory id($invId) and sorts them by date.
function invItemReview($invId){
  $db = phpmotorsConnect();
  $sql = 
    'SELECT 
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
// clientReviews(37);

function specificReview(){

}

function updateReview(){

}

function deleteReview(){
  
}


?>