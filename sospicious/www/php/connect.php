<?php
    require_once "../php/config.php";

    $conn;
    
    class Database {
        private $serverName = DB_HOST;
        private $username = DB_USER;
        private $password = DB_PASS;
        private $dbName = DB_NAME;

        public function __construct() {
            try{
                $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName",$this->username, $this->password, $options);
                echo "Connection Success";
            }
            catch(PDOException $e){
                echo "Error in connection" . $e->getMessage();
            }
        }
                
    }
?>