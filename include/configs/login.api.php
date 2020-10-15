<?php
session_start();
if(isset($_POST['login-submit'])){
    require_once("config.php");
    $conn= mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
        or die("Connection error:");
    $email= $_POST['email'];
    $password= $_POST['password'];
    if(empty($email) || empty($password)){
        header("Location:" . $_SESSION['previous_location'] . "?error#");
        exit();
    }
    else{
        $query="SELECT * FROM passwords WHERE email = ? ";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            //error with query statement 
            echo "invalid query";
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row= mysqli_fetch_assoc($result)){
                $pwdIsValid= password_verify($password,$row['password']);
                if($pwdIsValid==false){  // wrong password
                    header("Location:" . $_SESSION['previous_location'] . "?email=$email&error=pwd#");
                    exit();
                }
                else if($pwdIsValid==true){
                    // storing the variables that will be used within the websites session
                    $_SESSION['email']= $row['email'];
                    $query="SELECT clientID FROM client WHERE email = ?";
                    if(!mysqli_stmt_prepare($stmt,$query)) die("invalid query");
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    $row= mysqli_fetch_assoc($result);
                    $_SESSION['userID']=$row['clientID'];
                    $_SESSION['name']=$row['firstName'];
                    $_SESSION['loggedIn']=true;
                    // Adds or remove cookies if remember me is set or not
                    if(!empty($_POST['rememberMe'])){
                        setcookie("email_cookie",$_POST['email'],time()+86400);
                        setcookie("password_cookie",$_POST['password'],time()+86400);
                    }
                    else{
                        if(isset($_COOKIE['email_cookie'])){ setcookie("email_cookie","",time()-3600);}
                        if(isset($_COOKIE['password_cookie'])){ setcookie("password_cookie","",time()-3600);}
                    }
                    // redirect to page user logged in from
                    header("Location:" . $_SESSION['previous_location']);
                    exit();
                }
                else{
                    //An error has occured within password_verify()
                }
            }else{
                //no user was found on the database
                header("Location: ". $_SESSION['previous_location'] . "?error=email#");
                exit();

            }
        }
        //mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    // closes connection to the database
    //mysqli_stmt_close($stmt);
    //mysqli_close($conn);
}
else{ // user accessed page without submitting a form
    header("Location: " . $_SESSION['previous_location']);
    exit();
}
?>