<!DOCTYPE html>
<?php
include("connect.php");
session_start();

  
  //$username = $_SESSION['username'];
  $sql="select Eval_Start_Date,Eval_Type,Eval_ID from  Evaluation where Eval_Start_Date > '$date'";
$result=mysql_query($sql);  
 $options="";   
 $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Eval_Start_Date"]; 
	$k=$row["Eval_Type"];
	$n=$row["Eval_ID"];
	$type[$n]=$k;
    $options.="<OPTION VALUE=\"$n\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }

  
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
  /*
  if(isset($_REQUEST['go2'])){
    
    $_SESSION['subject']=$_REQUEST['subject'];
    $_SESSION['eval']=$_REQUEST['eval'];
	
    
    
  }
  */
  
  
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
			<h1>Select Department and Subject</h1>
			<br><br><br>
			<center>Select Department </center>
			<form method="post">
			<select name="department">
			<?php echo($options0);?>				
							
			</select>
			<br>	<br><br>
				<button type="submit" name="go" id="prevqp">Get Subjects</button><br><br>	
          
			
			</form>
			<br>
			Select Subject :
			<br>
			<form method='post' action="displayqps.php">	
			<select name="subject">
			<?php echo($options1);?></select>			
      <br><br>
	  Select the evaluation:<br><br>
	  <select name="eval">
				<?php echo($options);?>		
				</select><br><br>
      <button type="submit" name="go2" id="prevqp">Fetch Question Papers</button><br><br>	
</form>		</div>
			
			
			
			
			
			
		
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