<!DOCTYPE html>
<?php 
//error_reporting(E_ALL);
//ini_set("display_errors",'1');
session_start();
  require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation
 if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
      	
include("connect.php");
if(isset($_REQUEST['save'])){

$unit = $_REQUEST['U_NO'];
$marks= $_REQUEST['marks'];
//$keyword=$cipher->encrypt($key, $macKey,$_REQUEST['KeyWords']);
$cid=$_SESSION['subject'];

$result = mysql_query("SELECT * FROM Questions where Course_Id = '$cid' and Unit_No = $unit and Marks>=$marks");
if(!$result){
	
	 echo "<script>alert('No results found!')</script>";
	 echo "<script>self.location='questdetails.php'</script>";
}

echo "
 <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
      <!--Import materialize.css-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css'>


 <nav>
	 
    <div class='nav-wrapper blue'>
      <div class='row'>
        
        <div class='col s6 offset-s4'>
         <a href='#' class=''>Question Paper Generator :Faculty Dashboard</a></div>
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

echo "<center><h5>Search Results</h5></center><br><br>";
echo "<center><table class='bordered highlight' >
<thead>
<tr>
<th>Question ID</th>
<th>Question</th>
<th>Marks</th></thead>
</tr>";
  
$options='';
while($row = mysql_fetch_array($result))
{
$pw="password";
$f=$row['Ques_ID'];
echo "<tr>";
echo "<td>" . $row['Ques_ID'] . "</td>";
echo "<td>" . htmlspecialchars(AesCtr::decrypt($row['Description'], $pw, 256)) . "</td>";

echo "<td>" . $row['Marks'] . "</td>";
echo "</tr>";
$options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
}
echo "</table></center>";
mysql_close($con);
}


if(isset($_REQUEST['update'])){
	
$id=$_REQUEST['updater'];
$pw="password";

$update= AesCtr::encrypt($_REQUEST['quest'], $pw, 256);

$teacher=$_SESSION['username'];
$cid=$_SESSION['subject'];;
$date = date('Y/m/d H:i:s');


$query="update Questions SET Description='$update' where Ques_ID = '$id'";
$query2="insert into Update_History values('$teacher','$cid','$id','$date')";

 $res=mysql_query($query);
 $res2=mysql_query($query2);
 
 if($res){
    echo "<script>alert('Successfully updated the question')</script>";
    echo "<script>self.location='questdetails.php'</script>";
	}
 else  die('Invalid query: ' . mysql_error());
	
	
}







?>

  <head>
    <meta charset="UTF-8">
    <title>Search Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <!--Import Google Icon Font-->
     
  </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>


<br><br>
   
    


 
  

				      <div class="container">
						<form method="post" id="theForm" class="col s12">
					      <div class="row">

						  <div class="input-field col s6 offset-s3">

								<select name="updater">	
				 					<option value="" disabled selected>Choose the question to update </option>
				
 
			<?php echo($options);?>				

			</select>
<br><br>
<input type="text" name="quest" placeholder="Give the updated question" required>
<br>
</div>
</div>
<div class = "row">
  <center>
<button class="btn waves-effect waves-light blue" type="submit" name="update">Update
    		<i class="material-icons right">send</i>
 			 </button>
        
        <button class="btn waves-effect waves-light blue" type="button" onClick="location.href='questdetails.php'">Go Back
    		<i class="material-icons right">send</i>
 			 </button>
</center>
</form>


	</div>
	
</div>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
    
    
  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>
<script src="results_ajax.js"></script>
   <script src="http://malsup.github.com/jquery.form.js"></script> 

<script>
  $(document).ready(function() {
    $('select').material_select();
	
    $('.button-collapse').sideNav();
        
  });
</script>  
</html>
