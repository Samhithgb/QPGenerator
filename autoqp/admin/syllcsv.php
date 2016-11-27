<html>
<?php
session_start();
include("connect.php");
	session_cache_expire( 20 );
$inactive = 10;



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

if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$options='';
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		$unit=$filesop[0];
		$cid = $filesop[1];
		$syll=$filesop[2];


		$sql = mysql_query("INSERT INTO Topics VALUES ('$unit','$cid','$syll')");
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
          <title>Upload syllabus</title>
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




  <h5 align="center" class="grey-text">Upload course details</h5>
  <h6 align="center" class="grey-text">	Please make sure the file is a .csv file encoded in UTF-8 and English(US)<h6>
  <h6 align="center" class="grey-text">		Columns : Unit No,Course ID,Syllabus (IN THE SAME ORDER).<h6>




		<form name="import" method="post" enctype="multipart/form-data">
			<div class="file-field input-field">
				<div class="btn blue">
					<span>file</span>
					<input type="file" name="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text">
				</div>
			</div>




		<div class="input-field col s6 offset-s3">
&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
<a class="waves-effect waves-light btn blue" name="submit"  type="submit" value="Submit">
          Upload</a>
	</div>



<div class="input-field col s6 offset-s3">
	 &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
<a class="waves-effect waves-light btn blue" onClick="location.href='./admindash.php'">
          Go back</a>
	</div>



		</form>


</div>
</div>
</div>


  </body>
</html>
