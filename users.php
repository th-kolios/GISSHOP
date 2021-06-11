<?php
include "main.php";

?>
 <div class='alert alert-success' role='alert'>
 Users Page
</div>
<?php

	if(isset($_GET['uid']))
	{
		mysqli_query($conn,"delete from users where id='$_GET[uid]'");
	}
	
	
	echo "
  <a href='adduser.php'><button class='btn btn-primary'>+</button></a><br><br>
  ";
	
	$s="select * from users order by username";
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>username</th> <th>type</th><th>Shop</th><th>Action</th>
      </tr>
    </thead>
    <tbody>";
     
	
	while($row=mysqli_fetch_array($r))
	{
		$station="";
		if($row['id_station']!=0)
		{
			  $q=mysqli_query($conn,"select * from stations where id_station=$row[id_station]");
			  $rw2=mysqli_fetch_array($q);
			  $station="$rw2[station_name]";
		}
		echo "
		<tr>
        <td>$row[username]</td> <td>$row[type_user]</td><td>$station</td>
		 <td><a href='edituser.php?uid=$row[id]'><span class=\"glyphicon glyphicon-pencil\"></span></a>
		 <a href='users.php?uid=$row[id]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table></div>";

?>


</body>
</html>

