<?php
include "main.php";
?>

 <div class='alert alert-success' role='alert'>
 Register new User
</div>
  
  <?php
  
  if(isset($_POST['username']))
  {
	
	if (mysqli_query($conn,"INSERT INTO users(username, password, type_user, email,flname, phone,afm,id_station) 
		VALUES ('$_POST[username]', '$_POST[pwd]', 'guest','$_POST[email]', '$_POST[flname]', '$_POST[phone]', '$_POST[afm]',0)"))
	{
		
		echo "<div class=\"alert alert-success\" role=\"alert\">User Added !</div>";
		
		die();
	}
	else
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\">User Exists or Error Inserted  !</div>";
		die();
	}
	
	
  }

  
  ?>
  
  <form action='' method=post>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text"  required class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" required class="form-control" id="pwd" name="pwd">
  </div>
  
  <div class="form-group">
    <label for="flname">Name (LastName FirstName):</label>
    <input type="text"  required class="form-control" id="flname" name="flname">
  </div>
 
 <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text"  required class="form-control" id="phone" name="phone">
  </div>
 
 
 <div class="form-group">
    <label for="afm">Afm:</label>
    <input type="text"  required class="form-control" id="afm" name="afm">
  </div>
  
   
 <div class="form-group">
    <label for="email">email:</label>
    <input type="text"  required class="form-control" id="email" name="email">
  </div>
  
  <button type="submit" class="btn btn-default">Register</button>
</form>
  
  
  
</div>

</body>
</html>

