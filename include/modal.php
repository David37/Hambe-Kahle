
<div class="bg-modal" id="login-modal">
    <div class="modal-content">
        <div class="close">&times;</div>
        <h3 style="text-align:left;">Sign In</h3>
        <form style="border-bottom: 2px black solid; padding:.7em;" action="include/login.inc.php" method="POST">
            <div class="input-login">
                <label for="email" >E-mail Address:</label>
                <input type="email" name="email" id="email" placeholder="email" 
                       value= "<?php if(isset($_COOKIE['email_cookie'])){echo $_COOKIE['email_cookie'];}?>" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="" placeholder="password" 
                       value="<?php if(isset($_COOKIE['password_cookie'])){echo $_COOKIE['password_cookie'];}?>" required>
                <p></p>
                <p style="display:grid; grid-template-columns: .1fr max-content; margin:8px 0 0 0;">
                    <input type="checkbox" name="rememberMe" id="rememberMe" style="margin-bottom:1em;"
                        <?php if(isset($_COOKIE['email_cookie']) && isset($_COOKIE['password_cookie'])) {?> checked <?php } ?>>
                    <label for="rememberMe" style="margin-top:-.2em;">Remember Me</label>
                </p>
                <p></p>
                <a href="#" style="text-align:left; margin-top:-.7em;">Forgot your password?</a>
                <p></p>
                <input type="submit" name="login-submit" value="Sign In" style="width:33%">
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

<?php if(!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true)){
    echo 
    "<script>

    
        var modal=document.getElementById('login-modal');
        document.getElementById('button').addEventListener('click',
        function(){
            document.querySelector('.bg-modal').style.display='flex';
            //document.body.style.position = 'fixed';
            
        });
        
        document.querySelector('.close').addEventListener('click',
        function(){
            closeModal();
            //document.querySelector('.bg-modal').style.display='none';
            //document.body.style.position = '';
            //document.body.style.top = '';
            //window.location.replace=(window.location.href).replace(\"#\",\"\");
        });

        window.addEventListener('click',
        function(e){
            if(e.target==modal){
                closeModal();
            }           
        });



        if((window.location.href).slice(-1)==\"#\"){   
            document.querySelector('.bg-modal').style.display='flex';    
        }

        function closeModal(){
            document.querySelector('.bg-modal').style.display='none';
            window.location.replace((window.location.href).replace(\"#\",\"\"));
        }
    </script>";
}?>




