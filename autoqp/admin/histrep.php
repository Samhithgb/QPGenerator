<!DOCTYPE html>


<head>
	   
          <meta charset="UTF-8">
          <title>Login-Update History</title>
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
              <a href="#" class="">Question Paper Generator : Login-Update History </a>
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
$_SESSION['start'] = time();
	



if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      } 

$result = mysql_query("SELECT * FROM Update_History");
$result2 = mysql_query("SELECT * FROM Login_History");


echo"<h5>Login history</h5>";
if(!$result2){
	 
	 echo "No results found!";
	 
}



else{
echo "<center><table class='highlight'>
<thead>
<tr>
<th>Login Date</th>
<th>Login Time</th>
<th>User ID</th>
<th>User Type</th>
</thead>
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

echo "<center></table>";
}

echo"<h5>Update history</h5>";
if(!$result)
{
	 
	 echo "No results found!";
}

else
{
echo "<center><table class='highlight'>
<thead>
<tr>
<th>Teacher ID</th>
<th>Course ID</th>
<th>Question_ID</th>
<th>Time_of_Updated</th>
</thead>
</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Teacher_ID'] . "</td>";
echo "<td>" . $row['Course_ID'] . "</td>";
echo "<td>" . $row['Question_id'] . "</td>";
echo "<td>" . $row['Time_of_update'] . "</td>";
echo "</tr>";

}

echo "<center></table>";

}

?>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
</body>
