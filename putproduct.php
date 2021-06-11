<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Products Page of Station <?php echo"$_SESSION[sname]";?>
</div>
  
  <?php
	if(isset($_GET['did']))
	{
		$s2="delete from products_station where id_sproduct='$_GET[did]'";
		mysqli_query($conn,$s2);
	}
	
	if(isset($_POST['add_product']))
	{
		$s="INSERT INTO products_station (`id_product`, `id_station`, `Description`, `posotita`, `timi`) 
		VALUES ('$_POST[id_product]', '$_POST[id_station]', '$_POST[Description]', '$_POST[posotita]', '$_POST[timi]');";	
		mysqli_query($conn,$s);
	}
	
	if(isset($_POST['edit_product']))
	{
		
		$s="update  products_station set 
		`Description`='$_POST[Description]', `posotita`= posotita + $_POST[add_posotita], `timi`='$_POST[timi]' where id_sproduct='$_POST[sid]'
		
		
		
		";
		mysqli_query($conn,$s);	
	}

	echo "<a href='putproduct1.php'><button class='btn btn-primary'>+</button></a>";

	$s="select * from products_station, products where products_station.id_product=products.id and id_station=$_SESSION[sid]";
	
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
		 <td> <a href='putproduct2.php?sid=$row[id_sproduct]'><span class=\"glyphicon glyphicon-pencil\"></span></a>
		 <a href='putproduct.php?did=$row[id_sproduct]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table>";
	



?>  
  
</div>

</body>
</html>

