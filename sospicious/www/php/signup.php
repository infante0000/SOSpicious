<?php
session_start();
include("connect.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $birthdate = $_POST["birthdate"];

    $errors = array();

    // Check if fields are empty
    if (empty($username)) {
        $errors[] = "Username is required!";
    }
    if (empty($password)) {
        $errors[] = "Password is required!";
    }
    if (empty($firstname)) {
        $errors[] = "First name is required!";
    }
    if (empty($lastname)) {
        $errors[] = "Last name is required!";
    }
    if (empty($email)) {
        $errors[] = "Email is required!";
    }
    if (empty($mobile)) {
        $errors[] = "Mobile number is required!";
    }
    if (empty($birthdate)) {
        $errors[] = "Birthdate is required!";
    }

    // If there are no errors, proceed with further validation
    if (empty($errors)) {
        // Check if username or email already exists
        $existingUserQuery = "SELECT * FROM user_infor WHERE username = '$username' OR user_email = '$email'";
        $existingUserResult = mysqli_query($conn, $existingUserQuery);

        if (mysqli_num_rows($existingUserResult) > 0) {
            $errors[] = "Username or email already exists!";
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format!";
        }

        // Validate password requirements
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $errors[] = "Password must include at least one number!";
        } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
            $errors[] = "Password must include at least one letter!";
        }

        // Validate birthdate
        if (!empty($birthdate)) {
            $birthDateTimestamp = strtotime($birthdate);
            $nowTimestamp = time();
            $minAgeTimestamp = strtotime('-150 years', $nowTimestamp);
            $minAge = date('Y-m-d', $minAgeTimestamp);
            $maxAgeTimestamp = strtotime('-1 year', $nowTimestamp);
            $maxAge = date('Y-m-d', $maxAgeTimestamp);

            if ($birthDateTimestamp === false) {
                $errors[] = "Invalid birthdate!";
            } elseif ($birthdate < $minAge || $birthdate > $maxAge) {
                $errors[] = "Age must be between 1 and 150 years!";
            }
        }

        // If there are no errors, save to database
        if (empty($errors)) {
            $query = "INSERT INTO user_infor (username, password, user_fname, user_lname, user_email, user_mobile, user_birthdate) 
                      VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$mobile', '$birthdate')";

            mysqli_query($conn, $query);
            echo "Account created successfully!";
            header("Location: ../templates/index.php");
            die;
        }
    }

    // If two or more fields are empty, print "Please fill up all fields"
    if (count(array_filter($errors)) >= 2) {
        echo "Please fill up all fields";
    } else {
        // Print the last error message
        $lastError = end($errors);
        echo $lastError;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://kit.fontawesome.com/f99a56d007.js" crossorigin="anonymous"></script>
    <title>SOSpicious</title>
</head>
<body onload="myFunction()">
<div id="loading" class="intro">
        <img src="../img/sos-logo.gif" class="logo">
     </div>
     <header class="login_header">
        <img src="../img/sos-logo1.png" alt="logo2" class="logo-login">
     </header>
     <img src="../img/Fill 1 Copy 2.png" class="background-logo3">
     <div class="form-box">
         <div class="signup-form" id="REGISTER">
            <h1>Get Started!</h1>
            <p>Saving lives, one <span>click</span> at a time.</p>
            <form method="post" novalidate auto_complete = "off">
                  <div class="signup_input-group">
                     <div class="signup_input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required maxlength="20">
                     </div>
                     <div class="signup_input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required maxlength="15"> 
                        <i class="fas fa-eye-slash signupShowpass" id="showPassword"></i> 
                     </div>
                     <div class="signup_input">
                        <label for="FirstName">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="FirstName" required maxlength="20">
                     </div>
                     <div class="signup_input">
                        <label for="LastName">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="LastName" required maxlength="20">
                     </div>
                  </div>
                  <div class="signup_input">
                     <label for="Birthdate">Birthdate</label>
                     <input type="date" name="birthdate" required>
                  </div>
                  <div class="signup_input">
                        <label for="username">Mobile Number</label>
                        <input type="tel" name="mobile" id="mobile" placeholder="09XXXXXXXXX" required maxlength="11">
                  </div>
                  <div class="signup_input">
                     <label for="username">Email</label>
                     <input type="text" name="email" id="email" placeholder="example@gmail.com" required maxlength="30">
                  </div>

                  
                  <div class="signup_button">
                     <button type="submit" name="signup">Sign up</button>
                  </div>

                  <div class="signup_signin">
                     <p>Already registered? <a href="../templates/index.php">SIGN IN</a></p>
                  </div>
            </form>
         </div>
   </div>
    <script src="cordova.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>