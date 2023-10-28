<?php
// build select list.
$classificationList = '<label for="carClass">*<strong>Choose car class:</strong></label><br>';
$classificationList .= "<select id='carClass' name='classificationId'>";
foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'";
  if (isset($classificationId)){
    if($classification['classificationId'] == $classificationId){
        $classificationList .= ' selected ';
    }
  }
  $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors Add Vehicle</title>
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
        <h1>Add Vehicle</h1>

        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>

        <p>* All Fields are Required</p>

        <form action="/phpmotors/vehicles/" method="post" enctype="multipart/form-data">
            <label for="make"><span class="required">*</span><strong>Make:</strong></label><br>
            <span class="directions">Max length 30 characters</span><br>
            <input type="text" id="make" name="invMake" maxlength="30" required <?php if(isset($invMake)){echo "value='$invMake'";}  ?>><br>

            <label for="model"><span class="required">*</span><strong>Model:</strong></label><br>
            <span class="directions">Max length 30 characters</span><br>
            <input type="text" id="model" name="invModel" maxlength="30" required <?php if(isset($invModel)){echo "value='$invModel'";}  ?>><br>

            <label for="description"><span class="required">*</span><strong>Description:</strong></label><br>
            <textarea id="description" name="invDescription" required rows="7" cols="20"><?php if(isset($invDescription)){echo "$invDescription";}  ?></textarea><br>

            <label for="image"><span class="required">*</span><strong>Image Path:</strong></label><br>
            <span class="directions">Max length 50 characters</span><br>
            <input type="text" id="image" name="invImage" maxlength="50" required <?php if(isset($invImage)){echo "value='$invImage'";}  ?> value="/phpmotors/images/no-image.png"><br>

            <label for="thumbnail"><span class="required">*</span><strong>Thumbnail Path:</strong></label><br>
            <span class="directions">Max length 50 characters</span><br>
            <input type="text" id="thumbnail" name="invThumbnail" maxlength="50" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>><br>
            
            <label for="price"><span class="required">*</span><strong>Price:</strong></label><br>
            <span class="directions">Max length 10 characters</span><br>
            <input type="number" id="price" name="invPrice" step="0.01" min="1" required <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>><br>

            <label for="stock"><span class="required">*</span><strong>Number in Stock:</strong></label><br>
            <span class="directions">Max value 32500 characters</span><br>
            <input type="number" id="stock" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";}  ?> min="0" max="32767"><br>

            <label for="color"><span class="required">*</span><strong>Color:</strong></label><br>
            <span class="directions">Max length 20 characters</span><br>
            <input type="text" id="color" name="invColor" maxlength="20" required <?php if(isset($invColor)){echo "value='$invColor'";}  ?>><br>

            <?php echo $classificationList; ?><br><br>

            <input type="submit" name="submit" id="submitBtn" value="submit">

            <input type="hidden" name="action" value="newVehicle">

        </form>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>