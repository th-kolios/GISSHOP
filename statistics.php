<?php
include "main.php";

?>
 <div class='alert alert-success' role='alert'>
 Statistics
</div>
<?php

	$s="select sum(posotita) as sump, id, id_product, id_station, ok 
	from sales where id_station=$_SESSION[sid] and ok='1' group by id_product ";
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product</th><th>Total Quantity</th><th>Sale</th><th>Available Quantity</th>
      </tr>
    </thead>
    <tbody>";
     
	
	while($row=mysqli_fetch_array($r))
	{
		$s2="select * from products where id=$row[id_product]";
		$q2=mysqli_query($conn,$s2);
		while($row2=mysqli_fetch_array($q2))
		{
			$product=$row2['Product'];
		}
		$s3="select * from products_station where id_product=$row[id_product] and id_station=$_SESSION[sid]";
		$q3=mysqli_query($conn,$s3);
		while($row3=mysqli_fetch_array($q3))
		{
			$total_quantity=$row3['posotita'];
		}
		$av_posotita=$total_quantity - $row['sump'];
		echo "
		<tr>
        	<td>$product</td><td>$total_quantity</td><td>$row[sump]</td><td>$av_posotita</td></tr>";
	}
	echo "</tbody></table></div>";

?>


</body>
</html>

