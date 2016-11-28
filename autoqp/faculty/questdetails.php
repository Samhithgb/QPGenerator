<?php
session_start();
session_cache_expire( 20 );
$inactive = 1200;
if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		session_destroy();
		echo "<script>alert('Session Timeout! Please login again');</script>";
		echo "<script>self.location='../welcome.php'</script>";
	}
}
$_SESSION['start'] = time();

 if(!isset($_SESSION['username']))
    {
     
      echo "<script>alert('You are not logged in!');</script> ";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
      	
        ?>
<!DOCTYPE html>
   <head>
    <meta charset="UTF-8">
    <title>Edit Questions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
  </head>
	  
	  
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
 

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
	
	 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
        
        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator : Enter Details of the question</a></div>
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
    
    

		<br><br><br>

		<br> 
    
   <div class="container">
      <div class = "row">

		<form id="theform" method="POST" action="results.php"  class="col s12">
   <div class="row">
     <div class="input-field col s6">
          <input placeholder="Unit number"  id="uno" name="U_NO" type="number" class="validate" required>
          <label for="marks">Unit Number</label>
        </div>
        
       <div class="input-field col s6">
          <input id="marks" name="marks" type="number" placeholder="Least Possible Marks for the question" required class="validate">
          <label for="co">Least Marks</label>
        </div>
      </div>  
      <center>
			<div class="row">
      <button class="btn waves-effect waves-light blue" id="sub" type="submit" name="save" id="login-button">Search
    		<i class="material-icons right">send</i>
 			 </button>
        
      <button class="btn waves-effect waves-light blue" type="button" onClick="location.href='facultydash.php'">Dashboard
    		<i class="material-icons right">send</i>
 			 </button>
        </center>
</div>        
			
		</form>
	</div>
	
	
</div>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</html>