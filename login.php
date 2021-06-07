<?php
include "main.php";
?>
<div class="alert alert-success" role="alert">
  Login Page
</div>

  <form action='index.php' method=post>
	  <div class="form-group">
		<label for="usrn">Username:</label>
		<input type="text" required class="form-control" id="usrn" name="usrn">
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" required class="form-control" id="pwd" name="pwd">
	  </div>
	  <button type="submit" class="btn btn-default">Login</button> or <a href="register.php">Create an account</a>
</form>
  
</div>

</body>
</html>

