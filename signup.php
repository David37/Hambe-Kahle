<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<header>
        <div >
            <a href="index.html">
                <img href="index.html" src="img/logo.png" alt="Hambe Kahle logo" 
                class="logo" height="160" width="auto">
            </a>
        </div>
        <nav>
            <div class="loginn">
                <a href="" class="button">login</a>&nbsp &nbsp
                <a href="" class="button ">register</a> 
            </div>
            <ul>
                <li><a href="">Home</a></li>|
                <li><a href="">About Us</a></li>|
                <li><a href="">FAQ</a></li>
            </ul>
        </nav>
    </header>

<body>

    <div class="wrapper-main">
        <section class="section-default">
            <h1>Sign Up</h1>
            <p>Please fill in the form to create an account with Hamba Kahle.<br>
            It is important that you fill in your correct details.</p>
    
    <form action="register.php" method="POST">
        <div><br>
            <label for="firstName"><b>First Name:</b></label><br>
            <input type="text" class="form-control" name="f-name" id="f-name" placeholder="Enter first name" required><br>
            </label>
        </div>

        <div><br>
            <label for="lastName"><b>Last Name:</b></label><br>
            <input type="text"class="form-control" name="l-name" id="l-name" placeholder="Enter last name" required><br>
            </label>
        </div>

        <div><br>
            <label for="contactNumber"><b>Contact Number:</b></label><br>
            <input type="text" class="form-control" name="c-num" id="c-num" placeholder="Enter contact number" required><br>
            </label>
        </div>

        <div><br>
            <label for="email"><b>Email:</b></label><br>
            <input type="text" class="form-control" name="mail" id="mail" placeholder="Enter email" required><br>
            </label>
        </div>

        <div><br>
            <label for="username"><b>Username:</b></label><br>
            <input type="text" class="form-control" name="uid" id="uid" placeholder="Enter username" required><br>
            </label>
        </div>

        <div><br>
            <label for="password"><b>Password:</b></label><br>
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required><br>
            </label>
        </div>

        <div><br>
            <label for="repeatPassword"><b>Repeat Password:</b></label><br>
            <input type="password" class="form-control" name="pwd-repeat" id="pwd-repeat" placeholder="Enter password again" required><br>
            </label>
        </div>

        <div><br>
            <input type="submit" name="signup-submit" value="Sign Up">
        </div>

        <div>
            <p>Already have an account? <a href="Login.html">Sign In</a></p>
        </div>
    </form>
</body>
</html>