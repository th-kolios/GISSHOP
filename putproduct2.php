<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Put a product
</div>
  
  <?php
  if(isset($_GET['sid']))
  {
	$s2="select * from products_station where id_sproduct='$_GET[sid]'";
	$q2=mysqli_query($conn,$s2);
	while($row=mysqli_fetch_array($q2))
	{
	  echo "
	  <form action='putproduct.php' method=post>
	  <div class=\"form-group\">
	    <label for=\"Description\">Description:</label>
	    <textarea required class=\"form-control\" id=\"Description\" name=\"Description\" rows=\"5\">$row[Description]</textarea>
	  </div>
	    <div class=\"form-group\">
	    <label for=\"tot_posotita\">Total Quantity:</label>
	    <input type=\"hidden\" required class=\"form-control\" id=\"sid\" name=\"sid\" value='$row[id_sproduct]'>
	    <input type=\"text\" readonly class=\"form-control\" id=\"tot_posotita\" name=\"tot_posotita\" value='$row[posotita]'>
	  </div>";
		$s="select sum(posotita) as sump from sales 
		where id_station=$_SESSION[sid] and ok='1' group by id_product ";
		$r=mysqli_query($conn,$s);
		while($row1=mysqli_fetch_array($r))
		{
			$av_posotita=$row['posotita'] - $row1['sump'];
		}
	  echo"
	  <div class=\"form-group\">
	    <label for=\"av_posotita\">Available Quantity:</label>
	    <input type=\"text\" readonly class=\"form-control\" id=\"av_posotita\" name=\"av_posotita\" value='$av_posotita'>
	  </div>
	  <div class=\"form-group\">
	    <label for=\"add_posotita\">Add Quantity:</label>
	    <input type=\"text\" class=\"form-control\" id=\"add_posotita\" name=\"add_posotita\" value=\"0\">
	  </div>
	  <div class=\"form-group\">
	    <label for=\"timi\">Value:</label>
	    <input type=\"text\" required class=\"form-control\" id=\"timi\" name=\"timi\" value='$row[timi]'>
	  </div>
	  <button type=\"submit\" class=\"btn btn-default\" name=\"edit_product\">Save Product</button>
	</form>";
	}
  }
  
  ?>
  
  
</div>

</body>
</html>

