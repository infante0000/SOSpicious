<?php
    DEFINE("DB_HOST", "localhost");
    DEFINE("DB_USER", "root");
    DEFINE("DB_PASS", "");
    DEFINE("DB_NAME", "sospicious_db");

    class Database {
    private $serverName = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME; 

    private $isConnected = false;
    private $conn;
    private $dsn;
    private $error;
    private $stmt ="";

    public function __construct() {
        $this->dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbName;
        $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->conn = new PDO($this->dsn,$this->username,$this->password,$options);
            $this->isConnected = true;
            echo ($this->isConnected) ? "is connected" : "is not connected";
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            $this->isConnected = false;
        }
    }
}
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