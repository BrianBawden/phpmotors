<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/head.php'; ?>
    <title>PHP Motors Register</title>
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
        <h1>Register</h1>
        <form action="/phpmotors/accounts/index.php" method="post">
            <label for="fName"><span class="required">*</span><strong>First Name:</strong></label><br>
            <input type="text" id="fName" name="clientFirstname" required><br>

            <label for="lname"><span class="required">*</span><strong>Last Name:</strong></label><br>
            <input type="text" id="lname" name="clientLastname" required><br>

            <label for="email"><span class="required">*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="clientEmail" required><br>

            <label for="password"><span class="required">*</span><strong>Password:</strong></label><br>
            <input type="password" id="password" name="clientPassword" required><br>
            <p>Password must be at least 8 characters and include: one capital case, one lower case, and one number.</p>
            <input type="submit" name="submit" id="regbtn" value="Register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="register">
        </form>
        <p>Not a member? <a class="plain_link" href="#">Sign up</a></p>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/php_files/footer.php'; ?>
    </footer>

</body>

</html>