<?php
if(2 > $_SESSION['clientData']['clientLevel'] || !$_SESSION['loggedin']){  
    $message = '<p id=errorMsg>Access Denied!</p>';
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
    <title>PHP Motors Add Classification</title>
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
        <h1>Add Classification</h1>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="newClassification">New Classification</label>
            <span class="directions">Max length 30 characters</span><br>
            <input type="text" id="newClassification" name="classificationName" maxlength="30">
            <input type="submit" name="submit" id="submitBtn" value="submit">
            
            <input type="hidden" name="action" value="newClass">
        </form>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>