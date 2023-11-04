<?php
// session_start();
if(!$_SESSION['loggedin']){

    header('Location: /phpmotors/');
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

        <ul>
            <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
            <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
            <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail']?></li>
            <li>Level: <?php echo $_SESSION['clientData']['clientLevel']?></li>
            </ul>
            <?php 
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
