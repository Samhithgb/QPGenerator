<?php 
//error_reporting(E_ALL);
//ini_set("display_errors",'1');
    require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation
include("connect.php");
session_start();
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
      	
 if(isset($_REQUEST['save']))
{
   
    $SID=$_SESSION['username'];
    $QID=uniqid();
    $marks=$_REQUEST['marks'];
    $CO=$_REQUEST['CO'];
    $pw="password";
    $Question= AesCtr::encrypt($_REQUEST['Question'], $pw, 256);
   
    $description=$_REQUEST['description'];
    $LOD=$_REQUEST['LOD'];
    $U_NO=$_REQUEST['U_NO'];
	$CID=$_SESSION['subject'];
    echo "<script>alert($CID)</script>";
    $query="insert into  Questions(`Teacher_ID`,`Ques_ID`,`Marks`,`CO`,`Description`,`Remarks`,`LOD`,`Unit_No`,`Course_Id`)  
    VALUES('$SID','$QID','$marks','$CO','$Question','$description','$LOD','$U_NO','$CID')";   
    $res=mysql_query($query);

   if($res){
    echo "<script>alert('Successful')</script>";
    echo "<script>self.location='addquestions.php'</script>";
	}
 else  die('Invalid query: ' . mysql_error());
}
?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Add Questions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <script src="questions.js"></script>
   <script src="http://malsup.github.com/jquery.form.js"></script> 

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
  </head>

  <body>
    
    
 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
        
        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator : Add Questions to Database</a></div>
<div col="col s4">
         <a href="#" class="offset-s5">Hi, <?php echo $_SESSION["name"]; ?>
       </a>
       </div>
   </div>
   
  
    
  </nav>
        
 <div class="row blue">
    <div class="col s8 blue">
      <ul class="tabs white">
        <li class="tab col s2 blue"><a class="active white-text" href="#test1">Home
</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test2">Developers</a></li>
        <li class="tab col s2 blue" ><a class="active white-text" href="#test3">Guidelines</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test4">About Us</a></li>
        <div class="indicator white" style="z-index:1" </div>

      </ul>
    </div>
    </div>
    
    


<div class="container">
	
  <div class="row">
    <form class="col s12" id="theForm">
      <div class="row">

		<div class="input-field col s6">
          <input placeholder="Enter marks"  id="marks" name="marks" type="number" class="validate" required>
          <label for="marks">Marks</label>
        </div>
        
       <div class="input-field col s6">
          <input id="co" name="CO" type="number" placeholder="CO(ex:1 is equivalent to CO1)" required class="validate">
          <label for="co">Course Outcome</label>
        </div>
      </div>  
      
       <div class="row">
        <div class="input-field col s12">
          <input  id="quest" name="Question" type="text" placeholder="Enter Your Question" required class="validate">
          <label for="quest">Your Question</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
          <input id="desc" name="description" type="text" placeholder="Brief Description" required class="validate">
          <label for="desc">Description :</label>
        </div>
      </div>
      
        <div class="row">
        <div class="input-field col s12">
          <input id="lod" name="LOD" type="number" placeholder="Level Of Difficulty" required>
          <label for="lod">Level of Difficulty</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="uno" name="U_NO" type="number" placeholder="Unit Number" required class="validate">
          <label for="uno">Unit Number :</label>
        </div>
      </div>
      
      <button class="btn waves-effect waves-light blue" type="submit" name="save" id="sub">Proceed
    		<i class="material-icons right">send</i>
 			 </button>
        
 <button class="btn waves-effect waves-light blue" id="sub" type="button" name="back" id="done-button" onClick="location.href='facultydash.php'">Go to Dashboard
    		<i class="material-icons right">send</i>
 			 </button>
        
 
 <button class="btn waves-effect waves-light blue" id="csv" type="button" name="csv"  id="csv-redirect" onClick="location.href='addfile.php'">Upload using a .csv file
    		<i class="material-icons right">send</i>
 			 </button>    
                <div class="indicator white" style="z-index:1" </div>   
       </form>
      
			
    
    </div>
    

  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
    
  </body>
</html>
