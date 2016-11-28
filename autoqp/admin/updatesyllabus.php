<html>
<?php
session_start();
include("connect.php");
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

if(isset($_REQUEST['update'])){

$newsyll=$_REQUEST['newsyllabus'];
$unit=$_REQUEST['unit'];
$cid=$_REQUEST['cid'];


$query="update Topics SET Description='$newsyll' where (Course_Id = '$cid' and Unit_Number='$unit')";
$res=mysql_query($query);

if($res){
    echo "<script>alert('Successfully updated the syllabus')</script>";
    echo "<script>self.location='updatesyllabus.php'</script>";
	}
 else  die('Invalid query: ' . mysql_error());

       }


?>

<head>

          <meta charset="UTF-8">
          <title>Update syllabus</title>
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
<div class = "row">
<div class="container">
<div>

  <h5 align="center" class="grey-text">Update syllabus for a course</h5>
  <h6 align="center" class="grey-text">Fill the details and click submit to update the syllabus<h6>





		<form name="import" method="POST" >
      <div class="input-field col s6 offset-s3">
        <input type="text" name="cid" required>
        <label>Course ID</label>
      </div>

      <div class="input-field col s6 offset-s3">
        <input type="text" name="unit" required>
        <label>Unit number</label>
      </div>

      <div class="input-field col s6 offset-s3">
        <input type="text" name="newsyllabus" required>
        <label>Enter syllabus here</label>
      </div>


		<div class="input-field col s6 offset-s3">
<button class="waves-effect waves-light btn blue" name="update"  type="submit">
          Update syllabus</button>
	</div>


  <div class="col s6 offset-s3">
  <br><br>
  Click below to upload a .csv file to update the syllabus
  </div>

<div class="input-field col s6 offset-s3">
	<br>
<button class="waves-effect waves-light btn blue" onClick="location.href='syllcsv.php'">
         Upload file </button>
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
