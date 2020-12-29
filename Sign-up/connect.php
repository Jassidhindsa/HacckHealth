<?php
$server_name="127.0.0.1";
$username="root";
$password="";
$database_name="Hackathon";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
    $password = $_POST['password'];
	$emergency_contacts = $_POST['emergency_contacts'];
	$medical_record = $_POST['medical_record'];

	 $sql_query = "INSERT INTO register (name,gender,email,password,emergency_contacts,medical_record)
	 VALUES ('$name','$gender','$email','$password','$emergency_contacts','$medical_record')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>