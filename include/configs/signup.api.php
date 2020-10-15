<?php
session_start();
if(isset($_POST['signup-submit'])){
    // get database credentails
    require_once("config.php");
    // connect to the database
    $conn= mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
        or die("Connection failed:" . mysqli_connect_error());
    // set up variable names
    $firstName= $_POST['f-name'];
    $lastName= $_POST['l-name'];
    $contactNum= $_POST['c-num'];
    $email= $_POST['email'];
    $username= $_POST['uid'];
    $password= $_POST['pwd'];
    $passwordRepeat= $_POST['pwd-repeat'];
    $collectionPoint="";
    $userType="client";
    // user data validation
    if(empty($email) || empty($firstName) || empty($lastName) || empty($password) || empty($passwordRepeat)){ // checks if username is empty
        header("Location: ". $_SESSION['previous_location'] . "?error");
        exit();
        //error
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$",$username)){
        //error
        header("Location: ". $_SESSION['previous_location'] . "?error");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //checks if email is valid
        //error
        header("Location: ". $_SESSION['previous_location'] . "?error");
        exit();
    }
    else if($password !== $passwordRepeat){ // checks if user passwords match
        //error
        header("Location: ". $_SESSION['previous_location'] . "?error=pwdMatch");
        exit();
    }
    else{
        //checks if the username is already inside the database
        $query="SELECT email FROM client WHERE email = ?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            //Sql error within query
            echo "invalid query";
        }else{ 
            // runs information inside the database
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt); // gets the amount of results from the database
            if($resultCheck>0){
                // error user email is already in the database
                echo "This email already exists";
            }
            else{ // users data is valid and can be inserted into the database
                $clientQuery="INSERT INTO client (firstName,lastName, contactNumber, email, initialCollectionPoint) VALUES(?,?,?,?,?)";
                $passwordsQuery= "INSERT INTO passwords (email, userName, password, usertype) VALUES(?,?,?,?);";
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$clientQuery)){
                        // query failed, user data cannot be inserted into the database
                        echo "data could not be entered into the database";
                } else{
                    mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$contactNum,$email,$collectionPoint);
                    mysqli_stmt_execute($stmt);
                    if(!mysqli_stmt_prepare($stmt,$passwordsQuery)){
                        // query failed, user data cannot be inserted into the database
                        echo "data could not be entered into the passwords database";
                    } else{
                        $hashedPwd= password_hash($password,PASSWORD_DEFAULT); // encrypts the users password using BCRYPT
                        mysqli_stmt_bind_param($stmt,"ssss",$email,$username,$hashedPwd,$userType);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../../index.php");
                        exit();
                    }
                    
                }
            }


        }

    }
    // closes connection to the database
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{ // user enters page without submitting a form
    header("Location: " . $_SESSION['previous_location']);
    exit();
}

?>