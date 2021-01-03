<?php

$server_name="35.202.184.238";
$username="root";
$password="";
$database_name="Hackathon";

$conn=mysqli_connect($server_name, $username, $password, $database_name);
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
	$emergency_contacts1 = $_POST['emergency_contacts1'];
	$emergency_contacts2 = $_POST['emergency_contacts2'];
	$medical_record = $_POST['medical_record'];

	 $sql_query = "INSERT INTO register (name,gender,email,password,emergency_contacts1,emergency_contacts2,medical_record)
	 VALUES ('$name','$gender','$email','$password','$emergency_contacts1','$emergency_contacts2','$medical_record')";

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