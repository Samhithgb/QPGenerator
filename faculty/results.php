<!DOCTYPE html>
<?php 
session_start();
include("connect.php");
if(isset($_REQUEST['save'])){

$unit = $_REQUEST['U_NO'];
$marks= $_REQUEST['marks'];
$keyword=$_REQUEST['KeyWords'];
$cid=$_SESSION['subject'];

$result = mysql_query("SELECT * FROM Questions where Course_Id = '$cid' and Unit_No = $unit and Description LIKE '%$keyword%' and Marks>=$marks");
if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	 echo "<script>self.location='questdetails.php'</script>";
}
echo "<link rel='stylesheet' href='style.css'>";
echo "<div class = 'wrapper'>
		<div class = 'container'>";
echo "<h2>Search Results</h2><br><br>";
echo "<center><table>
<tr>
<th>Question ID</th>
<th>Question</th>
<th>Marks</th>
</tr>";
  
$options='';
while($row = mysql_fetch_array($result))
{
$f=$row['Ques_ID'];
echo "<tr>";
echo "<td>" . $row['Ques_ID'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Marks'] . "</td>";
echo "</tr>";
$options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
}
echo "</table></center>";
mysqli_close($con);
}


if(isset($_REQUEST['update'])){
	
$id=$_REQUEST['updater'];
$update=$_REQUEST['quest'];
$teacher=$_SESSION['username'];
$cid=$_SESSION['subject'];


$query="update Questions SET Description='$update' where Ques_ID = '$id'";
$query2="insert into Update_History values('$teacher','$cid','$id')";

 $res=mysql_query($query);
 $res2=mysql_query($query2);
 
 if($res && $res2){
    echo "<script>alert('Successfully updated the question')</script>";
    echo "<script>self.location='questdetails.php'</script>";
	}
 else  die('Invalid query: ' . mysql_error());
	
	
}







?>
<br><br>
<h2>Choose the question to update:</h2>
 
<form method="post">
<SELECT name="updater">
	<?php echo($options);?>		
</SELECT>
<br><br>
<input type="text" name="quest" placeholder="Give the updated question" required>
<br>
<button type="submit" name="update">Update</button>
<br><br>
<button type="button" onClick="location.href='questdetails.php'">Go to Search</button>

</form>


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
