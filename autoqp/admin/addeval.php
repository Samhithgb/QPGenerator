<!DOCTYPE html>
<html >

<?php
session_start();
$t[1]="CIE";
$t[2]="SEE";
include("connect.php");

if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  

 if(isset($_REQUEST['save']))
{
    $date=($_REQUEST['eval_date']);
    $type=$t[($_REQUEST['eval_type'])];
	$id=uniqid();
	$added=$_SESSION['username'];
    $query="insert into Evaluation(`Eval_Start_Date`,`Eval_Type`,`Eval_ID`,`Added_By`)  
    VALUES('$date','$type','$id','$added')";   
   
    $res=mysql_query($query);
   	if($res){
    echo "<script>alert('Addition of evaluation successful!')</script>";
    echo "<script>self.location='admindash.php'</script>";
	   }
	   
	else echo "<script>alert('Error! Please try again')</script>";

}

?>

<head>

          <meta charset="UTF-8">
          <title>Add Evaluation</title>
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




<div>
 <div class = "row">
 <div class="container">
  <form method="POST">
        <div class="row">
           <div class="input-field col s6 offset-s3">
             <input id="date" type="text" name="eval_date" required>
             <label for="last_nam">Start date(YYYY-MM-DD)</label>
           </div>
         </div>


	<div class="input-field col s6 offset-s3">

			<select name="eval_type">
				<option value="" disabled selected>Choose Evaluation</option>
				<option value="1">Continuous Internal Evaluation</option>
        <option value="2" >Semester End Evaluation</option>
			</select>
			<label>Evaluation Type</label>
			</div>


	<div class="input-field col s6 offset-s3">
      <button class="waves-effect waves-light btn blue" name="save"  type="submit" value="Proceed" >
       Proceed</button>
	</div>

 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>

  </form>
</div></div>
</div>



  </body>
</html>
