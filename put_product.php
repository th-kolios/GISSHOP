<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Products Page
</div>
  
  <?php

	if(isset($_GET['did']))
	{
		$s2="delete from products where id='$_GET[did]'";
		mysqli_query($conn,$s2);
	}
	
	if(isset($_POST['sname']))
	{
		$s="INSERT INTO products( Product,description) 
		VALUES ('$_POST[sname]',  '$_POST[desrc]')";	
		mysqli_query($conn,$s);
	}
	
	if(isset($_POST['sname2']))
	{
		
		$s="update  products set Product='$_POST[sname2]', 
					description= '$_POST[desrc]'
					where id=$_POST[vid]";
		mysqli_query($conn,$s);	
	}

	echo "<a href='addputproduct.php'><button class='btn btn-primary'>+</button></a>";

	$s="select * from products order by Product";
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Description</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
		echo "
		<tr><td>$row[Product]</td><td>$row[Description]</td>
		 <td> <a href='uproducts.php?sid=$row[id]'><span class=\"glyphicon glyphicon-pencil\"></span></a>
		 <a href='products.php?did=$row[id]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table>";
	



?>  
  
</div>

</body>
</html>

