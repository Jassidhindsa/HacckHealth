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


<head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIp9isaijZWrwpei_h54KyUBxouRJ8VQA&callback=initMap"
type="text/javascript"></script>
  <style type = "text/css">
  
   #map{
       width: 2000px;
       height:800px;
   }

  </style>

<script type="text/javascript">

    x = navigator.geolocation;

    x.getCurrentPosition(success, failure);

    function success(position) {

        var myLat = position.coords.latitude;
        var myLong = position.coords.longitude;

        var coords = new google.maps.LatLng(myLat, myLong);

        var mapOptions = {
            zoom:13,
            center : coords,
            mapTypeId : google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var marker = new google.maps.Marker({map:map, position:coords});



  function saveData() {     //start

            var pos = {
        lat : myLat,
        lng : myLang
    }
    var name = escape(document.getElementById('name').value);
    var address = escape(document.getElementById('address').value);
    var collateral = document.getElementById('collateral').value;
    var type = document.getElementById('type').value;
    var url = 'phpsqlinfo_addrow.php?name=' + name + '&address=' + address + '&collateral=' + collateral + 
              '&type=' + type + '&lat=' + pos.lat + '&lng=' + pos.lng;
    downloadUrl(url, function(data, responseCode) {

      if (responseCode == 200 && data.length <= 1) {
        infowindow.close();
        messagewindow.open(map, marker);
      }
    });
    //console.log(url);
}
    }//end
function failure(){}


</script>
</head>
<body>
    <div id = "map"></div>
</body>

</html>