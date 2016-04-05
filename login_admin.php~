<!DOCTYPE html>
<html >
<?php
define('HOST','localhost');
define('USER','root');
define('PASS','root');
define('DB','Question_Paper_Generator');
session_start();
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$username = $_POST['uname'];
$password = $_POST['password'];
 
$sql = "select * from Admin where '$username'=Admin_ID and '$password'=Password";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
$date=date("Y/m/d");
$time=date("h:i:sa");
$type='Admin';
$sql2 = "insert into Login_History values('$date','$time','$username','$type')"	;
mysqli_query($con,$sql2);
echo 'success';
$_SESSION['username']=$username;
 echo "<script>self.location='admin/admindash.php'</script>";
}else{
echo 'Failed';
}
 
mysqli_close($con);
?>

	
	
	
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    
    
    
    
        <link rel="stylesheet" href="style.css">

    
    
    
  </head>

  <body>
	
    <div class="wrapper">
	<div class="container">
		<br><br><br>
		<h1>Welcome to Automatic Question Paper Generator</h1>
<br>
		Hello Admin! Please enter your credentials to login
		<br><br><br>
		<form class="form" method="post">
			<input type="text" name="uname" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit" id="login-button">Login</button>
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

     

    
    
    
  </body>
</html>
