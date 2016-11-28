<!DOCTYPE html>
<html >

<?php
//$username = $_SESSION['username'];
include("connect.php");
session_start();
	session_cache_expire( 20 );
$inactive = 1200;
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
	
  
  
  
  
  $sql="select Dept_Name,Dept_ID from Department"; 
  $result=mysql_query($sql); 

  $options0="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Dept_Name"]; 
	$k=$row["Dept_ID"];
    $options0.="<OPTION VALUE=\"$k\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }
  
  
  if(isset($_REQUEST['go'])){
  $dept=$_REQUEST['department'];
  echo "<script>console.log('Insdie');</script>";
  $sql="select Course_ID,Course_Name from Course where Dept_ID='$dept'"; 
  $result=mysql_query($sql); 

  $options1="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
    $f=$row["Course_ID"]; 
	$k=$row["Course_Name"];
    $options1.="<OPTION VALUE=\"$f\">".$f.' '.$k."</OPTION>"; 
    $i++;
  }
  }
  
   if(isset($_REQUEST['go'])){
	   $dept=$_REQUEST['department'];
   $sql="select Designation,FName,MName,LName,Teacher_ID from Teacher where Dep_ID='$dept'"; 
  $result=mysql_query($sql); 

  $options2="";   
  $i = 1;
  while ($row=mysql_fetch_array($result)) { 
   $f=$row["Designation"]; 
	$k=$row["FName"];
	$l=$row["MName"];
	$m=$row["LName"];
	$n=$row["Teacher_ID"];
	
    $options2.="<OPTION VALUE=\"$n\">".$f.'.'.$k.' '.$l.' '.$m."</OPTION>"; 
    $i++;
  }
   }
   if(isset($_REQUEST['go2'])){
	   $subject=$_REQUEST['subject'];
	   //echo "$subject";
	   $teacher=$_REQUEST['teacher'];
	   //echo "$teacher";
	   $nohurs=$_REQUEST['noofh'];
       //    echo "$nohurs";
	   $year = $_REQUEST['year'];
	   //echo "$year";
	   
	   $sql="insert into Handled_By values('$teacher','$subject','$nohurs','$year');";   	
	   $res = mysql_query($sql);
	   if(!$res){
		   
		   echo "<script>alert('Not Successful.');</script>";
	   }
		  
	   else  echo "<script>alert('Successfully Assigned');</script>";
  }
   
 
?>
<head>

          <meta charset="UTF-8">
          <title>Assign faculty</title>
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
         <div class="row">
           <div class="col s8 offset-s1">
              <a href="#" class="">Question Paper Generator</a>
           </div>
           <div col="col s4">
              <a href="#" class="offset-s8"> Logged in as <?php echo $_SESSION["username"];?></a>
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





<div>


 <div class = "row">
 <div class="container">

<h4 align="center">Assign faculty to a course</h4>
		<form class="col s12" action="" method="POST">


      			<div class="input-field col s6 offset-s3">

			<select name="department">
				<option value="" disabled selected>Choose department</option>
				<?php echo($options0);?>
			</select>
			</div>


						<div class="input-field col s6 offset-s5">
							<button class="waves-effect waves-light btn blue" name="go"  type="submit" id="prevqp">Get Details</button>
						</div>
</form>
<form class="col s12" action="" method="POST">


			<div class="input-field col s6 offset-s3">
	 			<select name="subject">
					<option value="" disabled selected>Choose subject</option>
					<?php echo($options1);?>
				</select>
		</div>



			<div class="input-field col s6 offset-s3">

			<select name="teacher">
				<option value="" disabled selected>Choose Staff-ID</option>
				<?php echo($options2);?>
			</select>


			</div>
<br><br><br>


          <div class="input-field col s6 offset-s3">
            <input id="nohours" type="number" name="noofh" required>
            <label for="nohours">Number of Hours</label>
          </div>


          <div class="input-field col s6 offset-s3">
            <input id="Year" type="number" name="year" required>
            <label for="Year">Year</label>
          </div>


	  <div class="input-field col s6 offset-s5">
          <button class="waves-effect waves-light btn blue" name="go2"  type="submit" value="Proceed" id="prevqp" align="center">
          Proceed</button>
	  </div>

 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>

		</form>

</div>
</div>
</div>



  </body>
</html>
