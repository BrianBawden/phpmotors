<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/head.php'; ?>
    <title>PHP Motors Sign In</title>
</head>

<body>
    <header>
        <div>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
        </div>
    </header>
    <main>
        <h1>Sign In</h1>
        <form>
            <label for="email"><span class="required">*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password"><span class="required">*</span><strong>Password:</strong></label><br>
            <input type="password" id="password" name="password" required><br>
            <button>Sign In</button>
        </form>
        <p>Not a member? <a class="plain_link" href="/phpmotors/index.php?action=register">Sign up</a></p>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/footer.php'; ?>
    </footer>

</body>

</html>