<!DOCTYPE html>
<?php
include("connect.php");
session_start();
$date=date("Y/m/d");
$sql="select Eval_Start_Date,Eval_Type,Eval_ID from  Evaluation where Eval_Start_Date > '$date'";
$result=mysql_query($sql);  
$options="";   
$i = 1;
	session_cache_expire( 20 );
$inactive = 1200;
 if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
      	
        
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		echo "<script>alert('Session Timeout! Please Login Again!');</script>";
		echo "<script>self.location='../welcome.php'</script>";
	}
}
$_SESSION['start'] = time();
	

  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Eval_Start_Date"]; 
	$k=$row["Eval_Type"];
	$n=$row["Eval_ID"];
	$type[$n]=$k;
    $options.="<OPTION VALUE=\"$n\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }

if(isset($_REQUEST['save'])){
	
	if(isset($_REQUEST['eval'])){
		
		$_SESSION['evaltype']=$type[$_REQUEST['eval']];
		$_SESSION['eval']=$_REQUEST['eval'];
	    if($type[$_REQUEST['eval']]=='CIE')
		echo "<script>self.location='ciedetcol.php'</script>";
		else echo "<script>self.location='qpgensee_updated.php'</script>";
		
	}
	
	
	
}



?>
<head>
		
	 <meta charset="UTF-8">
    <title>Select the Evluation</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script>
  $(document).ready(function() {
    $('select').material_select();
	
    $(".button-collapse").sideNav();
        
  });
  </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>



</head>


<body>
	

   
 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
        
        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator : Select Evaluation</a></div>
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
    
    




			<br><br>
      <div class="container">
      <div class = "row">
				      <div class="container">
						<form method="post"  class="col s12">
					      <div class="row">

						  <div class="input-field col s6 offset-s3">

								<select name="eval">	
				 					<option value="" disabled selected>Choose Evaluation</option>
				
 
			<?php echo($options);?>				

			</select>
</div>	
</div>
</div>

		<div class="col s4 offset-s5">	
			
			<button class="btn waves-effect waves-light blue" type="submit" name="save" id="save">Next
    		<i class="material-icons right">send</i>
 			 </button>
		</div>	
			</form>
</div>
</div>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
</body></html>
