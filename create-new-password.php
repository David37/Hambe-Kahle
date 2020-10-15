<?php

$selector=$_GET['selector'];
$validator=$_GET['validator'];
if(empty($selector) || empty($validator)){
    echo "Could not validate your request!";
}else{
    if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false){
        //display form for the user to enter in their new password
        ?>
        <form action="include/configs/reset-password.api.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector?>">
            <input type="hidden" name="validator" value="<?php echo $validator?>">
            <input type="password" name="pwd" id="pwd" placeholder="Enter a new password...">
            <input type="password" name="pwdRepeat" id="pwd" placeholder="Repeat new password...">
            <input type="submit" name="reset-password-submit" value="Reset password">
        </form>
        <?php
    }
}