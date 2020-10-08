<?php
    //require_once("include/googleConfig.inc.php");
    // if(isset($_SESSION['access_token'])){
    //     header('Location: booking.html');
    //     exit();
    // }
    //$loginURL=$gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("include/head.html");?>
<body>
    <section class="home-booking">
        <?php 
            require_once("include/header.php");
            require_once("include/modal.php");
        ?> 
        <div class="container"></div>
            <h1 class="home-title">Taking you to where you need to go</h1>
            <a href="booking.php" class="button button-accent">Create a booking now</a>
        </div>
    </section>
    <section class="home-about">
        <div class="home-about-textbox">
            <h1>Who we are</h1>
            <p> sample text sample text sample text sample text sample text sample text sample text
                sample text sample text sample text sample text sample text sample text sample text
                sample text sample text sample text sample text sample text sample text sample text
                sample text sample text sample text sample text sample text sample text sample text
                sample text sample text sample text sample text sample text sample text sample text
            </p>
        </div>
    </section>


    <footer>
        <p>
            sample text sample text sample text sample text sample text sample text sample text
            sample text sample text sample text sample text sample text sample text sample text
            sample text sample text sample text sample text sample text sample text sample text
        </p>
        <ul>
            <li><a href=""></a>sample text</li>
            <li><a href=""></a>About us</li>
            <li><a href=""></a>sample text</li>
        </ul>
    </footer>
</body>

<!--Modal section-->
