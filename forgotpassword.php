<?php
session_start();
include_once "databsae.php";

if(isset($_POST["submit"]))
{
    $username = $_POST["uid"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='" . $_POST["username"] . "'");
    $row = mysqli_fetch_assoc($result);
            $fetch_username = $row["uid"];
            $email = $row["mail"];
            $password = $row["pwd"];
            if($username==$fetch_username) {
                $to = $email;
                $subject = "Password";
                $txt = "Your password is $password.";
                $headers = "From assistance@hambakahle.com" . "\r\n".;
                mail($to, $subject, $txt, $headers);
            }
            else{
                echo "Invalid username";
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password<h1>
    <form action='' method='post'>
        <table cellspacing='5' align='center'>
            <tr><td>Username: :</td><td><input type='text' name='uid'/></td></tr>
            <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
        </table>
    </form>
</body>
</html>