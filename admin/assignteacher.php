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
	
  
  //$username = $_SESSION['username'];
  
  
  $sql="select Dept_Name,Dept_ID from Department"; 
  $result=mysql_query($sql); 

  $options0="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Dept_Name"]; 
	$k=$row["Dept_ID"];
    $options0.="<OPTION VALUE=\"$k\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }
  
  
  if(isset($_REQUEST['go'])){
  $dept=$_REQUEST['department'];
  echo "<script>console.log('Insdie');</script>";
  $sql="select Course_ID,Course_Name from Course where Dept_ID='$dept'"; 
  $result=mysql_query($sql); 

  $options1="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Course_ID"]; 
	$k=$row["Course_Name"];
    $options1.="<OPTION VALUE=\"$f\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }
  }
  
   if(isset($_REQUEST['go'])){
	   $dept=$_REQUEST['department'];
   $sql="select Designation,FName,MName,LName,Teacher_ID from Teacher where Dep_ID='$dept'"; 
  $result=mysql_query($sql); 

  $options2="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Designation"]; 
	$k=$row["FName"];
	$l=$row["MName"];
	$m=$row["LName"];
	$n=$row["Teacher_ID"];
	
    $options2.="<OPTION VALUE=\"$n\">".$f.'.'.$k.' '.$l.' '.$m."</OPTION>"; 
    $i++;
  }
   }
   if(isset($_REQUEST['go2'])){
	   $subject=$_REQUEST['subject'];
	   $teacher=$_REQUEST['teacher'];
	   $nohurs=$_REQUEST['noofh'];
	   $year = $_REQUEST['year'];
	   
	   
	   $sql="insert into Handled_By values('$teacher','$subject','$nohurs','$year');";   	
	   $res = mysql_query($sql);
	   if(!$res){
		   
		   echo "<script>alert('Not Successful.');</script>";
	   }
		  
	   else  echo "<script>alert('Successfully Assigned');</script>";
  }
   
  


?>



<head>
		
	 <meta charset="UTF-8">
    <title>Hello Faculty!</title>
      <link rel="stylesheet" href="style.css">
</head>


<body>
	<div class = "wrapper">
		<div class = "container">
			
			<br>
			<h1>Assign Teacher</h1>
			<br><br><br>
			<center>Select Subject </center>
			<form method="post">
			<select name="department">
			<?php echo($options0);?>				
							
			</select>
			<br>	<br><br>
				<button type="submit" name="go" id="prevqp">Get Details</button><br><br>	

			
			</form>
			<br>
			Select Subject :
			<br>
			<form method='post'>	
			<select name="subject">
			<?php echo($options1);?>				
							
			</select>
			<br><br>
			Select Teacher :<br>
			<select name="teacher">
			<?php echo($options2);?>				
							
			</select>
			<br><br>
						<input name= "noofh" id="nohours" type="number" placeholder="Number of Hours" required>
			    <br>
				        <input id="Year" name="year" type="number" placeholder="Year" required>

				<button type="submit" name="go2" id="prevqp">Assign Teacher</button><br><br>	
					
			
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
			
			</div>
</body>
</html>