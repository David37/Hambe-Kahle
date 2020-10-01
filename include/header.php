<?php
    session_start();
    $_SESSION['previous_location'] = $_SERVER['REQUEST_URI'];
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
                    "<div class=\"dropdown\">
                        <a href=\"#\" class=\"button dropBtn\"><i class=\"fa fa-user-cog\"></i> Admin</a>
                        <div class=\"dropdown-content\">
                            <a href=\"#\">Account settings</a>
                            <a href=\"#\">Bookings</a>
                            <a href=\"include/logout.php\">Logout</a>
                        </div>
                    </div>
                    ";
                }
                else{
                    echo 
                    "   <a href=\"#\" class=\"button\" id=\"button\">login</a>&nbsp &nbsp
                        <a href=\"signup.php\" class=\"button\">register</a>";
                }
            ?>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>|
                <li><a href="">About Us</a></li>|
                <li><a href="">FAQ</a></li>
            </ul>
        </nav>
</header>