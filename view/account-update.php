<?php

if (!$_SESSION['loggedin']) {
    $message = '<p id=errorMsg>Access Denied!</p>';
    header('Location: /phpmotors/');
}

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    $_SESSION['message'] = "";
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
            <input type="text" id="fName" name="clientFirstname" required 
            <?php 
                if(isset($clientFirstname)){
                    echo "value='$clientFirstname'";
                }else{
                    echo "value='{$_SESSION['clientData']['clientFirstname']}'";
                } 
            ?>><br>

            <label for="lname"><span>*</span><strong>Last Name:</strong></label><br>
            <input type="text" id="lname" name="clientLastname" required
            <?php 
                if(isset($clientLastname)){
                    echo "value='$clientLastname'";
                }else{
                    echo "value='{$_SESSION['clientData']['clientLastname']}'";
                } 
            ?>><br>

            <label for="email"><span>*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="clientEmail" required 
            <?php 
                if(isset($clientEmail)){
                    echo "value='$clientEmail'";
                }else{
                    echo "value='{$_SESSION['clientData']['clientEmail']}'";
                } 
            ?>><br>

            <input type="submit" name="submit" id="submitBtn" value="Update Account">

            <input type="hidden" name="action" value="updateAccount">
            <input type="hidden" name="clientId" value=" 
            <?php echo $_SESSION['clientData']['clientId']
            ?>
            ">
        </form>

        <h3>Update Password</h3>
        <p class="directions">Password must be at least 8 characters and include: one upper case, one lower case, one special character, and one number.</p>
        <p class="directions">* Your original password will be changed.</p>

        <form action="/phpmotors/accounts/" method="post">
            <label for="password"><span>*</span><strong>Password:</strong></label><br>
            <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

            <input type="submit" name="submit" id="submittn" value="Update Password">

            <input type="hidden" name="action" value="updatePassword">
            <input type="hidden" name="clientId" value=" 
            <?php echo $_SESSION['clientData']['clientId']
            ?>
            ">
        </form>

    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>