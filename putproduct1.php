<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Put a product
</div>
  
  <?php
  
  echo "
  <form action='putproduct.php' method=post>
  <div class=\"form-group\">
    <label for=\"a\">Product:</label>
    <select required class=\"form-control\" name=\"id_product\">";
	$s0="select * from products order by Product";
	$q0=mysqli_query($conn,$s0);
	while($r0=mysqli_fetch_array($q0))
	{
	echo"<option value=$r0[id]>$r0[Product]</option>";
	}
	echo"
    </select>
  </div>
  <div class=\"form-group\">
    <label for=\"id_station\">Station:</label>
    <input type=\"hidden\" class=\"form-control\" id=\"id_station\" name=\"id_station\" value=\"".$_SESSION['sid']."\">
    <input type=\"text\" readonly class=\"form-control\" id=\"name_station\" name=\"name_station\" value=\"".$_SESSION['sname']."\">
  </div>
  <div class=\"form-group\">
    <label for=\"Description\">Description:</label>
    <textarea required class=\"form-control\" id=\"Description\" name=\"Description\" rows=\"5\"></textarea>
  </div>
    <div class=\"form-group\">
    <label for=\"posotita\">Quantity:</label>
    <input type=\"text\" required class=\"form-control\" id=\"posotita\" name=\"posotita\" >
  </div>
  <div class=\"form-group\">
    <label for=\"timi\">Value:</label>
    <input type=\"text\" required class=\"form-control\" id=\"timi\" name=\"timi\" >
  </div>
  <button type=\"submit\" class=\"btn btn-default\" name=\"add_product\">Add Product</button>
</form>";
  
  
  ?>
  
  
</div>

</body>
</html>

