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
        <div id="missing"></div>
        <p id="missingMsg">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="/phpmotors/accounts/" method="post">
            <label for="fName"><span>*</span><strong>First Name:</strong></label><br>
            <input type="text" id="fName" name="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>><br>

            <label for="lname"><span>*</span><strong>Last Name:</strong></label><br>
            <input type="text" id="lname" name="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>><br>

            <label for="email"><span>*</span><strong>Email:</strong></label><br>
            <input type="email" id="email" name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>

            <span class="directions">Password must be at least 8 characters and include: one upper case, one lower case, one special character, and one number.</span><br>
            <label for="password"><span>*</span><strong>Password:</strong></label><br>
            <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            
            <input type="submit" name="submit" id="regbtn" value="register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="registered">
        </form>
        
        <p>Not a member? <a class="plain_link" href="#">Sign up</a></p>

    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>