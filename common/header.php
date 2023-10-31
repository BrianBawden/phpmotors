<div>
    <a id="logo" href="#"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"></a>
    <a class="plain_link" id="log_in" href="/phpmotors/accounts/index.php?action=sign_in">My Account</a>
    <?php if(isset($cookieFirstname)){
            echo "<span id='cookieWelcome'>Welcome $cookieFirstname</span>";
          } 
    ?>
</div>