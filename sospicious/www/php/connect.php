<?php
    require_once "../php/config.php";
    $serverName = DB_HOST;
    $username = DB_USER;
    $password = DB_PASS;
    $dbName = DB_NAME; 

    // try{
    //     $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    //     $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$username, $password, $options);
    //     echo "Connection Success";  
    //     return $conn;
    // }
    // catch(PDOException $e){
    //     echo "Error in connection " . $e->getMessage();
    // }

   if(!$conn = mysqli_connect($serverName, $username, $password, $dbName)){
        die("Error in Connection");
   } 



?>