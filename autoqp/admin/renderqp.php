<!DOCTYPE html>
<?php 
session_start();
 if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
      	
$qpid=$_SESSION['qpaper'];
$sub=$_SESSION['subject'];
echo "<body>
	<form method='post'>
		<center><button type='submit' id='appr' name='approve'>Print this Paper</button></center>
			
	</form>
</body>";
$eval=$_SESSION['eval'];
include("connect.php");
//require_once '/var/www/html/admin/phpdocx-trial-pro-5.5/classes/CreateDocx.inc';
if(isset($_REQUEST['approve'])){
//$docx = new CreateDocx();
$qp=$_SESSION['qp'];
echo $qp;
echo "
 <script type='text/javascript'>
        
            var ButtonControl = document.getElementById('appr');
            ButtonControl.style.visibility = 'hidden';
            window.print();
            window.location='admindash.php';
    </script>";
}
if(isset($_REQUEST['display'])){
$qpid=$_REQUEST['qps'];
$_SESSION['qpaper']=$qpid;
$query="Select Content from Question_Paper where QP_ID='$qpid'";
$res=mysql_query($query);
if(!$res){
		echo "<script>alert('Question Paper Not res Found!!');</script>";
}
else{
$qp=mysql_result($res,0,'Content');
if(!$qp){
		echo "<script>alert('Question Paper Not Found!!');</script>";
  
}
$_SESSION['qp']=$qp;

echo $qp;	
}
	
}
?>

	  	
	
