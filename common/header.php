<div>
    <a id="logo" href="#"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"></a>
    <a class="plain_link" id="log_in" href="/phpmotors/accounts/index.php?action=sign_in">My Account</a>
    <?php if(isset($sessionFirstname)){
            echo "<a href='/phpmotors/accounts/?action=admin'><span id='sessionWelcome'>Welcome $sessionFirstname</span></a>";
          } 
    ?>
</div>