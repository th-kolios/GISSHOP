<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
 Insert Product
</div>
  <div class='row'>
 
  <div class='col-md-12'>
  <form action='products.php' method=post>
 
  <div class="form-group">
    <label for="sname">Product Name:</label>
    <input type="text" required class="form-control" id="sname" name="sname">
  </div>
  
  
   <div class="form-group">
    <label for="type">Description:</label>
    <textarea class="form-control" id="descr" name="desrc"></textarea>
  </div>
    
  <button type="submit" class="btn btn-default">Add Product</button>
</form>
  
  
</div>
</div>
</div>

</body>
</html>

