<?php
include "main.php";
?>

<div class="container">
  
  <div id="map" style='width:100%; height:400px;'></div>
    <script>

      function initMap() {
		  
		  
        var myLatLng = {lat:38.016, lng: 23.701};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: myLatLng
        });
<?php
	$i=0;
	
	$s="select *, id_station as ids from stations";
	if (isset($_POST['sprod']))
	{
	$s="select *, stations.id_station as ids from stations,products_station where products_station.id_station=stations.id_station and products_station.id_product=$_POST[sprod] ";
	}
	
	
	if (isset($_POST['sshop']))
	{
	$s="select *, id_station as ids from stations where station_name like '%$_POST[sshop]%'";
	}
	
	$r=mysqli_query($conn,$s);
	while($row=mysqli_fetch_array($r))
	{	

		echo  " 
			
			 var myLatLng$i = {lat:$row[latitude], lng: $row[longititude]};
			 var marker$i = new google.maps.Marker({
			  position: myLatLng$i,
			  map: map,
			 title: '$row[station_name]'});";
			  
			  echo"
				
			var infowindow$i = new google.maps.InfoWindow({
			  content: '<b><a href=\"buy.php?id=$row[ids]\">$row[station_name]</a></b><br>City: $row[city] <br> Address: $row[address]'
			});

			marker$i.addListener('click', function() {
			  infowindow$i.open(map, marker$i);
			});
				";
		$i++;
		
	}
	
	 
 
?>
	  }
 
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfp4Bgs82eIs0IonSQDMrwMmlFmFuntaI&callback=initMap">
    </script>
  
</div>


</body>
</html>

