
<?php
 // Accounts Model


//the regClient function handles site registration.
function regClient(
    $clientFirstname,
    $clientLastname,
    $clientEmail,
    $clientPassword
    ){
    
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
   
    // The SQL statement to insert new client
    $sql = 'INSERT INTO clients 
    (
        clientFirstname,
        clientLastname,
        clientEmail,
        clientPassword
    )
    VALUES 
    (
        :clientFirstname,
        :clientLastname,
        :clientEmail,
        :clientPassword
    )';
    
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname',  $clientLastname,  PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail',     $clientEmail,     PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword',  $clientPassword,  PDO::PARAM_STR);
   
    // Insert the data
    $stmt->execute();
    
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    
    // Close the database interaction
    $stmt->closeCursor();
    
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// check client database for duplicate emails
function checkForDuplicateEmail($clientEmail){
    
    $db = phpmotorsConnect(); // connect to database

    // sql count how many clientEmails match $clientEmail.
    $sql = 'SELECT clientEmail FROM clients
            WHERE clientEmail = :email';

    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);

    $stmt -> execute();

    $stmtValue = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

    if (empty($stmtValue)){
        return 0;
    } else{
        return 1;
    }
}

// get client data based on email address
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}

?>