<?php
include "main.php";
?>

<div class="alert alert-success" role="alert">
  Info And Buy
</div>
 <?php
$r=mysqli_query($conn,"select * from stations where id_station=$_GET[id]");
$row=mysqli_fetch_array($r);
?> 

   <div class='row'>
  <div class='col-md-4'>
     <script>

		var marker;
      function initMap() {
		
        var myLatLng = {<?php echo "lat:  $row[latitude], lng:$row[longititude]"; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,  center: myLatLng   });
		
		marker = new google.maps.Marker({	position: myLatLng,	map: map	});
			
		 map.addListener('click', function(e) {
			 
			 document.getElementById("lat").value=e.latLng.lat();
			document.getElementById("lng").value=e.latLng.lng();
			marker.setMap(null);
			marker = new google.maps.Marker({
				position: e.latLng,
				map: map
			});
			
		});

       
      }
    </script>
  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB8Hzdr9qGqPyzhjLJOmXypyPlpQO0fIk&callback=initMap"></script>
  <div id=map style='width:100%; height:300px;'></div>
  </div>
  
<?php  

echo "
  <div class='col-md-8'>
  <div class=\"form-group\">
      <input type=\"hidden\"  name=\"vid\" value='$row[id_station]'>
    <label for=\"uname\">Name Station:</label>
    <input type=\"text\" required class=\"form-control\" id=\"sname\" name=\"sname2\" readonly value='$row[station_name]'>
  </div>
   
     <div class=\"form-group\">
    <label for=\"city\">City:</label>
    <input type=\"text\"  required  class=\"form-control\" id=\"city\" name=\"city\" readonly  value='$row[city]'>
  </div>
   <div class=\"form-group\">
    <label for=\"address\">Address:</label>
    <input type=\"text\"  required value='$row[address]' class=\"form-control\" id=\"address\" readonly  name=\"address\">
  </div>
  
   <div class=\"form-group\">
    <label for=\"type\">Description:</label>
    <textarea class=\"form-control\" readonly  id=\"descr\" name=\"desrc\">$row[description]</textarea>
  </div>
  
    <input type=\"hidden\"  required  class=\"form-control\" id=\"lat\" value='$row[latitude]' name=\"lat\">
    <input type=\"hidden\"  required  class=\"form-control\" id=\"lng\" name=\"lng\" value='$row[longititude]'>

  
</div></div>";


$s="select * from products,products_station where products.id=products_station.id_product and products_station.id_station=$_GET[id]";

$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Value</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
		echo "
		<tr><td>$row[Product]</td><td>$row[posotita]</td><td>$row[timi]</td>
		 <td> <a href='buyproduct.php?id=$row[id_sproduct]'>Buy/Show</a></td>
      </tr>";
	}
	echo "</tbody></table>";
  
  ?>
</div>

</body>
</html>

