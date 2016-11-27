<html>
<?php 
session_start();
error_reporting(E_ALL);
	session_cache_expire( 20 );
$inactive = 10000;
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
      		
//ini_set("display_errors",'1');

    require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation

include("connect.php");
if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
  
	$c = 0;
	$options='';
	$pw="password";
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
    //echo "here";
		  $SID=$_SESSION['username'];
		$QID=uniqid();
		$co = $filesop[0];
		$question =AesCtr::encrypt($filesop[1], $pw, 256);
		
		$desc=$filesop[2];
    //echo $desc;
		$lod=$filesop[3];
		$U_No = $filesop[4];
		$marks = $filesop[5];
		$CID=$_SESSION['subject'];
		$sql = mysql_query("INSERT INTO Questions VALUES ('$SID','$QID','$marks','$co','$question','$desc','$lod','$U_No','$CID')");
	}
	
		if($sql){
			echo "<script>alert('Your database has imported successfully');</script>";
		}else{
			echo "<script>alert('Sorry! There is some problem.Check your file');</script>";
		}
}

	
	
	
?>	
	
<head>
    <meta charset="UTF-8">
    <title>Upload .csv</title>
    
       <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

  <body>
	    <div class="wrapper" id="wr">

   
 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
        
        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator : Add Questions using .csv</a></div>
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
    
    </div>



			<br><br>


<div class="container">
<center>
Columns : CO(in digits),Question,Remarks,Level of Difficulty,Unit_No (IN THE SAME ORDER).
</center>
<form name="import" method="post" enctype="multipart/form-data">


      <div class="row">
         <form class="col s12">
            <div class="file-field input-field">
      <div class="btn blue">
        <span>Upload</span>
        <input type="file" name="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
			<center>
			<button class="btn waves-effect waves-light blue" type="submit" name="submit" value="Submit">Done
    		<i class="material-icons right">send</i>
 			 </button>

			<button class="btn waves-effect waves-light blue" type="button" onClick="location.href='addquestions.php'">Back 
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 

    
    
    
  </body>
</html>
