<?php
    session_start();
    require_once("config.php");
    if(isset($_SESSION['access_token'])){
        $gClient->setAccessToken($_SESSION['access_token']);
    }
    else if(isset($_GET['code'])){
        try{

            $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token']=$token;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    else {
        header('Location: ../' . $_SESSION['previous_location'] . '?error#');
        exit();

    }


    $oAuth= new Google_Service_Oauth2($gClient);
    $userData= $oAuth->userinfo_v2_me->get();
    // echo "<pre>";
    // var_dump($userData);
    $_SESSION['email']=$userData['email'];
    $_SESSION['first_name']=$userData['givenName'];
    $_SESSION['last_name']=$userData['familyName'];
    $_SESSION['loggedIn']=true;

    header("Location: " . $_SESSION['previous_location']);
    exit();