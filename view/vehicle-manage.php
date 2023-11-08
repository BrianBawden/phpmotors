<?php
if(2 > $_SESSION['clientData']['clientLevel'] || !$_SESSION['loggedin']){  
    $message = '<p id=errorMsg>Access Denied!</p>';
    header('Location: /phpmotors/');
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
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
            <div>
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
                <nav>
                    <?php echo $navList; ?>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <h1>Vehicle Management</h1>
        <?php
            if (isset($message)) {
               echo $message;
            }
        ?>
        <ul class="manageVeh">
            <li ><a href="/phpmotors/vehicles/index.php?action=add-classification">Add Classification</a></li>
            <li><a href="/phpmotors/vehicles/index.php?action=add-vehicle">Add Vehicle</a></li>
        </ul>
        <?php
            if (isset($classificationList)) { 
            echo "<hr>";
            echo '<h2>Vehicles By Classification</h2>'; 
            echo '<p>Choose a classification to see those vehicles</p>'; 
            echo $classificationList; 
            }
        ?>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay"></table>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>
    <script src="../js/inventory.js"></script>
</body>

</html>

<?php unset($_SESSION['message']); ?>