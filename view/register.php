<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors Register</title>
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
        <h1>Register</h1>
        <form>
            <label for="fName"><span class="required">*</span><strong>First Name:</strong></label><br>
            <input type="text" id="fName" name="fName" required><br>

            <label for="lname"><span class="required">*</span><strong>Last Name:</strong></label><br>
            <input type="text" id="lname" name="lname" required><br>

            <label for="email"><span class="required">*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password"><span class="required">*</span><strong>Password:</strong></label><br>
            <input type="password" id="password" name="password" required><br>
            <p>Password must be at least 8 characters and include: one capital case, one lower case, and one number.</p>
            <button>Register</button>
        </form>
        <p>Not a member? <a class="plain_link" href="#">Sign up</a></p>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>