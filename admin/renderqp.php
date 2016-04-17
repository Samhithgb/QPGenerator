<!DOCTYPE html>
<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors",'1');
echo "<body>
	<form method='post'>
		<center><button type='submit' name='approve'>Approve Paper</button></center>
			
	</form>
</body>
</html>";
include("connect.php");
require_once '/var/www/html/admin/phpdocx-trial-pro-5.5/classes/CreateDocx.inc';
if(isset($_REQUEST['approve'])){
$docx = new CreateDocx();
$qp=$_SESSION['qp'];
$docx->embedHTML($qp);
//var_dump($qp);
$docx->createDocxAndDownload('qp');
}
if(isset($_REQUEST['display'])){
$qpid=$_REQUEST['qps'];
$_SESSION['qpaper']=$qpid;
$query="Select Content,L1,L2,L3 from  Question_Paper where QP_ID='$qpid'";
$res=mysql_query($query);
if(!res){
		echo "<script>alert('Question Paper Not Found!!');</script>";
}
else{
$qp=mysql_result($res,0,'Content');
$l1=mysql_result($res,0,'L1');
$l2=mysql_result($res,0,'L2');
$l3=mysql_result($res,0,'L3');

$_SESSION['qp']=$qp;
var_dump($l1);
//$SESSION['l1q']=(int)$l1;
//$SESSION['l2q']=(int)$l2;
//$SESSION['l3q']=(int)$l3;
//echo "<center><img src='gp2.php'/></center>";
var_dump($qp);	
}
	
}
?>

	  	
	