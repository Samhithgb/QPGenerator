<?php 
session_start();
include("connect.php");
$cid=$_SESSION['subject'];
$cid='12IS64';

$result = mysql_query("SELECT * FROM Topics where Course_Id = '$cid' ");
if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	// echo "<script>self.location='syllabus.php'</script>";
}
echo "<body>";
echo "<link rel='stylesheet' href='style.css'>";
echo "<div class = 'wrapper'>
      <div class = 'container'>";
echo "<h2>Syllabus</h2><br><br>";
echo "<center><table border='1'>
<tr>
<th>Unit Number</th>
<th>Topics</th>
</tr>";
 
//$options='';
while($row = mysql_fetch_array($result))
{
//$f=$row['Ques_ID'];
echo "<tr>";
echo "<td>" . $row['Unit_Number'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "</tr>";
//$options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
}
echo "</table></center></body>";
mysqli_close($con);



?>

	</div>
	
	<ul class='bg-bubbles'>
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
</html>