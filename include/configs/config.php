<?php

// database details

define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "G18K1405");

// facebook API details

define('FB_APP_ID','346666639925318');
define('FB_APP_SECRET','e32dacbba20f8853578dcf304b4a550c');
define('FB_REDIRECT_URI','http://localhost/Hambe-Kahle/index.php');
define('USER_LEVEL_ADMIN','1');
define('FB_GRAPH_VERSION','v6.0');
define('FB_GRAPH_DOMAIN','https://graph.facebook.com/');
define('FB_APP_STATE','eciphp');

// google API details

require_once("GoogleAPI/vendor/autoload.php");
$gClient= new Google_Client();
$gClient->setClientId("665033783343-7sfi3f7o1kn04tv1ol13ismb4tq6a0a6.apps.googleusercontent.com");
$gClient->setClientSecret("j2bkgmTYCg6gB_u6iAI9AXMZ");
$gClient->setApplicationName("Hambe Kahle Login");
$gClient->setRedirectUri("http://localhost/Hambe-Kahle/include/configs/google.api.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
