<?php

include('db.php');

$v1 = doubleval($_GET['lat']);
$v2 = doubleval($_GET['long']);

$sql = "SELECT id, 3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - LatOnTable) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(LatOnTable * pi()/180) * POWER(SIN(( $long - LongOnTable) * pi()/180 / 2), 2) ))) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0, 20";

$query = $db ->prepare($sql);
$query->execute();
$results = $query -> fetchALL(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0) {
    foreach ($results as $result) {

?>
        
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Distance as KM</th>
  </tr>
  <tr>
    <td><?php echo htmlentities($result->id); ?></td>
    <td><?php echo htmlentities($result->name); ?></td>
    <td><?php echo htmlentities($result->distance); ?></td>
  </tr>
</table>

</body>
</html>

        
<?php
    }
}

?>