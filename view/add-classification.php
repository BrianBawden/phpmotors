<!DOCTYPE html>
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
        <form action="">
            <label for="newClassification">New Classification</label>
            <input type="text" id="newClassification" name="newClassification">
            <input type="submit" name="submit" id=submitBtn>
            
            <input type="hidden" name="action" value="newClass">
        </form>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>