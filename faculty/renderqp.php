<!DOCTYPE html>
<?php 
session_start();

$qpid=$_SESSION['qpaper'];
$sub=$_SESSION['subject'];

$eval=$_SESSION['eval'];
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
$query="Select Content from Prev_Qp where QP_ID='$qpid'";
$res=mysql_query($query);
if(!res){
		echo "<script>alert('Question Paper Not Found!!');</script>";
}
else{
$qp=mysql_result($res,0,'Content');

$_SESSION['qp']=$qp;

//$SESSION['l1q']=(int)$l1;
//$SESSION['l2q']=(int)$l2;
//$SESSION['l3q']=(int)$l3;
//echo "<center><img src='gp2.php'/></center>";
var_dump($qp);	
}
	
}
?>

	  	
	