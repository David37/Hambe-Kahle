<?php
    require_once("header.php");
?>

<h1>Reset your password</h1>
<p>An e-mail will be sent to you with instructions on how to reset your password.</p>
<form action="include/configs/reset-request.api.php" method="POST">
    <input type="email" name="email" id="email" placeholder="Enter your email adddress...">
    <input type="submit" name="reset-request-submit" value="Recieve new password by email">
</form>
<?php
    if(isset($_GET['reset'])){
        if($_GET['reset']=="success"){
            echo "<p>Check your email</p>";
        }
    }
?>