<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css" media="screen" />
    <link rel="stylesheet" href="css/large.css" media="screen" />
    <!-- <link rel="stylesheet" href="css/small.css" media="screen" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- link for google font  Cairo-->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
    <!-- links for google font Comic Neue -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/backend1/phpmotors/php_files/header.php'; ?>
    </header>
    <main>
        <h1>Welcome to PHP Motors!</h1>
        <div class="carInfo">
            <table>
                <tr>
                    <th>DMC Delorean</th>
                </tr>
                <tr>
                    <td>Three cup holders</td>
                </tr>
                <tr>
                    <td>Superman Doors</td>
                </tr>
                <tr>
                    <td>Fuzzy dice!</td>
                </tr>
            </table>
            <button>Own Today</button>
        </div>
        <div class="carPic"><img src="images/delorean.jpg" alt="Cartoon of Delorean"></div>


    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/backend1/phpmotors/php_files/footer.php'; ?>
    </footer>

</body>

</html>