<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors Sign In</title>
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
        <h1>Sign In</h1>
        <p>
            <?php
            if (isset($_SESSION["message"])) {
                echo $_SESSION["message"];
            } elseif (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="/phpmotors/accounts/" method="post">
            <label for="email"><span>*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>

            <label for="password"><span>*</span><strong>Password:</strong></label><br>
            <span class="directions">Password must be at least 8 characters and include: one upper case, one lower case, one special character, and one number.</span><br>
            <input type="password" id="password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <button>Sign In</button>
            <input type="hidden" name="action" value="Login">
        </form>
        <p>Not a member? <a class="plain_link" href="/phpmotors/accounts/index.php?action=register">Sign up</a></p>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>