<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Put new price for auction
</div>
  
<?php

    $s="select * from auctions where id=$_GET[id];";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_array($r);
    
    echo "
    <form action='auctions.php' method=post>
    <div class=\"form-group\">
    <label for=\"end_cost\">New Price:</label>
    <input type=\"hidden\" class=\"form-control\" id=\"id_auction\" name=\"id_auction\" value=\"".$_GET['id']."\">
    <input type=\"hidden\" class=\"form-control\" id=\"end_cost\" name=\"end_cost\" value=\"".$row[end_cost]."\">
    <input type=\"text\" required class=\"form-control\" id=\"new_price\" name=\"new_price\" placeholder=\"> $row[end_cost]\">
    </div>
    <button type=\"submit\" class=\"btn btn-default\" name=\"edit_auction\">Add Cost</button>
    </form>";

?>
  
  
</div>
</body>
</html>

