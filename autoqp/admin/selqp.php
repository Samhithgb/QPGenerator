<!DOCTYPE html>
<html >

<?php
include("connect.php");
session_start();
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


  //$username = $_SESSION['username'];
  $sql="select Eval_Start_Date,Eval_Type,Eval_ID from  Evaluation where Eval_Start_Date > '$date'";
$result=mysql_query($sql);
 $options="";
 $i = 1;
  while ($row=mysql_fetch_array($result)) {
    $f=$row["Eval_Start_Date"];
	$k=$row["Eval_Type"];
	$n=$row["Eval_ID"];
	$type[$n]=$k;
    $options.="<OPTION VALUE=\"$n\">".$f.' '.$k."</OPTION>";
    $i++;
  }


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
  
  if(isset($_REQUEST['go2'])){

    $_SESSION['subject']=$_REQUEST['subject'];
    $_SESSION['eval']=$_REQUEST['eval'];



  }



  ?>


<head>

          <meta charset="UTF-8">
          <title>Select question paper</title>
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
              <a href="#" class="offset-s8"> Logged in as</a>
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
    <h4 align="center" class="grey-text">Select Department and Subject</h4>

  		<form class="form" method="post">

  			<select name="department">
  				<option value="" disabled selected>Choose department</option>
  				<?php echo($options0);?>
  			</select>



           <div class="input-field col">
  	           <button class="waves-effect waves-light btn blue" name="go"  type="submit" id="prevqp">
              Get subjects</button>
  	       </div>

            <br><br>
  		</form>



      <form class="form" method="post" action="displayqps.php">
<br>
  			<select name="subject">
  				<option value="" disabled selected>Select course</option>
  				<?php echo($options1);?>
  			</select>


        <select name="eval">
  				<option value="" disabled selected>Select Evaluation</option>
  				<?php echo($options);?>
  			</select>


           <div class="input-field col s3">
              <button class="waves-effect waves-light btn blue" name="go2"  type="submit" id="prevqp">
              Fetch question papers</button>
  	       </div>

 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>


            <br><br>
  		</form>


  <br><br>
  </div>
  </div>
</div>

  </body>
</html>
