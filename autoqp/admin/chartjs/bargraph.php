
<?php
include("connect.php");
session_start();
	session_cache_expire( 20 );
$inactive = 1000;
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		echo "<script>alert('Session Timeout! Please Login Again!');</script>";
		echo "<script>self.location='../welcome.php'</script>";
	}
}
$_SESSION['start'] = time();

  $username = $_SESSION['username'];
  $sql="select Course_ID from Course"; 
  $result=mysql_query($sql); 
   
  $options="";   
//  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Course_ID"]; 
    $options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 

  }
  
  if(isset($_REQUEST['add'])){
	  
	  $_SESSION['sub']=$_REQUEST['subject'];
	  
	  
	  
  }
  
?>	
<!DOCTYPE html>
<html>
	<head>
		<title>Level of Difficulty Composition</title>
		<style type="text/css">
			#chart-container {
				width: 640px;
				height: auto;
			}
		</style>
	</head>
	<body>
		
		

<center>Select Subject 
			<form method="post">
			<select name="subject">
			<?php echo($options);?>				
							
			</select>
				<button type="submit" name="add" id="addquestions">Generate</button><br><br>

        


		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>
						<button type="button" name="back" id="addquestions" onClick="location.href='../report.php'">Back</button>
</center>
		<!-- javascript -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>

	</body>
</html>
