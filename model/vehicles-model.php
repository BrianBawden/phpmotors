<?php
// Vehicles model


function insertNewClassification($classificationName){
   
    // object connected to phpmotors database using connection function.
    $db = phpmotorsConnect();

    // SQL statement to insert new classification.
    $sql = 'INSERT INTO carclassification(classificationName) 
    VALUES (:classificationName)';

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


// Add new vehicle to phpmotors database. primary key auto assigned. 
function insertNewVehicle(
    $invMake,
    $invModel,
    $invDescription,
    $invImage,
    $invThumbnail,
    $invPrice,
    $invStock,
    $invColor,
    $classificationId
    ){
    
    // object connected to phpmotors database using connection function.
    $db = phpmotorsConnect();

    // SQL statement to insert new inventory.
    $sql = 'INSERT INTO inventory 
    (
        invMake,
        invModel,
        invDescription,
        invImage,
        invThumbnail,
        invPrice,
        invStock,
        invColor,
        classificationId
    )
    
    VALUES (
        :invMake,
        :invModel,
        :invDescription,
        :invImage,
        :invThumbnail,
        :invPrice,
        :invStock,
        :invColor,
        :classificationId
    )';
    
    // prepare statement 
    $stmt = $db->prepare($sql);

    //replace placeholders with sql values with type and data.
    $stmt->bindValue(':invMake',          $invMake,          PDO::PARAM_STR);
    $stmt->bindValue(':invModel',         $invModel,         PDO::PARAM_STR);
    $stmt->bindValue(':invDescription',   $invDescription,   PDO::PARAM_STR);
    $stmt->bindValue(':invImage',         $invImage,         PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail',     $invThumbnail,     PDO::PARAM_STR);
    $stmt->bindValue(':invPrice',         $invPrice,         PDO::PARAM_STR);
    $stmt->bindValue(':invStock',         $invStock,         PDO::PARAM_STR);
    $stmt->bindValue(':invColor',         $invColor,         PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);

    // execute INSERT $stmt
    $stmt->execute();

    // Check if success
    $rowsChanged = $stmt->rowCount();

    // close db
    $stmt->closeCursor();

    return $rowsChanged;
}

// Get vehicles by classificationId 
function getInventoryByClassification($classificationId){ 
    $db = phpmotorsConnect(); 
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
    $stmt = $db->prepare($sql); 
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor(); 
    return $inventory; 
   }

?>