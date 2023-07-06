<?php
    DEFINE("DB_HOST", "localhost");
    DEFINE("DB_USER", "root");
    DEFINE("DB_PASS", "");
    DEFINE("DB_NAME", "sospicious_db");

    $conn = mysqli_connect('localhost','root','','sospicious_db') or die('connection failed');
?>