<!DOCTYPE html>
<?php 

include("connect.php");

echo "Update History";
$result = mysql_query("SELECT * FROM Update_History");
$result2 = mysql_query("SELECT * FROM Login_History");

if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	 echo "<script>self.location='report.php'</script>";
}
echo "<link rel='stylesheet' href='style.css'>";
echo "<div class = 'wrapper'>
		<div class = 'container'>";
echo "<h2>Login History</h2><br><br>";
echo "<center><table>
<tr>
<th>Login Date</th>
<th>Login Time</th>
<th>User ID</th>
<th>User Type</th>

</tr>";
  

while($row1 = mysql_fetch_array($result2))
{


echo "<tr>";
echo "<td>" . $row1['Login_Date'] . "</td>";
echo "<td>" .$row1['Login_Time'] . "</td>";
echo "<td>" . $row1['User_ID'] . "</td>";
echo "<td>" . $row1['User_Type'] . "</td>";
echo "</tr>";

}
echo "</table></center>";
echo "<br><br>";

echo "<h2>Update History</h2><br><br>";
echo "<center><table>
<tr>
<th>Teacher ID</th>
<th>Course ID</th>
<th>Question_ID</th>
<th>Time_of_Updated</th>
</tr>";
  
$options='';
while($row = mysql_fetch_array($result))
{
$f=$row['Ques_ID'];
echo "<tr>";
echo "<td>" . $row['Teacher_ID'] . "</td>";
echo "<td>" .$row['Course_ID'] . "</td>";
echo "<td>" . $row['Question_id'] . "</td>";
echo "<td>" . $row['Time_of_update'] . "</td>";
echo "</tr>";
}

echo "</table></center>";








?>
