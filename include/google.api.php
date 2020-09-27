<?php
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
        header('Location: ../' . $page . '?error');
        exit();

    }


    $oAuth= new Google_Service_Oauth2($gClient);
    $userData= $oAuth->userinfo_v2_me->get();
    // echo "<pre>";
    // var_dump($userData);
    session_start();
    $_SESSION['email']=$userData['email'];
    $_SESSION['first_name']=$userData['givenName'];
    $_SESSION['last_name']=$userData['familyName'];
    $_SESSION['loggedIn']=true;
    //header('Location: http://localhost/' . $_SERVER['REQUEST_URI']);
    header("Location: http://localhost/Hambe-Kahle/index.php");
    //echo $_SESSION['loggedIn'];
    //header("Refresh:0; url=http://localhost/Hambe-Kahle/index.php");
    //exit;