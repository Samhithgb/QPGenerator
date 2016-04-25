<html>
<?php
	session_cache_expire( 20 );
$inactive = 10;
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		echo "<script>alert('Session Timeout! Please Login Again!');</script>";
		echo "<script>self.location='../welcome.php'</script>";
	}
}
$_SESSION['start'] = time();
	

?>

<head>
    <meta charset="UTF-8">
    <title>Admin DashBoard</title>
       
    <link rel="stylesheet" href="style.css">
   
    
  </head>
<body>
	<div class = "wrapper">
		<div class = "container">
			<h1>Select an operation</h1><br><br><br><br><br>
			<form method="post">
			<button type="button" name="lod" id="lod" onClick="location.href='lodrep.php'">LOD Composition</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" id="CO" name="co" onClick="location.href='corep.php'">Subject Composition</button>	
			<br><br><br><br>
				<button type="button" id="log" name="log" onClick="location.href='histrep.php'">Login/Update History</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" name="teach" id="teach" onClick="location.href='teachsub.php'">Subject-Teachers</button>
			<br><br><center><button type="button" name="back" id="teach" onClick="location.href='admindash.php'">Back</button>
	
		
		
		</form>

		</div>
				
	

			
