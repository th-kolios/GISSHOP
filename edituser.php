<?php
include "main.php";

?>

 <div class='alert alert-success' role='alert'>
 Edit User
</div>
  
  
  <?php
  
  if(isset($_POST['username']))
  {
	  
	  
	if (mysqli_query($conn,"update users set username='$_POST[username]', 
							password='$_POST[pwd]', type_user= '$_POST[typos]', 
							id_station= '$_POST[ids]',
							email =  '$_POST[email]',
							flname =  '$_POST[flname]', 
							phone =  '$_POST[phone]',
							afm =  '$_POST[afm]'
							where id=$_GET[uid]"))
	{
		echo "<div class=\"alert alert-success\" role=\"alert\">User Changes Saved !</div>";
		
		die();
		
	}
	else
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\">User Exists or Error on Save  !</div>";
		die();
	}
	
	
  }
  
	 
	  $q=mysqli_query($conn,"select * from users where id=$_GET[uid]");
	  $row=mysqli_fetch_array($q);
  

  echo "
  
  <form action='' method=post>
  <div class=\"form-group\">
    <label for=\"username\">Username:</label>
    <input type=\"text\"  required class=\"form-control\" id=\"username\" name=\"username\" value='$row[username]'>
  </div>
  <div class=\"form-group\">
    <label for=\"pwd\">Password:</label>
    <input type=\"password\" required class=\"form-control\" id=\"pwd\" name=\"pwd\" value='$row[password]'>
  </div>
 
 
  <div class=\"form-group\">
    <label for=\"flname\">Name (LastName FirstName):</label>
    <input type=\"text\"  required class=\"form-control\" id=\"flname\" name=\"flname\" value='$row[flname]'>
  </div>
 
 <div class=\"form-group\">
    <label for=\"phone\">Phone:</label>
    <input type=\"text\"  required class=\"form-control\" id=\"phone\" name=\"phone\" value='$row[phone]'>
  </div>
 
 
 <div class=\"form-group\">
    <label for=\"afm\">Afm:</label>
    <input type=\"text\"  required class=\"form-control\" id=\"afm\" name=\"afm\" value='$row[afm]'>
  </div>
  
   
 <div class=\"form-group\">
    <label for=\"email\">email:</label>
    <input type=\"text\"  required class=\"form-control\" id=\"email\" name=\"email\" value='$row[password]'>
  </div>
  
 
 
   <div class=\"form-group\">
    <label for=\"typos\">User Type:</label>
    <select required class=\"form-control\" id=\"typos\" name=\"typos\">
	<option>$row[type_user]</option>
	<option>admin</option>
	<option>user</option>
	</select>
  </div>
  
   <div class=\"form-group\">
    <label for=\"ids\">Work in Station:</label>
    <select required class=\"form-control\" id=\"ids\" name=\"ids\">
  ";
  
if ($row['id_station']!=0)
{
  $r=mysqli_query($conn,"select * from stations where id_station=$row[id_station]");
  $r2=mysqli_fetch_array($r);
  
  
    echo "<option value=$r2[id_station]>$r2[station_name]</option>";	
} 
else 
	echo "<option value=0></option>";
 
  $r=mysqli_query($conn,"select * from stations  order by station_name");
  while ($r2=mysqli_fetch_array($r))
  {
  
  echo  "<option value=$r2[id_station]>$r2[station_name]</option>";	
  }
	echo "</select>
  </div>
    
  <button type=\"submit\" class=\"btn btn-default\">Save</button>
</form>";
  
  
  ?>
  
  
</div>

</body>
</html>

