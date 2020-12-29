<html>
<body>
<?php 
 include_once("DBConnection.php"); 
 session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
    if (empty($_POST['email']) || empty($_POST['password']))
    { 
        echo 
        "Incorrect username or password";
        header("location: LoginForm.html");
    } 
 
     $inusername = $_POST["email"];
     $inPassword = $_POST["password"]; 
     $stmt= $db->prepare("SELECT email, password FROM register WHERE email = ?"); 
     $stmt->bind_param("s", $inusername); 
     $stmt->execute();
     $stmt->bind_result($usernameDB, $PasswordDB); 
      
    if ($stmt->fetch())
     {
        $_SESSION['email']=$inusername; 
        header("location: UserProfile.php"); 
     }
     else
     {
           echo "Incorrect username or password"; 
          ?>         
          <a href="LoginForm.html">Re-Login</a>
       <?php 
     } 
} 
       ?>
</body> 
</html>