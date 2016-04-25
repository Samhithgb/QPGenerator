<!DOCTYPE html>
<html >

<?php 
error_reporting(E_ALL);
ini_set("display_errors",'1');
include("connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
  
    $ADM_ID=$_POST['hid'];
    $PASSWD=md5($_POST['pass']);

    $query="insert into Admin(`Admin_ID`,`Password`)  
    VALUES('$ADM_ID','$PASSWD')";   
    $res=mysql_query($query);

    echo "<script>alert('Registration Successful')</script>";
    echo "<script>self.location='admindash.php'</script>";

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
			<input name="hid" type="text" placeholder="Enter Admin ID" optional>
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
