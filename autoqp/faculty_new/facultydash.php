<!DOCTYPE html>
<?php
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

if(isset($_SESSION['username'])){
  
  $username = $_SESSION['username'];
  $sql="select Course_ID from Handled_By where Teacher_ID='$username'"; 
  $sql2="select Designation,FName,MName,LName from Teacher where Teacher_ID='$username'";
  $result=mysql_query($sql); 
  $result2=mysql_query($sql2); 
 
  $options="";
  $options2="";   
     
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Course_ID"]; 
    $options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
    $i++;
  }
  
  while ($row=mysql_fetch_array($result2)) { 
    $f=$row["Designation"]; 
	$k=$row["FName"];
	$l=$row["MName"];
	$m=$row["LName"];
	$n=$row["Teacher_ID"];
	
    $options2.=$f.'.'.$k.' '.$l.' '.$m; 
	$_SESSION['name']=$options2;
    $i++;
  }
  
}


if(isset($_REQUEST['add'])){
	
		if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		$now= $_SESSION['subject'];
		 
		echo "<script>self.location='addquestions.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}

if(isset($_REQUEST['edit'])){
	
		if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		$now= $_SESSION['subject'];
		 
		echo "<script>self.location='questdetails.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}


if(isset($_REQUEST['gen'])){
	 
if($_REQUEST['subject']){
	    $_SESSION['subject']=$_REQUEST['subject'];
		
		 
		echo "<script>self.location='selecteval.php'</script>";
		}
		else  "<script>alert('Select your subject!')</script>";
}


	 
if(isset($_REQUEST['syllabus'])){
	    $_SESSION['subject']=$_REQUEST['subject'];
		
		 
		echo "<script>self.location='syllabus.php'</script>";
		}
		


if(isset($_REQUEST['logout'])){
	
	
		session_destroy();
		echo "<script>self.location='../welcome.php'</script>";
		
		
}



if(isset($_REQUEST['prev'])){
	
		 $_SESSION['subject']=$_REQUEST['subject'];
		echo "<script>self.location='refqp.php'</script>";
		
		
}


?>



<head>
		
	 <meta charset="UTF-8">
    <title>Hello Faculty!</title>
    
    
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





<body>



 <nav>
	 
    <div class="nav-wrapper blue">
         <a href="#" class="">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question Paper Generator</a>
 
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Developers</a></li>
        <li><a href="badges.html">About Us</a></li>
        <li><a href="collapsible.html">Logout</a></li>
		<li><a href="collapsible.html">Troubleshoot</a></li>
      </ul>
    </div>
  </nav>
        



			<br><br>
				      <div class="container">
						<form method="post"  class="col s5">
					      <div class="row">

						  <div class="input-field col s12">

								<select name="subject">	
				 					<option value="" disabled selected>Choose your subject</option>
				
 
			<?php echo($options);?>				

			</select>
</div>	
</div>
</div>
<div class="container">



<div class="row">
	<div class="col s4">
		
			  <div class="card">
    				<div class="card-image waves-effect waves-block waves-light">
      					<img class="activator" src="images/add.jpg">
    				</div>
   					 <div class="card-content">
     					 <span class="card-title activator grey-text text-darken-4">Add Questions<i class="material-icons right">more_vert</i></span>
      					 <p><button class="btn waves-effect waves-light blue" type="submit" name="add" id="addquestions">Add
    					 <i class="material-icons right">send</i>
  							</button>
    				</div>
   					 <div class="card-reveal">
      						<span class="card-title grey-text text-darken-4">Add Questions<i class="material-icons right">close</i></span>
     						 <p>Add more questions to the database using this option.</p>
    				</div>
  			</div>
  </div>
  
<div class="col s4">
  <div class="card">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/questions.jpg">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Generate Paper<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="submit" name="gen" id="generateqp">Generate
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Generate Paper<i class="material-icons right">close</i></span>
      <p>Generate Question Paper for CIE or SEE</p>
    </div>
  </div>
  </div>
  
  
   
<div class="col s4">
  <div class="card">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/edit.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Edit Questions<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="submit" name="edit" id="EditQuestions">Edit
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Edit Questions<i class="material-icons right">close</i></span>
      <p>Edit Questions already in the database</p>
    </div>
  </div>
  </div>
  
  <div class="col s4">
  <div class="card">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/prev.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Previous Papers<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="submit" name="prev" id="prevqp">Refer
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Previous Papers<i class="material-icons right">close</i></span>
      <p>Refer to previous question papers in the database</p>
    </div>
  </div>
  </div>
  <div class="col s4">
  <div class="card">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/sylla.jpg">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Check The Syllabus<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="submit" name="syllabus" id="syllabus">Check
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Check The Syllabus<i class="material-icons right">close</i></span>
      <p>Check the syllabus for the selected subject.</p>
    </div>
  </div>
  </div>
  
  
					</form>
			
			
			
			
			</div>
			
			
			
			
			
		
</body>
</html>
