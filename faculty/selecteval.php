<!DOCTYPE html>
<?php
include("connect.php");
session_start();
$date=date("Y/m/d");
$sql="select Eval_Start_Date,Eval_Type from  Evaluation where Eval_Start_Date > '$date'";
$result=mysql_query($sql);  
 $options="";   
 $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Eval_Start_Date"]; 
	$k=$row["Eval_Type"];
    $options.="<OPTION VALUE=\"$k\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }

if(isset($_REQUEST['save'])){
	
	if(isset($_REQUEST['eval'])){
		
		$_SESSION['evaltype']=$_REQUEST['eval'];
	    if($_REQUEST['eval']=='CIE')
		echo "<script>self.location='ciedetails.html'</script>";
		else echo "<script>self.location='qpgensee_updated.php'</script>";
		
	}
	
	
	
}



?>
<head>
		
	 <meta charset="UTF-8">
    <title>Select the Evluation</title>
      <link rel="stylesheet" href="style.css">
</head>


<body>
	<div class = "wrapper">
		<div class = "container">
			<br>
			
			<h1>Select an evaluation</h1>
			<br><br><br> 
			<form method="post">
			<select name="eval">
				<?php echo($options);?>		
				</select>
			<br>
			<br>
			<br>
			<br>
			<button name="save" type="submit" id="login-button">Next</button>
			</form>
</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>	
			
</div></body></html>