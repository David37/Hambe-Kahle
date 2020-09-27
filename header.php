<?php
    require_once("autoloader.php");
    // if(isset($_GET['state']) && FB_APP_STATE== $_GET['state']){
    //     $fbLogin= tryLoginWithFacebook($_GET);
    // }
    $googleLoginURL=$gClient->createAuthUrl();
    

?>
<header>
        <div >
            <a href="index.php">
                <img href="index.html" src="img/logo.png" alt="Hambe Kahle logo" 
                class="logo" height="160" width="auto">
            </a>
        </div>
        <nav>
         <div class="login">
            <?php
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                    echo 
                    "<a href=\"#\" class=\"loggedIn-button\"><i class=\"fa fa-user-cog\"></i> Admin
                        <div class=\"user-menu\">
                            <a href=\"logout.php\" class=\"sub\">Logout</a>
                        </div>
                     </a>";
                }
                else{
                    echo 
                    "   <a href=\"#\" class=\"button\" id=\"button\">login</a>&nbsp &nbsp
                        <a href=\"\" class=\"button\">register</a>";
                }
            ?>
            </div>
            <ul>
                <li><a href="">Home</a></li>|
                <li><a href="">About Us</a></li>|
                <li><a href="">FAQ</a></li>
            </ul>
        </nav>
</header>