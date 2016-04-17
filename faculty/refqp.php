<!DOCTYPE html>
<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors",'1');


include("connect.php");
//include("html_to_doc.inc.php");


$subject = $_SESSION['subject'];
//$eval= $_REQUEST['eval'];
$_SESSION['subject']=$subject;

//$_SESSION['eval']=$eval;
$result = mysql_query("SELECT * FROM  Prev_Qp where Course_ID = '$subject'");

if(!$result or $result==null){
	echo "<script>alert('Error : No Question Papers Found');</script>";
	
}

echo "<link rel='stylesheet' href='style.css'>";
echo "<div class = 'wrapper'>
		<div class = 'container'>";
echo "<h2>Generated Question Papers for Evaluation :$eval</h2><br><br>";
echo "<center><table border=1>
<tr>
<th>Question Paper ID</th>
<th>Evaluation ID</th>
<th>Eval Name and Date</th>
</tr>";

$options='';
$width = 600; $height = 200;
while($row = mysql_fetch_array($result))
{
$f=$row['QP_ID'];

echo "<tr>";
echo "<td>" . $row['QP_ID'] . "</td>";
echo "<td>" . $row['Eval_ID'] . "</td>";
$id= $row['Eval_ID'];
$sql = "select 	Eval_Start_Date,Eval_Type from Evaluation where Eval_ID='$id'";
$result2 = mysql_query($sql);
$mname=mysql_result($result2,0,0);
$lname=mysql_result($result2,0,1);
echo "<td>" .$mname.' '.$lname.' '."</td>";

echo "</tr>";
$options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
}
echo "</table></center>";
mysql_close($con);



?>

<br><br>
<h2>Choose the Question Paper ID to view</h2>
 
<form method="post" action="renderqp.php">
<SELECT name="qps">
<?php echo($options);?>		
</SELECT>
<button type="submit" name="display">Display</button>
</form>
