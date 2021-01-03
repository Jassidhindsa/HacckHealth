<?php
header('Content-type: application/json');
$server_name="35.202.184.238";
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
	$sql_query = "SELECT name,address,lat,lng, ( 3959 * acos( cos( radians('$lat') ) * cos( radians( lat ) ) * 
	cos( radians( lng ) - radians('$lon') ) + sin( radians('$lat') ) * 
	sin( radians( lat ) ) ) ) AS distance FROM markers  ORDER BY distance LIMIT 1";

	$result = $conn->query($sql_query);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$data = [ 'lat' => $row["lat"], 'lng' => $row["lng"] ];
		echo json_encode($data);
		//  "Nearest Hospital : " . $row["name"]. "<br> Addres: " . $row["address"]."<br> Dist : ". $row["distance"]. "<br>";
	}
	} else {
	echo "0 results";
	}
	 
	 mysqli_close($conn);
?>