<?php
include "main.php";

?>
 <div class='alert alert-success' role='alert'>
 Show Customers
</div>
<?php
	if(isset($_POST['ok']))
	{
	
		if ($_POST['ok'] == '0'){
			mysqli_query($conn,"UPDATE `webia_olivedb`.`sales` SET `ok` = '0' WHERE `sales`.`id` = $_POST[upid];");
		}else{
			mysqli_query($conn,"UPDATE `webia_olivedb`.`sales` SET `ok` = '1' WHERE `sales`.`id` = $_POST[upid];");
		}
	}
	
	$s="select * from sales where id_station=$_SESSION[sid] order by ok";
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Name</th><th>Address</th><th>Phone</th><th>Product</th><th>Quantity</th><th>Price</th><th>OK</th>
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
		echo "
		<tr>
        <td>$row[flname]</td> <td>$row[address], $row[city], $row[tk]</td><td>$row[phone]</td><td>$product</td><td>$row[posotita]</td><td>$row[timi]</td>
		 <td>";
		 if($row['ok']!=0)
		{
			echo"<form action='' method=post>
			<input type='checkbox' class='form-control' onclick='return false;' name='ok' checked>
			</form>";
		}else{
			echo"<form action='' method=post onchange='submit();'>
			<input type='hidden' name='upid' value=$row[id]>
			<input type='checkbox' class='form-control' name='ok' value=1 >
			</form>";
		}
		 echo"</td>
      </tr>";
	}
	echo "</tbody></table></div>";

?>


</body>
</html>

