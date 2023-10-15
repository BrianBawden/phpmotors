<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>500 Error Page</title>
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
        <h1>Server Error</h1>
        <p>Sorry our server seems to be experiencing some technical difficulties.</p>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>
</body>