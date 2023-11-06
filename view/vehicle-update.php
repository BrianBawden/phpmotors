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
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
            } ?> | PHP Motors</title>
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
                if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Modify$invMake $invModel";
                }
            ?>
        </h1>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <p>* All Fields are Required</p>

        <form action="/phpmotors/vehicles/" method="post" enctype="multipart/form-data">
            <label for="make"><span class="required">*</span><strong>Make:</strong></label><br>
            <span class="directions">Max length 30 characters</span><br>
            <input type="text" id="make" name="invMake" maxlength="30" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br>

            <label for="model"><span class="required">*</span><strong>Model:</strong></label><br>
            <span class="directions">Max length 30 characters</span><br>
            <input type="text" id="model" name="invModel" maxlength="30" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br>

            <label for="description"><span class="required">*</span><strong>Description:</strong></label><br>
            <textarea id="description" name="invDescription" required rows="7" cols="20"><?php if(isset($invDescription)){ echo "$invDescription'"; } elseif(isset($invInfo['invDescription'])) {echo "$invInfo[invDescription]"; }?></textarea><br>

            <label for="image"><span class="required">*</span><strong>Image Path:</strong></label><br>
            <span class="directions">Max length 50 characters</span><br>
            <input type="text" id="image" name="invImage" maxlength="50" required <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?> value="/phpmotors/images/no-image.png"><br>

            <label for="thumbnail"><span class="required">*</span><strong>Thumbnail Path:</strong></label><br>
            <span class="directions">Max length 50 characters</span><br>
            <input type="text" id="thumbnail" name="invThumbnail" maxlength="50" required <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>><br>

            <label for="price"><span class="required">*</span><strong>Price:</strong></label><br>
            <span class="directions">Max length 10 characters</span><br>
            <input type="number" id="price" name="invPrice" step="0.01" min="1" required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>><br>

            <label for="stock"><span class="required">*</span><strong>Number in Stock:</strong></label><br>
            <span class="directions">Max value 32500 characters</span><br>
            <input type="number" id="stock" name="invStock" required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?> min="0" max="32767"><br>

            <label for="color"><span class="required">*</span><strong>Color:</strong></label><br>
            <span class="directions">Max length 20 characters</span><br>
            <input type="text" id="color" name="invColor" maxlength="20" required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>><br>

            <?php echo $classificationList; ?><br><br>

            <input type="submit" name="submit" id="submitBtn" value="Update Vehicle">

            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value=" 
            <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                  elseif(isset($invId)){ echo $invId; } 
            ?>
            ">

        </form>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>