<?php

if(isset($_POST['reset-password-submit'])){
    $selector= $_POST['selector'];
    $validator= $_POST['validator'];
    $password = $_POST['pwd'];
    $passwordRepeat= $_POST['pwdRepeat'];
    // error handling
    if($password!==$passwordRepeat){
        header("Location: ../../create-new-password.php"); // remember to add the tokens
        exit();
    }
    $currentDate= date("U");
    require_once("include/configs/config.php");
    $conn=mysqli_connect();
    $query= "SELECT * FROM pwdReset WHERE pwdSelector=? AND pwdResetExpires >= $currentDate;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$selector);
        mysqli_stmt_execute($stmt);

        $result=mysqli_stmt_get_result($stmt);
        if(!$row=mysqli_fetch_assoc($result)){
            echo "resubmit your reset request!";
            exit();
        }else{
            $tokenBin= hex2bin($validator);
            $tokenValid= password_verify($tokenBin,$row['pwdResetToken']);
            if($tokenValid===false){
                echo "resubmit your reset request!";
            }elseif($tokenValid===true){
                $tokenEmail=$row['pwdResetEmail'];
                $query= "SELECT * FROM passwords WHERE email=?;";
                if(!mysqli_stmt_prepare($stmt,$query)){
                    echo "There was an error";
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    if(!$row=mysqli_fetch_assoc($result)){
                        echo "There was an error";
                        exit();
                    }else{
                        $query="UPDATE passwords SET password=? WHERE email= ? ;";
                        $stmt=mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$query)){
                            echo "There was an error";
                            exit();
                        }else{
                            $hashedPassword= password_hash($password,PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt,"ss",$hashedPassword,$tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $query="DELETE FROM pwdRest WHERE pwdResetEmail=?";
                            if(!mysqli_stmt_prepare($stmt,$query)){
                                echo "There was an error";
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ?newPwd=passwordUpdated");// update the location to which user is redirected to after successful password reset
                            }
                        }

                     }

                }
            }
        }
    }

}else{
    header("Location: ../../index.php");
    exit();
}