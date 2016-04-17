<!DOCTYPE html>
<?php
include("connect.php");
session_start();
if(isset($_SESSION['username'])){
  
  $username = $_SESSION['username'];
  $sql="select Course_ID from Handled_By where Teacher_ID='$username'"; 
  $result=mysql_query($sql); 
   
  $options="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Course_ID"]; 
    $options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
    $i++;
  }
}


if(isset($_REQUEST['add'])){
	
		if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		$now= $_SESSION['subject'];
		 
		echo "<script>self.location='addquestions.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}

if(isset($_REQUEST['edit'])){
	
		if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		$now= $_SESSION['subject'];
		 
		echo "<script>self.location='questdetails.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}


if(isset($_REQUEST['gen'])){
	 
if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		
		 
		echo "<script>self.location='selecteval.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}


	 
if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		
		 
		echo "<script>self.location='syllabus.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";


if(isset($_REQUEST['logout'])){
	
		session_destroy();
		echo "<script>self.location='../welcome.php'</script>";
		
		
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
			<h1>Welcome! What next?</h1>
			<br><br><br>
			<center>Select Subject </center>
			<form method="post">
			<select name="subject">
			<?php echo($options);?>				
							
			</select>
	
			<br><br><br><br><br><br><br>
			<button type="submit" name="add" id="addquestions">Add Questions</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" name="gen" id="generateqp">Generate Question Paper</button>	
			<br><br><br><br>
			<button type="submit" name="edit" id="EditQuestions">Edit Questions in Database</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" name="prev" id="prevqp">Refer Previous Papers</button><br><br>	
	        <center><button type="submit" name="syllabus" id="syllabus">Check The Syllabus</button></center><br><br>	
	<center><button type="submit" name="logout" id="prevqp">Log Out</button></center>		
			
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
