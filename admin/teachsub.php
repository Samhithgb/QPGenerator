<!DOCTYPE html>
<?php 

include("connect.php");

$result = mysql_query("SELECT * FROM Handled_By");


if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	 echo "<script>self.location='report.php'</script>";
}
echo "<link rel='stylesheet' href='style.css'>";
echo "<div class = 'wrapper'>
		<div class = 'container'>";
echo "Teacher - Subject Map<br><br>";


echo "<center><table>

<tr>
<th>Teacher ID</th>
<th>Teacher Name</th>

<th>Course ID</th>
<th>Course Name</th>

<th>Number of Hours</th>
<th>Course Year</th>
</tr>";
  
while($row1 = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row1['Teacher_ID'] . "</td>";
$tid=$row1['Teacher_ID'];
$sql = "select 	Designation,FName,MName,LName from Teacher where Teacher_ID='$tid'";
$result2 = mysql_query($sql);
$mname=mysql_result($result2,0,3);
$lname=mysql_result($result2,0,2);
$fname=mysql_result($result2,0,1);
$desg=mysql_result($result2,0,0);
echo "<td>" .$desg.' '.$fname.' '.$mname.' '.$lname.' '."</td>";

echo "<td>" .$row1['Course_ID'] . "</td>";
$n=$row1['Course_ID'];
$sql = "select Course_Name from Course where Course_ID='$n'";
$result1 = mysql_query($sql);
$name=mysql_result($result1,0);
echo "<td>" . $name. "</td>";

echo "<td>" . $row1['No_of_Hours'] . "</td>";
echo "<td>" . $row1['Course_Year'] . "</td>";
echo "</tr>";

}


?>