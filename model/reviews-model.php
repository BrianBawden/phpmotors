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
      invId,
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
    ORDER BY reviewDate DESC';
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
      reviews.invId,
      reviewId,
      reviewDate,
      reviewText,
      inventory.invMake as Make,
      inventory.invModel as Model
    FROM
      reviews
    JOIN
      inventory ON reviews.invId = inventory.invId
    WHERE
    reviews.clientId = :clientId
    ORDER BY reviewDate DESC';
    $stmt = $db ->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewInfo;
}

function selectReview($reviewId){
  $db = phpmotorsConnect();
  $sql = 
    'SELECT 
      reviewId,
      reviewText,
      inventory.invMake as make,
      inventory.invModel as model,
      reviewDate
    FROM
      reviews
    JOIN
      inventory ON reviews.invId = inventory.invId
    WHERE
    reviewId = :reviewId';
    $stmt = $db ->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewText = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewText;
}

function updateReview($reviewId, $reviewText){
  // echo $reviewId;
  // echo "review: ", $reviewText;exit;
  $db = phpmotorsConnect();
  $sql = 
  "UPDATE
    reviews
  SET
   reviewText = :reviewText
  WHERE
    reviewId = :reviewId
  ";
  $stmt = $db ->prepare($sql);
  $stmt -> bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt -> bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt -> execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteReview($reviewId){
  $db = phpmotorsConnect();

  $sql = 
  "DELETE FROM `reviews` WHERE reviewId = :reviewId";

  $stmt = $db ->prepare($sql);
  $stmt -> bindValue(':reviewId', $reviewId, PDO::PARAM_STR);
  $stmt -> execute();
  // $editedReview = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  // return $editedReview;
}


?>