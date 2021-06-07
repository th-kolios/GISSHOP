<?php
include "main.php";
?>

<div class="alert alert-success" role="alert">
 Connections Between Stations and Hubs
</div>
  
  <?php

	if(isset($_GET['d1']))
	{
		$s2="delete from syndesi_komvon where id_s1='$_GET[d1]' and id_s2='$_GET[d2]'";
		mysqli_query($conn,$s2);
	}
	
	if(isset($_POST['st1']))
	{
		
		if($_POST['st2']==$_POST['st1'])
		{
			echo "<B>Not Accept connection with the same Station!</b>";
			
		}
		
		else
		{
		
			if($_POST['st1']<$_POST['st2'])
			{
				$s1=$_POST['st1'];
				$s2=$_POST['st2'];
				
			}
			if($_POST['st2']<$_POST['st1'])
			{
				$s1=$_POST['st2'];
				$s2=$_POST['st1'];
				
			}
			
			$s="INSERT INTO syndesi_komvon( id_s1, id_s2, cost,time) 
				VALUES ('$s1', '$s2', 
					'$_POST[cost]', '$_POST[time]')";

			
			if(mysqli_query($conn,$s))
				echo "<b>Connection Inserted !<b>";
			else
				echo "<b>Connection Not Inserted. You enter an exist connection!<b>";
		}
		
	}
	
	
	echo "<table class='table'>
	<tr><th>Station1</th><th>Station2</th><th>Cost</th><th>Time</th><th></th></tr>
	<form action='' method=post>
	<tr>
	<td><select name=st1>
	";
	
	$r1=mysqli_query($conn,"select * from stations order by station_name");
	while($rowc1=mysqli_fetch_array( $r1))
	{
		echo "<option value=$rowc1[id_station]>$rowc1[station_name]</option>";
	}
	
	
	echo"
	</select>
	</td>
	<td><select name=st2>
	
";
$r1=mysqli_query($conn,"select * from stations order by station_name");
	while($rowc1=mysqli_fetch_array( $r1))
	{
		echo "<option value=$rowc1[id_station]>$rowc1[station_name]</option>";
	}
	

echo "
	</select>
	</td>
	<td>
	<input type=number required name=cost>
	</td>
		<td>
	<input type=number required name=time>
	</td>
		<td>
	<input type=submit class='btn btn-primary' value='+' >
	</td>
	
	
	</form>
	
	";
	
	
	$s="select * from connections";
	$r=mysqli_query($conn,$s);

     
	while($row=mysqli_fetch_array($r))
	{
		
	$rq1=mysqli_query($conn,"select * from stations where id_station=$row[id_stn1]");
    $rowc1=mysqli_fetch_array($rq1);		
	
	$rq2=mysqli_query($conn,"select * from stations where id_station=$row[id_stn2]");
    $rowc2=mysqli_fetch_array($rq2);		
		
	
		echo "
		<tr>
        <td>$rowc1[station_name]</td><td>$rowc2[station_name]</td><td>$row[cost]</td><td>$row[time] </td>
		 <td><a href='connections.php?s1=$row[id_stn1]&s2=$row[id_stn2]'><span class=\"glyphicon glyphicon-trash\"></span></a>
		 </td>
      </tr>";
	}
	echo "</tbody></table>";


?>  
  
</div>  
  </div>

</body>
</html>

