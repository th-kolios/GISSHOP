<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Auctions Page <?php if (isset($_SESSION['sname'])) echo "of Station $_SESSION[sname]";?>
</div>

<?php
if(isset($_GET['did']))
	{
		$s2="delete from auctions where id='$_GET[did]'";
		mysqli_query($conn,$s2);
	}

    if(isset($_POST['add_auction']))
	{
		$s="INSERT INTO auctions (`id_user`, `id_product`, `id_station`, `posotita`, `start_date`, `start_cost`, `end_date`, `end_cost`) 
		VALUES ('$_SESSION[uid]', '$_POST[id_product]', '$_POST[id_station]',  '$_POST[posotita]', '$_POST[start_date]', '$_POST[start_cost]', '$_POST[end_date]', '$_POST[start_cost]');";	
		mysqli_query($conn,$s);
	}
    
    if(isset($_POST['edit_auction']))
	{
		if($_POST['new_price']>$_POST['end_cost']){
            $s="UPDATE `auctions` SET `end_cost` = '$_POST[new_price]', `id_buyer` = '$_SESSION[uid]' WHERE `auctions`.`id` = $_POST[id_auction];";	
            mysqli_query($conn,$s);
            echo"<div class='alert alert-success' role='alert'>The new price added!</div>";
		}else{
            echo"<div class='alert alert-danger' role='alert'>The new Price must be bigger than Value!</div>";
		}
	}

if(@$_SESSION['type']=="admin")
{
    $s="select auctions.id as aucid,auctions.id_user,auctions.id_product,auctions.id_station,auctions.posotita,auctions.start_date,auctions.start_cost,auctions.end_cost,products.id,products.Product from auctions, products where auctions.id_product=products.id;";
	
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Station</th>
        <th>Start Date</th>
        <th>Quantity</th>
        <th>Value</th>
		<th>End Value</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
	        $s0="select station_name from stations where id_station=$row[id_station]";
	        $q0=mysqli_query($conn,$s0);
	        $r0=mysqli_fetch_array($q0);
	        
	        $d0=date_create($row['start_date']);
		echo "
		<tr><td>$row[Product]</td><td>$r0[station_name]</td><td>".$d0->format('d/m/Y')."</td><td>$row[posotita]</td><td>$row[start_cost]</td>
		 <td>$row[end_cost]</td>
      </tr>";
	}
	echo "</tbody></table>";
}
else if(@$_SESSION['type']=="user")
{
    	echo "<a href='putproduct3.php'><button class='btn btn-primary'>+</button></a>";
    	
    $s="select auctions.id as aucid,auctions.id_user,auctions.id_product,auctions.id_station,auctions.posotita,auctions.start_date,auctions.start_cost,auctions.end_cost,auctions.id_buyer,products.id,products.Product from auctions, products where auctions.id_product=products.id and id_station=$_SESSION[sid]";
    
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Start Date</th>
        <th>Quantity</th>
        <th>Value</th>
        <th>End Value</th>
        <th>Person</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
	    $s0="select * from users where id=$row[id_buyer]";
	        $q0=mysqli_query($conn,$s0);
	        $r0=mysqli_fetch_array($q0);
	        
	    	$d0=date_create($row['start_date']);
		echo "
		<tr><td>$row[Product]</td><td>".$d0->format('d/m/Y')."</td><td>$row[posotita]</td><td>$row[start_cost]</td><td>$row[end_cost]</td><td><a href='tel:$r0[phone]'>$r0[flname]</a></td>
		 <td><a href='auctions.php?did=$row[aucid]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table>";
}
else
{
    $s="select auctions.id as aucid,auctions.id_user,auctions.id_product,auctions.id_station,auctions.posotita,auctions.start_date,auctions.start_cost,auctions.end_cost,auctions.end_date,products.id,products.Product from auctions, products where auctions.id_product=products.id and auctions.end_date>now();";
	
	$r=mysqli_query($conn,$s);
	
	echo "<table class='table'>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Station</th>
        <th>Start Date</th>
        <th>Quantity</th>
        <th>Value</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      
	
	
	while($row=mysqli_fetch_array($r))
	{
	        $s0="select station_name from stations where id_station=$row[id_station]";
	        $q0=mysqli_query($conn,$s0);
	        $r0=mysqli_fetch_array($q0);
	        
	        $d0=date_create($row['start_date']);
		echo "
		<tr><td>$row[Product]</td><td>$r0[station_name]</td><td>".$d0->format('d/m/Y')."</td><td>$row[posotita]</td><td>$row[end_cost]</td>
		 <td><a href='putproduct4.php?id=$row[aucid]'><span class=\"glyphicon glyphicon-edit\"></span></a></td>
      </tr>";
	}
	echo "</tbody></table>";
}
?>
</div>

</body>
</html>

