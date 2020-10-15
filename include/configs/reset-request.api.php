<?php

if(isset($_POST['reset-request-submit'])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url= "http://localhost/Hambe-Kahle/create-new-password.php?selector=$selector&validator=" . bin2hex($token);
    
    $expires = date("U") + 900;

    $userEmail= $_POST['email'];
    // connect to database
    $conn=mysqli_connect();
    $query= "DELETE FROM pwdReset WHERE pwdResetEmail = ? ";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)){
        //query failed
        echo "There was an error executing query in database";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }
    $query="INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    if(!mysqli_stmt_prepare($stmt,$query)){
        //query failed
        echo "There was an error executing query in database";
        exit();
    }else{// entering data into database
        $hashedToken=password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }
    // closing database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    // sending user email
    $to = $userEmail;
    $subject = 'Reset your password for Hambe Kahle';
    $message= '<p>We a password reset request. The link to reset your password is below. If you did
    not make this request you can ignore this email.</p>';
    $message.= '<p>Here if your password reset link: </br>';
    $message.= '<a href="' . $url . '">' . $url . '</a></p>';

    //send mail

    // redirect user

    header("Location: ../../reset-password.php?reset=success")
    exit();
}else{
    header("Location: ../../index.php");
    exit();
}