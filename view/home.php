<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors Home</title>
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
        <h1>Welcome to PHP Motors!</h1>
        <div class="carInfo">
            <table>
                <tr>
                    <td>
                        <h2>DMC Delorean</h2>
                    </td>
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
        </div>
        <div class="carPic">
            <img src="images/vehicles/delorean.jpg" alt="Cartoon of Delorean">
            <button>Own Today</button>
        </div>
        <div class="rAndU">
            <div class="reviews rAndUChild">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast it is almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!"(5/5)</li>
                    <li>"The most futuristic ride of our day."(4.5/5)</li>
                    <li>"80's livin and I love it!"(5/5)</li>

                </ul>
            </div>
            <div class="upgrade rAndUChild">
                <h2>Delorean Upgrades</h2>
                <div class="upgrade_table">
                    <div class="upgrade_options">
                        <figure>
                            <img src="images/upgrades/flux-cap.png" alt="flux_capacitor">
                            <figcaption>Flux Capacitor</figcaption>
                        </figure>
                    </div>
                    <div class="upgrade_options">
                        <figure>
                            <img src="images/upgrades/flame.jpg" alt="Flame Decal">
                            <figcaption>Flame decal</figcaption>
                        </figure>
                    </div>
                    <div class="upgrade_options">
                        <figure>
                            <img src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                            <figcaption>Bumper sticker</figcaption>
                        </figure>
                    </div>
                    <div class="upgrade_options">
                        <figure>
                            <img src="images/upgrades/hub-cap.jpg" alt="Hubcap">
                            <figcaption>Hubcap</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

</body>

</html>