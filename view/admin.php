<?php
// session_start();
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
}
$updateAccount = '
<hr>
<h2>Update Account</h2>
<p>Use this link to manage your account.</p>
<a href="../accounts?action=client-update">Update Account Information</a>
';

$viewReviews = '
<hr>
<h2>View Reviews</h2>
<p>Use this link to view your reviews.</p>
<a href="../reviews?action=viewReview">View Reviews</a>
';

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    $_SESSION['message'] = '';
}

if($_SESSION['clientData']['clientLevel'] > 1){
    $adminMessage = '
    <h2>Inventory Management</h2>
    <p>Use this link to manage the inventory.</p>
    <a href="../vehicles">Vehicle Management</a>
    ';
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors Template</title>
</head>

<body>
    <header>
        <div>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
        </div>
    </header>
    <main>
        
        <h1>Logged In: <?php echo $_SESSION['clientData']['clientFirstname'], ' ' , $_SESSION['clientData']['clientLastname'];?></h1>

    <?php
        if (isset($message)){
            echo $message;
        }
    ?>
        <ul>
            <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
            <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
            <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail']?></li>
            </ul>
            <?php 
            echo $updateAccount;
            echo $viewReviews;
            if (isset($adminMessage)){
                 echo '<hr>', $adminMessage;
            }
            ?>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>
