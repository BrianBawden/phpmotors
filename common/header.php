<div>
    <a id="logo" href="/phpmotors"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"></a>
    <?php if(isset($sessionFirstname)){
      echo '<a class="plain_link" id="log_in" href="/phpmotors/accounts/index.php?action=logout">Sign Out</a>';
      echo "<a href='/phpmotors/accounts/?action=admin'><span id='sessionWelcome'>Welcome $sessionFirstname</span></a>";
    }
    if(!isset($sessionFirstname)){
            echo '<a class="plain_link" id="log_in" href="/phpmotors/accounts/index.php?action=sign_in">My Account</a>';
      
          } 
    ?>
</div>