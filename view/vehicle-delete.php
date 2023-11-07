<?php

// if (2 > $_SESSION['clientData']['clientLevel'] || !$_SESSION['loggedin']) {
//     $message = '<p id=errorMsg>Access Denied!</p>';
//     header('Location: /phpmotors/');
//     exit;
// }
?><!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>
        <?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
                    }
        ?> 
        | PHP Motors
    </title>
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
        <h1>
            <?php 
                if (isset($invInfo['invMake'])) {
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                } 
            ?>
        </h1>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <p>Confirm Vehicle Deletion. The delete is permanent.</p>

        <form action="/phpmotors/vehicles/" method="post" enctype="multipart/form-data">

            <label for="make"><strong>Make:</strong></label><br>
            <input type="text" id="make" name="invMake" readonly <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br>

            <label for="model"><strong>Model:</strong></label><br>
            <input type="text" id="model" name="invModel" readonly <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br>

            <label for="description"><strong>Description:</strong></label><br>
            <textarea id="description" name="invDescription" readonly rows="7" cols="20"><?php if(isset($invDescription)){ echo "$invDescription'"; } elseif(isset($invInfo['invDescription'])) {echo "$invInfo[invDescription]"; }?></textarea><br>

            <input type="submit" name="submit" id="submitBtn" value="Delete Vehicle">

            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value=" 
            <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
            ?>
            ">

        </form>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>