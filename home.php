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
        <div class="carPic">
            <img src="images/delorean.jpg" alt="Cartoon of Delorean">
        </div>
        <div class="upgrade">
            <h2>Delorean Upgrades</h2>
            <table class="upgrade_table">
                <tr>
                    <td>
                        <figure>
                            <img src="images/upgrades/flux-cap.png" alt="flux_capacitor">
                            <figcaption>Flux Capacitor</figcaption>
                        </figure>
                    </td>
                    <td>
                        <figure>
                            <img src="images/upgrades/flame.jpg" alt="Flame Decal">
                            <figcaption>Flame decal</figcaption>
                        </figure>
                    </td>
                </tr>
                <tr>
                    <td>
                        <figure>
                            <img src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                            <figcaption>Bumper sticker</figcaption>
                        </figure>
                    </td>
                    <td>
                        <figure>
                            <img src="images/upgrades/hub-cap.jpg" alt="Hubcap">
                            <figcaption>Hubcap</figcaption>
                        </figure>
                    </td>
                </tr>
            </table>
        </div>
        <div class="reviews">
            <h2>DMC Delorean Reviews</h2>
            <ul>
                <li>"So fast it is almost like traveling in time." (4/5)</li>
                <li>"Coolest ride on the road." (4/5)</li>
                <li>"I'm feeling Marty McFly!"(5/5)</li>
                <li>"The most futuristic ride of our day."(4.5/5)</li>
                <li>"80's livin and I love it!"(5/5)</li>

            </ul>
        </div>

    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/backend1/phpmotors/php_files/footer.php'; ?>
    </footer>

</body>

</html>