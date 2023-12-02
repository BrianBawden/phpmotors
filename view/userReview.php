<!DOCTYPE html>
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
        <h1>Your Reviews</h1>

        <div class="userReviews">
            <?php
                if(isset($message)){
                    echo $message;
                }
                if(isset($userReviews)){
                    echo $userReviews;
                }
            ?>
        </div>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>