<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Put a product for auction
</div>
  
  <?php
$hm=new DateTime();
$hm2=$hm->format('Y-m-d');
$hm3=$hm->format('Y-m-d');
$srch1=$hm2;
$srch2=$hm3;
  
  echo "
  <form action='auctions.php' method=post>
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
    <label for=\"posotita\">Quantity:</label>
    <input type=\"text\" required class=\"form-control\" id=\"posotita\" name=\"posotita\" >
  </div>
  <div class=\"form-group\">
    <label for=\"start_cost\">Start Cost:</label>
    <input type=\"text\" required class=\"form-control\" id=\"start_cost\" name=\"start_cost\" >
  </div>
  <div class=\"form-group\">
    <label for=\"start_date\">Start Date:</label>
    <input type=\"date\" required class=\"form-control\" id=\"start_date\" name=\"start_date\" value=\"$srch1\">
  </div>
  <div class=\"form-group\">
    <label for=\"end_date\">End Date:</label>
    <input type=\"date\" required class=\"form-control\" id=\"end_date\" name=\"end_date\" value=\"$srch2\">
  </div>
  <button type=\"submit\" class=\"btn btn-default\" name=\"add_auction\">Add Auction</button>
</form>";
  
  
  ?>
  
  
</div>
<script>
$(document).ready(function() {
var val = $('#start_date').val();
  if (val) {
    // parse the date string
    var set = new Date(val);

    // update the date value, for adding days
    set.setDate(set.getDate() + 5);

    // generate the result format and set value
    $("#end_date").val([set.getFullYear(), addPrefix(set.getMonth() + 1), addPrefix(set.getDate())].join('-'));
  }
});
$("#start_date").on('change', function() {
  var val = $('#start_date').val();
  if (val) {
    // parse the date string
    var set = new Date(val);

    // update the date value, for adding days
    set.setDate(set.getDate() + 5);

    // generate the result format and set value
    $("#end_date").val([set.getFullYear(), addPrefix(set.getMonth() + 1), addPrefix(set.getDate())].join('-'));
  }
});

// function for adding 0 prefix when date or month
// is a single digit
function addPrefix(str) {
  return ('0' + str).slice(-2)
}
</script>
</body>
</html>

