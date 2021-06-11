<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Insert Station
</div>
  <div class='row'>
  <div class='col-md-4'>

  
     <script>

		var marker;
      function initMap() {
		
        var myLatLng = {lat:  38.218, lng:21.759};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,   center: myLatLng    });
		
		marker = new google.maps.Marker({
				position: myLatLng,	map: map
			});
			
		 map.addListener('click', function(e) {
			 document.getElementById("latd").value=e.latLng.lat();
			document.getElementById("lngd").value=e.latLng.lng();
			 
			marker.setMap(null);
			marker = new google.maps.Marker({
				position: e.latLng,	map: map
			});
		});
      }
    </script>
  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB8Hzdr9qGqPyzhjLJOmXypyPlpQO0fIk&callback=initMap"></script>
  <div id=map style='width:100%; height:300px;'></div>
  </div>
  <div class='col-md-8'>
  <form action='stations.php' method=post>
 
  <div class="form-group">
    <label for="sname">Station Name:</label>
    <input type="text" required class="form-control" id="sname" name="sname">
  </div>
  
 
   <div class="form-group">
    <label for="city">City:</label>
    <input type="text"  required value='' class="form-control" id="city" name="city">
  </div>
   <div class="form-group">
    <label for="address">Address:</label>
    <input type="text"  required value='' class="form-control" id="address" name="address">
  </div>
  
   <div class="form-group">
    <label for="type">Description:</label>
    <textarea class="form-control" id="descr" name="desrc"></textarea>
  </div>
    <input type="hidden"  required value='38.218399' class="form-control" id="latd" name="lat">
    <input type="hidden"  required value='21.7597589' class="form-control" id="lngd" name="lng">
  <button type="submit" class="btn btn-default">Add Station</button>
</form>
  
  
</div>
</div>
</div>

</body>
</html>

