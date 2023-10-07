<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/head.php'; ?>
</head>

<body>
    <header>
    <div>
    <a id="logo" href="#"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"></a>
    <a class="plain_link" id="log_in" href="#">My Account</a>
    <nav>
        <?php echo $navList; ?>
    </nav>
</div>
    </header>
    <main>
        <h1>Content Title Here</h1>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/footer.php'; ?>
    </footer>

</body>

</html>