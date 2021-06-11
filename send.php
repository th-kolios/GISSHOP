<?php
include "main.php";


?>

<div class='alert alert-success' role='alert'>
Send a packet
</div>
  
  <?php
  
  if(isset($_POST['a']))
  {
	
	if (mysqli_query($conn,"insert into packets (sender,reciever,address,city,
												id_stn_send, id_stn_recieve,type_route)
									values('$_POST[a]','$_POST[b]','$_POST[c]', '$_POST[d]',
										$_SESSION[sid],$_POST[s2],'$_POST[typos]')"))
	{
		echo "<div class='alert alert-success' role='alert'>
Your Packet Accepted to be Send
</div>";
		
		$id_track=mysqli_insert_id($conn);
		echo "<h3> Track Code:<b> $id_track</b></h3>";
		 
		
		// dijktra algorithm
		$q2=mysqli_query($conn,"select * from connections");
		
		// build graph
		$g = new Graph();
		while($rw2=mysqli_fetch_array($q2))
		{
			if($_POST['typos']=='Minimum Cost')	$cst=$rw2['cost']; else $cst=$rw2['time'];
			$g->addedge("$rw2[id_stn1]", "$rw2[id_stn2]", $cst);
			$g->addedge("$rw2[id_stn2]", "$rw2[id_stn1]", $cst);
		}
		list($distances, $prev) = $g->paths_from("$_SESSION[sid]");
		$path = $g->paths_to($prev, "$_POST[s2]");
		
		echo "<h3> Route of Your Packet</h3>";
		
		$cost=0;
		$time=0;
		$s1=0;
		$s2=0;
		echo "<ul>";
		foreach ($path as $st)
		{
			
			$q=mysqli_query($conn,"select * from stations where id_station=$st");
			$rw3=mysqli_fetch_array($q);
			echo "<li>Station: $rw3[station_name] </li>";  
			$s1=$st;
			
			if($s2==0)
				$sql="insert into roots (id_packet,id_stn,date_arrived, status) 
				values ($id_track, $rw3[id_station],now(),'Accepted')";
			else
				$sql="insert into roots (id_packet,id_stn,date_arrived, status) 
				values ($id_track, $rw3[id_station],now(),'')";
			
			
			mysqli_query($conn,$sql);
			
			// calculation cost
			if($s2!=0)
			{
				if($s2<$s1) {$st1=$s2; $st2=$s1;} else {$st1=$s1; $st2=$s2;}		
				$q2=mysqli_query($conn,"select * from connections where id_stn1=$st1 and id_stn2=$st2");
				$rw6=mysqli_fetch_array($q2);
				$cost+=$rw6['cost']; $time+=$rw6['time'];
			
			}
			
			$s2=$st;
		}
		echo "
<div class='alert alert-success' role='alert'>

		Cost=$cost Time=$time
		</div>
		</br>";
		
		die();
		
	}
	else
	{
		echo "<div class='alert alert-danger' role='alert'> Error Track Inserted !!! </div> ";
		die();
	}
	
	
  }

 


  echo "
 <div class='alert alert-success' role='alert'>
Send a packet from Station : $_SESSION[sname]
</div>
  <form action='' method=post>
  <div class=\"form-group\">
    <label for=\"a\">Sender:</label>
    <input type=\"text\"  required class=\"form-control\" id=\"a\" name=\"a\" >
  </div>
  <div class=\"form-group\">
    <label for=\"b\">Reciever:</label>
    <input type=\"text\" required class=\"form-control\" id=\"b\" name=\"b\" >
  </div>
  <div class=\"form-group\">
    <label for=\"c\">Address:</label>
    <input type=\"text\" required class=\"form-control\" id=\"c\" name=\"c\" >
  </div>
    <div class=\"form-group\">
    <label for=\"p\">Cily:</label>
    <input type=\"text\" required class=\"form-control\" id=\"p\" name=\"d\" >
  </div>
  
  
   <div class=\"form-group\">
    <label for=\"s2\">To Station:</label>
    <select required class=\"form-control\" id=\"s2\" name=\"s2\">
  ";
  

  $q=mysqli_query($conn,"select * from stations where station_type='Station' order by station_name");
  while ($rw2=mysqli_fetch_array($q))
	echo "<option value=$rw2[id_station]>$rw2[station_name]</option>";	
 
	echo "
	</select>
  </div>
    <div class=\"form-group\">
    <label for=\"typos\">Option:</label>
    <select required class=\"form-control\" id=\"typos\" name=\"typos\">
	<option>Minimum Cost</option><option>Minimum Time</option>
	</select>
	</div>
  
  
  <button type=\"submit\" class=\"btn btn-default\">Send Packet</button>
</form>";
  
  
  ?>
  
  
</div>

</body>
</html>

