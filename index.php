<?php
    //require_once("include/googleConfig.inc.php");
    // if(isset($_SESSION['access_token'])){
    //     header('Location: booking.html');
    //     exit();
    // }
    //$loginURL=$gClient->createAuthUrl();
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <title>Hambe Kahle</title>
    <link rel="shortcut icon" href="img/logo.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    crossorigin="anonymous">
    <link  rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript"> (function() 
    { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; 
    document.getElementsByTagName('head')[0].appendChild(css); })(); </script>


    
</head>

<body>
    <section class="home-booking">
        <?php require_once("header.php");?> 
        <div class="container"></div>
            <h1 class="home-title">Taking you to where you need to go</h1>
            <a href="booking.html" class="button button-accent">Create a booking now</a>
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
<div class="bg-modal" id="login-modal">
    <div class="modal-content">
        <div class="close">&times;</div>
        <h3 style="text-align:left;">Sign In</h3>
        <form style="border-bottom: 2px black solid; padding:.7em;" method="POST">
            <div class="input-login">
                <label for="email" >E-mail Address:</label>
                <input type="email" name="email" id="email" placeholder="email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="" placeholder="password" required>
                <p></p>
                <p style="display:grid; grid-template-columns: .1fr max-content; margin:8px 0 0 0;">
                    <input type="checkbox" name="rememberMe" id="rememberMe" style="margin-bottom:1em;">
                    <label for="rememberMe" style="margin-top:-.2em;">Remember Me</label>
                </p>
                <p></p>
                <a href="#" style="text-align:left; margin-top:-.7em;">Forgot your password?</a>
                <p></p>
                <input type="submit" name="submit" value="Sign In" style="width:33%">
            </div>
        </form>
        <p style="margin:0; position: absolute; bottom:10em; left:42.5%;  background-color:white; width:15%;">Or</p>
        <p style="padding:1em 0 0 0; text-align: left;">Sign In using your account with</p>
        <div class="social-login-container">
            <div class="row btn-facebook">
                <div class="col-md-3">
                    <a class="btn btn-outline-primary facebook" href="<?php echo getFacebookLoginUrl(); ?>" role="button" style="text-transform:none">
                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" />
                        Facebook
                      </a>
                </div>
            </div>
            <div class="row btn-google">
               <div class="col-md-3">
                 <a class="btn btn-outline-dark" href="<?php echo $googleLoginURL?>" role="button" style="text-transform:none">
                   <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                   Google
                 </a>
               </div>
           </div>
        </div>
        <p style="padding:1em 0 0 0; text-align: left;">Create a new account?  <a href="#">  Register</a></p>
    </div>
</div>

</html>

<script>

    var modal=document.getElementById('login-modal');
    document.getElementById('button').addEventListener('click',
    function(){
        document.querySelector('.bg-modal').style.display='flex';
        //document.body.style.position = 'fixed';
        //document.body.style.top = `-${window.scrollY}px`;
    });
    
    document.querySelector('.close').addEventListener('click',
    function(){
        document.querySelector('.bg-modal').style.display='none';
        //document.body.style.position = '';
        //document.body.style.top = '';
    });

    window.addEventListener('click',
    function(e){
        if(e.target==modal){
            modal.style.display='none';
        }
            
    });
</script>