<?php
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $firstname = $_POST['firstname'];
    // $lastname = $_POST['lastname'];
    // $birthdate = $_POST['birthdate'];
    // $mobile = $_POST['mobile'];
    // $email = $_POST['email'];

    // //database connection
    // $conn = new mysqli('localhost','root','','sospicious_db');
    // if($conn->connect_error){
    //     die('Connection Failed : '.$conn->connect_error);
    // }else{
    //     $stmt = $conn->prepare("insert into user(username, password, firstname, lastname, birthdate, mobile, email) values(?, ?, ?, ?, ?, ?, ?)");
    //     $stmt->bind_param("sssssss", $username, $password, $firstname, $lastname, $birthdate, $mobile, $email);
    //     $stmt->execute();
    //     echo "Registration Successful...";
    //     $stmt->close();
    //     $conn->close();
    // }
    print_r($_POST);
?>