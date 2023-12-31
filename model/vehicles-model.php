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

// Get vehicle information by invId
function getInvItemInfo($invId){
    $db = phpmotorsConnect();
    $sql = 
        'SELECT
            inventory.invId,
            invMake,
            invModel,
            invDescription,
            images.imgPath as invImage,
            invPrice,
            invStock,
            invColor,
            classificationId
        FROM
            inventory
        JOIN images ON inventory.invId = images.invId 
        WHERE inventory.invId = :invId
        AND images.imgPath NOT LIKE "%-tn%"';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}

// make updates to a vehicle based on id
function updateVehicle(
    $invMake,
    $invModel,
    $invDescription,
    $invImage,
    $invThumbnail,
    $invPrice,
    $invStock,
    $invColor,
    $classificationId,
    $invId
    ){
    
    // object connected to phpmotors database using connection function.
    $db = phpmotorsConnect();

    // SQL statement to insert new inventory.
    $sql = 'UPDATE 
              inventory 
            SET
              invMake          = :invMake,
              invModel         = :invModel,
              invDescription   = :invDescription,
              invImage         = :invImage,
              invThumbnail     = :invThumbnail,
              invPrice         = :invPrice,
              invStock         = :invStock,
              invColor         = :invColor,
              classificationId = :classificationId
            WHERE
              invId            = :invId'; 

    
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
    $stmt->bindValue(':invId',            $invId,            PDO::PARAM_STR);


    // execute INSERT $stmt
    $stmt->execute();

    // Check if success
    $rowsChanged = $stmt->rowCount();

    // close db
    $stmt->closeCursor();

    return $rowsChanged;
}

// delete vehicle
function deleteVehicle($invId){
    
    // object connected to phpmotors database using connection function.
    $db = phpmotorsConnect();

    // SQL statement to insert new inventory.
    $sql = 'DELETE FROM 
              inventory 
            WHERE
              invId = :invId'; 

    // prepare statement 
    $stmt = $db->prepare($sql);

    //replace placeholders with sql values with type and data.
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);

    // execute INSERT $stmt
    $stmt->execute();

    // Check if success
    $rowsChanged = $stmt->rowCount();

    // close db
    $stmt->closeCursor();

    return $rowsChanged;

}

// Retrieve list of vehicles based on classification.
function getVehiclesByClassification($classificationName){
    $db = phpmotorsConnect();
    $sql = 
        'SELECT
            inventory.invId,
            invMake,
            invModel,
            invDescription,
            invImage,
            images.imgPath,
            invPrice,
            invStock,
            invColor,
            classificationId
        FROM
            inventory
        JOIN images ON inventory.invId = images.invId
        WHERE
            classificationId IN(
            SELECT
                classificationId
            FROM
                carclassification
            WHERE
                classificationName = :classificationName
            ) 
            AND images.imgPath LIKE "%-tn%"
            AND images.imgPrimary = 1;
        ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

// Get information for all vehicles
function getVehicles(){
	$db = phpmotorsConnect();
	$sql = 'SELECT invId, invMake, invModel FROM inventory';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo;
}


?>