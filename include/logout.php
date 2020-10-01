<?php
    session_start();
    require_once("configs/config.php");
    unset($_SESSION['access_token']);
    unset($_SESSION['loggedIn']);
    $gClient->revokeToken();
    session_destroy();
    echo "you have been logged out!";
    header("Location: http://localhost/Hambe-Kahle/index.php");
    exit();
?>