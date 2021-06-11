<?php
session_start();
include "PHPalgor/Dijkstra.php";
include "phpqrcode/qrlib.php"; 
include "phpqrread/vendor/autoload.php";

if (!($conn =  mysqli_connect("localhost", "webia_oliveuser", "12341234","webia_olivedb")))
{
	echo "Error Database Connection!";
	die();
}

$error="";
mysqli_query($conn,"set names 'utf8'");
if(isset($_POST['usrn']))
{
	$r=mysqli_query($conn,"select * from users where username='$_POST[usrn]' and password='$_POST[pwd]'");
	
	if(mysqli_num_rows($r)>0)
	{	
$row=mysqli_fetch_array($r);
	
		$_SESSION['uid']=$row['id'];
		if($row['type_user']=='admin')
		{
			$_SESSION['type']="admin";
		}
		else
		{
			if($row['id_station']==0)
			{ 
			    $_SESSION['type']="guest";
			    
			}else if($row['id_station']!=0)
			{
				$q=mysqli_query($conn,"select * from stations where id_station=$row[id_station]");
				$row2=mysqli_fetch_array($q);
				$_SESSION['sid']="$row2[id_station]";
				$_SESSION['sname']="$row2[station_name]";
				$_SESSION['type']="user";
				
			}
			else
			{
				$_SESSION['type']="";
				$error="Error login. Administrator must connect you with a station";
				
			}

		}
		
	}
	else
	{
		$error="Error login. User name or password not correct";
		
	}
	
	
	
}


?>


<html lang="en">
<head>
  <title>Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">MENU</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">System</a>
    </div>


<?php
if(@$_SESSION['type']=="")
{
?>



    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="findp.php">Search Product</a></li>
		<li><a href="finds.php">Search Shop</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
 
<?php
}
else
{
	if(@$_SESSION['type']=="admin")
{
	
	
?>




    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	    <li><a href="index.php">HOME</a></li>
		<li><a href="stations.php">Shop List</a></li>
		<li><a href="products.php">Products</a></li>
		<li><a href="users.php">Users List</a></li>
		<li><a href="auctions.php">Auctions</a></li>
		<li><a href="logout.php" class='btn btn-default'>Logout</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->




<?php
}
else if(@$_SESSION['type']=="user")

{
	
	
?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	    <li><a href="index.php">HOME</a></li>
		<li><a href="putproduct.php">Put Product</a></li>
		<li><a href="showcustomers.php">Show Customers</a></li>
		<li><a href="statistics.php">Statistics</a></li>
		<li><a href="auctions.php">Auctions</a></li>
		<li><a href="logout.php" class='btn btn-default'>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
 

<?php
}
else
{
    
?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	    <li><a href="index.php">HOME</a></li>
		<li><a href="auctions.php">Auctions</a></li>
		<li><a href="logout.php" class='btn btn-default'>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
 

<?php
}

}


?>

 </div><!-- /.container-fluid -->
</nav>
</div>
 <div style='margin-top:-20px;' >
 <img src='banner.jpg' width=100%>
 </div>
 <br>
<div class="container">


<?php

if($error!="")
{
	
	echo "
	<div class=\"alert alert-danger\" role=\"alert\">
  $error
</div>";

	
}

?>