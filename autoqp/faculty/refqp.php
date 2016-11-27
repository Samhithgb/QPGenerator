<!DOCTYPE html>
<?php 
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors",'1');
 if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
      	

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


echo "
 <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
      <!--Import materialize.css-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css'>


 <nav>
	 
    <div class='nav-wrapper blue'>
      <div class='row'>
        
        <div class='col s6 offset-s4'>
         <a href='#' class=''>Question Paper Generator : Previous Question Papers</a></div>
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

echo "<center><h6>Generated Question Papers for Subject :$subject</h6></center><br><br>";
echo "<center><table class='bordered highlight'>
<tr>
<thead>
<th>Question Paper ID</th>
<th>Evaluation ID</th>
<th>Eval Name and Date</th></thead>
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
<html >
  <head>
    <meta charset="UTF-8">
    <title>Add Questions</title>
       


 
<form method="post" class="col s12" action="renderqp.php">
 <div class="row">

						  <div class="input-field col s6 offset-s3">

								<select name="qps">	
				 					<option value="" disabled selected>Choose the question paper to view </option>
				
 
			<?php echo($options);?>				

			</select>
      

        <button class="btn waves-effect waves-light blue" type="submit" name="display">Display
    		<i class="material-icons right">send</i>
 			 </button>      
      
        <button class="btn waves-effect waves-light blue" type="button" name="display" onClick="location.href='facultydash.php'">Go Back
    		<i class="material-icons right">send</i>
 			 </button> 

        
</form>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
 <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>

<script>
  $(document).ready(function() {
    $('select').material_select();
	
    $('.button-collapse').sideNav();
        
  });
</script>
</body>
</html>