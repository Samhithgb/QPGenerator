<?php

define('HOST','localhost');
define('USER','root');
define('PASS','root');
define('DB','Question_Paper_Generator');
session_start(); 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$username = $_POST['uname'];
$password = $_POST['password'];
 
$sql = "select * from Teacher where '$username'=Teacher_ID and '$password'=Password";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);

if(isset($check)){
$date=date("Y/m/d");
$time=date("h:i:sa");
$type='Faculty';
$sql2 = "insert into Login_History values('$date','$time','$username','$type')"	;
mysqli_query($con,$sql2);

echo 'success';
$_SESSION['username']=$username;

echo "<script>self.location='faculty/facultydash.php'</script>";
}else{
echo "<script>alert('Failed!');</script>";
echo "<script>self.location='login_fac.html'</script>";

}
 
mysqli_close($con);
?>
