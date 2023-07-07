<?php 
    session_start();
    require_once("../php/connect.php");
    require_once("../php/function.php");

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