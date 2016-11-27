<!DOCTYPE html>
<html >

<?php
session_start();
include("connect.php");




if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  

$ty[1]="Elective";
$ty[2]="Mandatory";
if(isset($_REQUEST['save']))
{
    $sem=$_REQUEST['sem'];
    $cid=$_REQUEST['ID'];
    $title=$_REQUEST['title'];
    $nocre=$_REQUEST['noc'];
    $type=$ty[($_REQUEST['type'])];
    $dept=$_REQUEST['deptID'];
    $query="insert into Course(`Semester`,`Course_ID`,`Credits`,`Course_Tyoe`,`Dept_ID`,`Course_Name`)
    VALUES('$sem','$cid','$nocre','$type','$dept','$title')";
    echo "<script>console.log('Registration...')</script>";
    $res=mysql_query($query);

    echo "<script>alert('Registration Successful')</script>";
    echo "<script>self.location='course.php'</script>";

}




?>

<head>

          <meta charset="UTF-8">
          <title>Add course</title>
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

			<br><br>



<div class = "row">
<div class="container">
<div>
  <h4 align="center" class="grey-text">Add course details</h4>

  <form class="form" id="form1" method="post" action="course.php">


    <div class="input-field col s6 offset-s3">
            <input id="semester" type="number" name="sem" required>
            <label for="semester">Semester</label>
      </div>


      <div class="input-field col s6 offset-s3">
              <input id="cid" type="text" name="ID">
              <label for="cid">Course ID (Ex:12IS64 or 12IS6B3)</label>
            </div>



<div class="input-field col s6 offset-s3">
                <input id="dept" type="text" name="title" required>
                <label >Course title</label>
              </div>


      <div class="input-field col s6 offset-s3">
              <input id="noc" type="number" name="noc" required>
              <label for="noc">Number of Credits</label>
      </div>

      <div class="input-field col s6 offset-s3">

  			<select name="type" id="type" required>
				<option value="" disabled selected>Choose an option</option>
  				<option value="1">Elective</option>
          			<option value="2">Mandatory</option>
  			</select>
  			<label>Elective/Mandatory</label>
  			</div>

        <div class="input-field col s6 offset-s3">
                <input id="dept" type="text" name="deptID" required>
                <label for="dept">Department ID(Ex: RVCEISE)</label>
              </div>


    <div class="input-field col s6 offset-s3">
  <button class="waves-effect waves-light btn blue" name="save"  type="submit" id="login-button" id="sub">
       Proceed</button>
	</div>



<div class="col s6 offset-s3">
  <br>
  <h6 class="grey-text">To upload a .csv file with multiple course details,click below</h6>
  </div>

<div class="input-field col s6 offset-s3">
  <button class="waves-effect waves-light btn blue" onClick="location.href='courseupdate.php'">
       click here</button>
	</div>




 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>


  </form>



</div>



  </body>
</html>

