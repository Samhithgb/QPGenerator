<!DOCTYPE html>
<?php 
session_start();

echo "<body>
	<form>
		<center><button type='submit' name='approve'>Approve Paper</button></center>
			
	</form>
</body>
</html>";


include("connect.php");
if(isset($_REQUEST['display'])){
$qpid=$_REQUEST['qps'];
$query="Select Content from  Question_Paper where QP_ID='$qpid'";
$res=mysql_query($query);
if(!res){
	
	echo "<script>alert('Question Paper Not Found!!');</script>";
}

else{

$qp=mysql_result($res,0);
var_dump($qp);	
}
	
}
?>

	  	
	