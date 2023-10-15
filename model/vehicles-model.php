<?php
// Vehicles model

function insertNewClassification($classificationName){
    // object connected to phpmotors database using connection function.
    $db = phpmotorsConnect();

    // SQL statement to insert new classification.
    $sql = 'INSERT INTO carclassification(classificationName) VALUES (:classificationName)';

    // prepare statement 
    $stmt = $db->prepare($sql);

    //replace placeholders with sql values with type and data.
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);

    // execute INSERT $stmt
    $stmt->execute();

    // Check if success
    $rowsChanged = $stmt->rowCount();

    // close db
    $stmt->closeCursor();

    return $rowsChanged;
}

?>