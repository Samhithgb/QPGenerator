<!DOCTYPE html>
<?php
include("connect.php");
session_start();
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



if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      } 


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
    echo "<center><img src='graph1.php'/></center>";


  }


?>
<head>

	 <meta charset="UTF-8">
    <title>LOD Composition</title>

</head>



<center>Select Subject
			<form method="post">
			<select name="subject">
			<?php echo($options);?>

			</select>
				<button type="submit" name="add" id="addquestions">Generate</button><br><br>
 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
</center>
