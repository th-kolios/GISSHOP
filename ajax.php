<?php

$conn =  mysqli_connect("localhost", "root", "","db_site");
mysqli_query($conn,"set names 'utf8'");

echo "<table class=table>";
echo "<tr><th>Station</th><th>City</th>";

$q=mysqli_query($conn,"select * from stations where city like '%$_GET[s]%' order by station_name");
			
while ($r=mysqli_fetch_array($q))
{	echo "<tr><td> $r[station_name] </td><td> $r[city] </td></tr>"; 	}
echo "</table>";
		
		

?>