<html>
<?php	
	include("connect.php");
	if(isset($_REQUEST['logout'])){
		$time=date("h:i:sa");
		$sql="insert into Login_History('Logout_Time') values('$time');";
		$res=mysql_query($sql);
			
		if($res){
			echo "<script>alert('Sucessfully logged out');</script>";
			session_destroy();
		echo "<script>self.location='../welcome.php'</script>";
		
		}
		else "Unsuccessful";
		
		if(isset($_REQUEST['logout'])){
	
		session_destroy();
		echo "<script>self.location='../welcome.php'</script>";
		
		
}
}
 
 if(isset($_REQUEST['syllabus'])){
	 				 
		echo "<script>self.location='updatesyllabus.php'</script>";
		}


?>

<head>
    <meta charset="UTF-8">
    <title>Admin DashBoard</title>
       
    <link rel="stylesheet" href="style.css">
   
    
  </head>
<body>
	<div class = "wrapper">
		<div class = "container">
			<h1>Welcome Administrator! Select an operation</h1><br><br><br><br><br>
			<form method="post">
			<button type="button" id="addfaculty" onClick="location.href='addteacher.php'">Add Faculty</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" id="addeval" onClick="location.href='../addeval.php'">Add Evaluation</button>	
			<br><br><br><br>
			<button type="button" id="Add Courses" onClick="location.href='course.php'">Add Courses</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" id="report" onClick="location.href='report.php'">Get Report</button>	<br><br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="AssignTeacher" onClick="location.href='assignteacher.php'">Assign Teachers to Subject</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" id="SelQP" onClick="location.href='selqp.php'">Select Question Papers</button>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
		<button type="syllabus" name="syllabus" id="syll">Update Syllabus</button><br><br>
			<button type="submit" name="logout" id="prevqp">Log Out</button>	
		
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
			
