<?php 
    define('DB_SERVER', '127.0.0.1'); 
    define('DB_USERNAME', 'root');  
    define('DB_PASSWORD', ''); 
    define('DB_DATABASE', 'Hackathon');

    try{
        $dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8'"));
    }
    catch(PDOException $e) {
        exit("Error:".$e ->getMessage());
    }
    
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
?>