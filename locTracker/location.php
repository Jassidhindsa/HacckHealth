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

	$email = $_POST['email'];
	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	 $sql_query = "INSERT INTO location (email,lat,lon)
	 VALUES ('$email','$lat','$lon')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "Updated your location !!";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
?>