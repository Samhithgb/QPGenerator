<?php 
session_start();
include("connect.php");
$cid=$_SESSION['subject'];
	session_cache_expire( 20 );
$inactive = 1200;
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
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
      	

$result = mysql_query("SELECT * FROM Topics where Course_Id = '$cid' ");
if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	// echo "<script>self.location='syllabus.php'</script>";
}
echo "<body>";




echo "
 <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
      <!--Import materialize.css-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css'>


 <nav>
	 
    <div class='nav-wrapper blue'>
      <div class='row'>
        
        <div class='col s6 offset-s4'>
         <a href='#' class=''>Question Paper Generator : Check Syllabus</a></div>
<div col='col s4'>
         <a href='#' class='offset-s5'>Hi,"; echo $_SESSION['name']; echo" 
       </a>
       </div>
   </div>
   
  
    
  </nav>
        
 <div class='row blue'>
    <div class='col s8 blue'>
      <ul class='tabs white'>
        <li class='tab col s2 blue'><a class='active white-text' href='#test1'>Home
</a></li>
        <li class='tab col s2 blue'><a class='active white-text' href='#test2'>Developers</a></li>
        <li class='tab col s2 blue' ><a class='active white-text' href='#test3'>Guidelines</a></li>
        <li class='tab col s2 blue'><a class='active white-text' href='#test4'>About Us</a></li>
        <div class='indicator white' style='z-index:1' </div>

      </ul>
    </div>
    </div>
    <br><br>
    <div class='container'>
    ";
echo "<center><h5>Syllabus : $cid</h5></center><br><br>";
echo "<center><table class='bordered highlight'>
<tr>
<thead>
<th>Unit Number</th>
<th>Topics</th></thead>
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

echo "</table></center>";
mysqli_close($con);



?><br><br><center>
 <button class="btn waves-effect waves-light blue" type="button" onClick="location.href='facultydash.php'">Go Back
    		<i class="material-icons right">send</i>
 			 </button></center>
</div>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</html>