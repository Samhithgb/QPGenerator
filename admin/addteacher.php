<!DOCTYPE html>
<html >

<?php 
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "hi";
    $S_ID=$_POST['sid'];
    $FN=$_POST['fn'];
    $MN=$_POST['mn'];
    $LN=$_POST['ln'];
    $DESG=$_POST['desg'];
    $DEPTID=$_POST['did'];
    $HOD_ID=$_POST['hid'];
    $PASSWD=$_POST['pass'];

    $query="insert into Teacher(`Teacher_ID`,`FName`,`MName`,`LName`,`Designation`,`Dep_ID`,`HOD_ID`,`Password`)  
    VALUES('$S_ID','$FN','$MN','$LN','$DESG','$DEPTID','$HOD_ID','$PASSWD')";    //not single quote  its the symbol above quotes    here login is table name and the fields inside the ()is field corresponding to table fields name;
    $res=mysql_query($query);

    echo "<script>alert('Registration Successful')</script>";
    echo "<script>self.location='form.php'</script>";

}
?>

  <head>
    <meta charset="UTF-8">
    <title>Faculty Details</title>    
        <link rel="stylesheet" href="style.css">    
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>Automatic Question Paper Generator</h1>
		<h2>Add Faculty Details</h2>
		
		<form class="form" action="" method="POST">
			<input name="sid" type="text" placeholder="Staff ID" required>
			<input name="fn" type="text" placeholder="First Name" required>
			<input name="mn" type="text" placeholder="Middle Name" required>
			<input name="ln" type="text" placeholder="Last Name" required>
			<input name="desg" type="text" placeholder="Designation" required>
			<input name="did" type="text" placeholder="Department ID" required>
			<input name="hid" type="text" placeholder="HOD ID(if applicable)" optional>
			<input name="pass" type="password" placeholder="Enter a strong password" required>
			<input name="pass2" type="password" placeholder="Re-enter your password" required>
			
			<input name="save" type="submit" id="login-button" value="Proceed">
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!--<script src="js/index.js"></script>-->

    
    
    
  </body>
</html>
