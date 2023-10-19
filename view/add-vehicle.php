<!DOCTYPE html>
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

        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="make"><span class="required">*</span><strong>Make:</strong></label><br>
            <input type="text" id="make" name="invMake"><br>

            <label for="model"><span class="required">*</span><strong>Model:</strong></label><br>
            <input type="text" id="model" name="invModel"><br>

            <label for="description"><span class="required">*</span><strong>Description:</strong></label><br>
            <textarea id="description" name="invDescription" rows="7" cols="20"></textarea><br>

            <label for="image"><span class="required">*</span><strong>Image Path:</strong></label><br>
            <input type="text" id="image" name="invImage" value="/phpmotors/images/no-image.png"><br>

            <label for="thumbnail"><span class="required">*</span><strong>Thumbnail Path:</strong></label><br>
            <input type="text" id="thumbnail" name="invThumbnail"><br>

            <label for="price"><span class="required">*</span><strong>Price:</strong></label><br>
            <input type="text" id="price" name="invPrice"><br>

            <label for="stock"><span class="required">*</span><strong>Number in Stock:</strong></label><br>
            <input type="text" id="stock" name="invStock"><br>

            <label for="color"><span class="required">*</span><strong>Color:</strong></label><br>
            <input type="text" id="color" name="invColor"><br>

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