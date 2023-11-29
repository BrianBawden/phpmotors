<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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
        <?php 
            if(isset($message)){
                echo $message; }
        ?>
        <p>Vehicle <a href="#">reviews</a></p>
        <div id="veh-display">
            <?php
                if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;
                    }
            ?>
        </div>
        <div id="reviews">
            <hr>
            <h2>Reviews</h2><br>
            <?php
                if(isset($reviewDisplay)){
                    echo $reviewDisplay;
                }else{
                    echo "No reviews.";
                }
            ?>
        </div>
       
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>