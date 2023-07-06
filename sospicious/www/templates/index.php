<?php 
    session_start();
    include("../php/connect.php");
    include("../php/function.php");

    $user_data = check_login($conn);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!empty($username) && !empty($password)) {
            //read from database
            $query = "SELECT * FROM user_infor WHERE username = '$username' LIMIT 1";

            $result = mysqli_query($conn, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password){
                        
                        $_SESSION['user_id'] = $user_data['user_id'];
                        echo "Login Success";
                        die;
                        // header("Location: ../templates/index.php");
                        // die;
                    }
                }
            }
            echo "Wrong username or password!";
            // header("Location: ../templates/index.php");
            // die;
       }else{
        echo "Wrong username or password!";
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
         <div class="login-form">
               <h1>Welcome!</h1>
               <p>Saving lives, one <span>click</span> at a time.</p>
               <form method="post" novalidate>
                     <div class="login_input">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username" required>
                        <div class="icon"><i class="fas fa-user"></i></div>
                     </div>
                     <div class="login_input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required> 
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <i class="fas fa-eye-slash loginShowpass" id="showPassword"></i>
                     </div>
                     <div class="login_forgot">
                        <a href="#">Forgot Password?</a>
                     </div>
                     <div class="login_button">
                        <button type="submit" name="login">Sign in</button>
                     </div>
                     <!-- <div class="login_signup">
                        <p>Don't have an account? <a onclick="changetoRegister()" href="#">SIGN UP</a></p>
                     </div> -->
                     <div class="login_signup">
                        <p>Don't have an account? <a href="../php/signup.php">SIGN UP</a></p>
                     </div>
               </form>
         </div>
   </div>
    <script src="cordova.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>



<!-- <!DOCTYPE html>
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
         <a href="../php/login.php" class="logout">Logout</a>
         <a href="../php/signup.php" class="signup">Signup</a>
      </div>
   </div>
    <script src="cordova.js"></script>
    <script src="../js/index.js"></script>
</body>
</html> -->