<?php
include "main.php";
?>

 <div class='alert alert-success' role='alert'>
 Buy a product
</div>
  
  <?php
  
  if(isset($_POST['flname']))
  {
	
	if (mysqli_query($conn,"INSERT INTO `webia_olivedb`.`sales` (`flname`, `afm`, `address`, `city`, `tk`, `id_product`, `posotita`, 
	`phone`, `email`, `timi`, `id_station`) 
	VALUES ('$_POST[flname]', '$_POST[afm]', '$_POST[address]', '$_POST[city]', '$_POST[tk]', '$_POST[id_product]', '$_POST[posotita]', 
	'$_POST[phone]', '$_POST[email]', '$_POST[timi]', '$_POST[id_station]');"))
	{
		
		echo "<div class=\"alert alert-success\" role=\"alert\">Sale Added !</div>";
		
		die();
	}
	else
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Sale Error Inserted !</div>";
		die();
	}
	
	
  }

  
  ?>
  
  <form action='' method=post>
  
  <div class="form-group">
    <label for="flname">Name (LastName FirstName):</label>
    <input type="text"  required class="form-control" id="flname" name="flname">
  </div>
  
  <div class="form-group">
    <label for="afm">AFM:</label>
    <input type="text"  required class="form-control" id="afm" name="afm">
  </div>
  
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" required class="form-control" id="address" name="address">
  </div>
  
 
 <div class="form-group">
    <label for="city">City:</label>
    <input type="text"  required class="form-control" id="city" name="city">
  </div>
 
 
 <div class="form-group">
    <label for="tk">TK:</label>
    <input type="text"  required class="form-control" id="tk" name="tk">
  </div>
  
   
 <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email"  required class="form-control" id="email" name="email">
  </div>
  
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text"  required class="form-control" id="phone" name="phone">
  </div>
  
  <div class="form-group">
    <label for="id_station">Station:</label>
    <?php 
      $s="select * from products_station where id_sproduct=$_GET[id]";
      $q=mysqli_query($conn,$s);
      while($row=mysqli_fetch_array($q))
	{
	  $id_station=$row['id_station'];
	  $id_product=$row['id_product'];
	}
      $s1="select * from stations where id_station=$id_station";
      $q1=mysqli_query($conn,$s1);
      while($row1=mysqli_fetch_array($q1))
	{
	  $name_station=$row1['station_name'];
	}
      $s2="select * from products where id=$id_product";
      $q2=mysqli_query($conn,$s2);
      while($row2=mysqli_fetch_array($q2))
	{
	  $product=$row2['Product'];
	}
    echo"
    <input type='hidden' class='form-control' id='id_station' name='id_station' value='".$id_station."'>
    <input type='text' readonly class='form-control' id='name_station' name='name_station' value='".$name_station."'>
  </div>
  
  <div class='form-group'>
    <label for='id_product'>Product:</label>
    <input type='hidden' class='form-control' id='id_product' name='id_product' value='".$id_product."'>
    <input type='text'  readonly class='form-control' id='product' name='product' value='".$product."'>
  </div>";
  ?>
  <div class="form-group">
    <label for="posotita">Posotita:</label>
    <input type="text" required class="form-control" id="posotita" name="posotita">
  </div>
  
  <div class="form-group">
    <label for="timi">Timi:</label>
    <input type="text"  required class="form-control" id="timi" name="timi">
  </div>  
  
  <button type="submit" class="btn btn-default">Buy</button>
</form>
  
  
  
</div>

</body>
</html>

