<?php

$dsn = "mysql:host=35.202.184.238;dbname=Hackathon";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    echo "You have connected!";
} catch (PDOException $e) {
    $error_message = $e->get_message();
    exit();
}
?>