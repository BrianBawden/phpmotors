<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }


?><!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>Image Management</title>
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
        <h1>Image Management</h1>
        <p>Welcome to the image management page.</p>
        <p>Please choose from the below options.</p>

        <h2>Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
        echo $message;
        } ?>

        <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
        <label for="invId">Vehicle</label>
            <?php echo $prodSelect; ?>
            <fieldset id="imageField">
                <label>Is this the main image for the vehicle?</label><br>
                <label for="priYes" class="pImage">Yes</label>
                <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                <label for="priNo" class="pImage">No</label>
                <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
            </fieldset>
        <label>Upload Image:</label>
        <input type="file" name="file1"><br>
        <input type="submit" class="regbtn" value="Upload">
        <input type="hidden" name="action" value="upload">
        </form>
        <hr>
        <h2>Existing Images</h2>
        <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
        <?php
            if (isset($imageDisplay)) {
            echo $imageDisplay;
        } ?>

    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>
<?php unset($_SESSION['message']); ?>