<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Station Page
</div>
  
  <?php

	if(isset($_GET['did']))
	{
		$s2="delete from stations where id_station='$_GET[did]'";
		mysqli_query($conn,$s2);
	}
	
	if(isset($_POST['sname']))
	{
		$s="INSERT INTO stations( station_name,latitude, longititude,city, address,description) 
		VALUES ('$_POST[sname]', '$_POST[lat]', '$_POST[lng]', '$_POST[city]', '$_POST[address]', '$_POST[desrc]')";	
		mysqli_query($conn,$s);
	}
	
	if(isset($_POST['sname2']))
	{
		
		$s="update  stations set station_name='$_POST[sname2]', 
					latitude='$_POST[lat]', 
					longititude='$_POST[lng]',
					city='$_POST[city]', 
					address='$_POST[address]',
					description= '$_POST[desrc]'
					where id_station=$_POST[vid]";
		mysqli_query($conn,$s);	
	}

	echo "<a href='addstation.php'><button class='btn btn-primary'>+</button></a>";

	$s="select * from stations order by station_name";
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Station Name</th>
        <th>City</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
		echo "
		<tr><td>$row[station_name]</td><td>$row[city]</td>
		 <td> <a href='ustations.php?sid=$row[id_station]'><span class=\"glyphicon glyphicon-pencil\"></span></a>
		 <a href='stations.php?did=$row[id_station]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table>";
	



?>  
  
</div>

</body>
</html>

