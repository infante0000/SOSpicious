<?php
    session_start();
    include("connect.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $username = $_POST["username"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $birthdate = $_POST["birthdate"];

        if (!empty($username) && !empty($password) 
        && !empty($firstname) && !empty($lastname) 
        && !empty($email) && !empty($mobile) 
        && !empty($birthdate)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                echo "Invalid email format!";
                die;
            }else{

            }

            //save to database
            $query = "INSERT INTO user_infor (username, password, user_fname, user_lname, user_email, user_mobile, user_birthdate) 
                VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$mobile', '$birthdate')";

            mysqli_query($conn, $query);

            // header("Location: ../templates/index.php");
            // die;
       }else{
        echo "Please fill in all the fields!";
       }
    }

    // if(isset($_POST["submit"])){
    //     $username = $_POST["username"];
    //     $password = $_POST["password"];
    //     $firstname = $_POST["firstname"];
    //     $lastname = $_POST["lastname"];
    //     $email = $_POST["email"];
    //     $mobile = $_POST["mobile"];
    //     $birthdate = $_POST["birthdate"];

    //     $select = mysqli_query($conn, "SELECT username FROM user_infor WHERE username = '$username'");
    //     $error = array();

    //     if (empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($birthdate)) {
    //          $error[] = "Please fill in all the fields!";
    //          echo "Please fill in all the fields!"; 
    //     }
        // if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        //     array_push($error, "Invalid email format!");
        // }
        // if (strlen($password) < 8) {
        //     array_push($error, "Password must be at least 8 characters!");
        // }
        // if ( ! preg_match("#[0-9]+#", $password) ) {
        //     array_push($error, "Password must include at least one number!");
        // }
        // if ( ! preg_match("#[a-zA-Z]+#", $password) ) {
        //     array_push($error, "Password must include at least one letter!");
        // }

        // if (count($error)>0) {
        //     foreach ($error as $error) {
        //         echo "<div class='alert alert-danger' role='alert'> $error </div>";
        //     }
        // }else{
        //     //insert of data
        // }

    


// echo "Sign up success!";
    // print_r($_POST);
    // var_dump($password_hash)
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
            <form method="post" novalidate>
                  <div class="signup_input-group">
                     <div class="signup_input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                     </div>
                     <div class="signup_input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required> 
                        <i class="fas fa-eye-slash signupShowpass" id="showPassword"></i> 
                     </div>
                     <div class="signup_input">
                        <label for="FirstName">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="FirstName" required>
                     </div>
                     <div class="signup_input">
                        <label for="LastName">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="LastName" required>
                     </div>
                  </div>
                  <div class="signup_input">
                     <label for="Birthdate">Email</label>
                     <input type="date" name="birthdate" placeholder="example@gmail.com" required>
                  </div>
                  <div class="signup_input">
                        <label for="username">Mobile Number</label>
                        <input type="tel" name="mobile" id="mobile" placeholder="09XXXXXXXXX" required>
                  </div>
                  <div class="signup_input">
                     <label for="username">Email</label>
                     <input type="text" name="email" id="email" placeholder="example@gmail.com" required>
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