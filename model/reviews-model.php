<?php
//reviews model

function insertReview(){

}

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
      invId = :invId';
  $stmt = $db ->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewInfo;
}

function clientReviews(){

}

function specificReview(){

}

function updateReview(){

}

function deleteReview(){
  
}


?>