<html>
<title>userProfile.php</title>
<body>
 <?php
     session_start();
     $username = $_SESSION['email'];
 ?>
 
 <div style="text-align:center"><h1>User Profile</h1></div>
 <br/>
 
 <div style="font-weight:bold"> Welcome <?php echo $username ?> </div>
  
 <div style="text-align: right"><a href="Logout.php">Logout</a></div> <!-- calling Logout.php to destroy the session -->
 
 <?php
 if(!isset($_SESSION['email'])) //If user is not logged in then he cannot access the profile page
 {
     //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
     header("location:LoginForm.php");
 }
 ?>
</body>
</html>