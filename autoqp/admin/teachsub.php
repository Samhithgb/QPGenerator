<!DOCTYPE html>


<head>
	   
          <meta charset="UTF-8">
          <title>Add admin</title>
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script src="https://cdnjs..com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
          <script>
            $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
          });
          </script>
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <nav>
	     <div class="nav-wrapper blue">
         <div class="row">
           <div class="col s8 offset-s1">
              <a href="#" class="">Question Paper Generator : Teacher-Subject </a>
           </div>
           <div col="col s4">
              <a href="#" class="offset-s8"> Logged in as  <?php echo $_SESSION["username"]; ?></a>
          </div>
        </div>
   </nav>

 <div class="row">
    <div class="col s12 blue">
      <ul class="tabs white">
        <li class="tab col s3 blue"><a class="active white-text" href="#test1">Home</a></li>
        <li class="tab col s3 blue"><a class="active white-text" href="#test2">Developers</a></li>
        <li class="tab col s3 blue" ><a class="active white-text" href="#test3">Guidelines</a></li>
        <li class="tab col s3 blue"><a class="active white-text" href="#test4">About Us</a></li>
        <div class="indicator white" style="z-index:1" </div>
      </ul>
    </div>
  </div>
<div class='container'>

			<br><br>
<?php 
session_start();
include("connect.php");
	session_cache_expire( 20 );
$inactive = 1200;
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		session_destroy();
		echo "<script>alert('Session Timeout! Please Login Again!');</script>";
		echo "<script>self.location='../welcome.php'</script>";
	}
}



if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      } 

$_SESSION['start'] = time();
	
$result = mysql_query("SELECT * FROM Handled_By");


if(!$result){
	 
	 echo "<script>alert('No results found!')</script>";
	 echo "<script>self.location='report.php'</script>";
}




echo "<center><table class='highlight'>
<thead>
<tr>
<th>Teacher ID</th>
<th>Teacher Name</th>

<th>Course ID</th>
<th>Course Name</th>

<th>Number of Hours</th>
<th>Course Year</th></thead>
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


  <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
</body>
