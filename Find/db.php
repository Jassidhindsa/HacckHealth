<?php

$dsn = 'mysql:host=302.202.184.238;dbname=Hackathon';
$user = 'root';
$passwd = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $dbh = new PDO($dsn, $user, $passwd, $options); 
} 
catch (PDOException $e) {
    exit("Error:".$e ->getMessage());
}

?>