<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Search a Product
</div>
  
  
  <?php
 
	
	

   echo "
  
  <form action='index.php' method=post>
  <div class=\"form-group\">
    <label for=\"pnum\">Product:</label>
    <select class=\"form-control\" id=\"sprod\" name=\"sprod\" >
    
    ";
    
    $s="select * from products";
    $q=mysqli_query($conn,$s);
    
    while($r=mysqli_fetch_array($q))
    {
    echo "<option value=$r[id]>$r[Product]</option>";
    }
    echo "
    
  	</select>
  </div>
  
  
  <button type=\"submit\" class=\"btn btn-default\">Search</button>
</form>";


  
  ?>
  
  
</div>

</body>
</html>

