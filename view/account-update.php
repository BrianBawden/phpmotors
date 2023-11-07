<?php

if (2 > $_SESSION['clientData']['clientLevel'] || !$_SESSION['loggedin']) {
    $message = '<p id=errorMsg>Access Denied!</p>';
    header('Location: /phpmotors/');
}

if ($_SESSION['clientData']['clientLevel'] > 1) {
    $adminMessage = '
    <h2>Inventory Management</h2>
    <p>Use this link to manage the inventory.</p>
    <a href="../vehicles">Vehicle Management</a>
    ';
}
// build select list.
$classificationList = '<label for="carClass">*<strong>Choose car class:</strong></label><br>';
$classificationList .= "<select id='carClass' name='classificationId'>";
// $classificationList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
    // echo ' IDs: ', $$invInfo['classificationId'];
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] == $classificationId) {
            $classificationList .= ' selected ';
        }
    }
    elseif (isset($invInfo['classificationId'])){
        if($classification['classificationId'] == $invInfo['classificationId']){
            $classificationList .= ' selected ';
        }
}
$classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title><?php
            // if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
               // echo "Modify $invInfo[invMake] $invInfo[invModel]";
            //} elseif (isset($invMake) && isset($invModel)) {
              //  echo "Modify $invMake $invModel";
           // } 
           ?> 
        Account Management
    </title>
</head>

<body>
    <header>
        <div>
            <div>
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
                <nav>
                    <?php echo $navList; ?>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <h1>
            <?php 
                // if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                //     echo "Modify $invInfo[invMake] $invInfo[invModel]";
                // } elseif (isset($invMake) && isset($invModel)) {
                //     echo "Modify$invMake $invModel";
                // }
            ?>
            Manage Account
        </h1>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <h3>Update Account</h3>
        <p>* All Fields are Required</p>

        <form action="/phpmotors/accounts/" method="post">
            <label for="fName"><span>*</span><strong>First Name:</strong></label><br>
            <input type="text" id="fName" name="clientFirstname" required value='<?php echo $_SESSION['clientData']['clientFirstname'];  ?>'><br>

            <label for="lname"><span>*</span><strong>Last Name:</strong></label><br>
            <input type="text" id="lname" name="clientLastname" required value='<?php echo $_SESSION['clientData']['clientLastname'];  ?>'><br>

            <label for="email"><span>*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="clientEmail" required value='<?php echo $_SESSION['clientData']['clientEmail'];  ?>'><br>

            <input type="submit" name="submit" id="submitBtn" value="Update Account">

            <input type="hidden" name="action" value="updateAccount">
            <input type="hidden" name="invId" value=" 
            <?php echo $_SESSION['clientData']['clientId']
            ?>
            ">
        </form>

        <h3>Update Password</h3>
        <p></p>

    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>