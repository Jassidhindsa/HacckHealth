<?php 
 
 session_start();
 $username = $_SESSION['email']; //retrieve the session variable
 
 unset($_SESSION['email']); //to remove session variable
 session_destroy(); //destroy the session
 header("location: LoginForm.html");
 exit();
 
 if(!isset($_SESSION['email']))
 {
 echo 'You are not logged in. <a href="Login.php">Click here</a> to log in.';
 header("location:LoginForm.html");
 }
?>