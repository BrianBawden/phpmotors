
<?php
/*
proxy connection for phpmotors database
*/
function phpmotorsConnect(){

    $server = "localhost";
    $dbname = "phpmotors";
    $username = "iClient";
    $password = "3/nvU8GK[Kh6M6sr";
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $link = new PDO($dsn, $username, $password, $options);
        // return $link;
        if(is_object($link)){echo 'It worked!';}
    }
    catch(PDOException $e) {
        // header('Location: http://localhost/phpmotors/view/500.php');
        echo "It didn't work, error: " . $e->getMessage();
    }
} 

?>