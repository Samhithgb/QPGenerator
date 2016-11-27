<!DOCTYPE html>
<html>

<?php
session_start();
include("connect.php");

if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  

if(isset($_REQUEST['save']))
{

    $ADM_ID=$_REQUEST['hid'];
    $PASSWD=md5($_REQUEST['pass']);
    $query="insert into Admin(`Admin_ID`,`Password`) values('$ADM_ID','$PASSWD')";
    $res=mysql_query($query);
    echo "<script>alert('Registration Successful')</script>";
    echo "<script>self.location='admindash.php'</script>";

}
?>

<head>

          <meta charset="UTF-8">
          <title>Add admin</title>
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    
     <script src="adminadd.js"></script>
           <script src="http://malsup.github.com/jquery.form.js"></script> 
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>


<body>

    <nav>
	     <div class="nav-wrapper blue">
         <div class="row">
           <div class="col s8 offset-s1">
              <a href="#" class="">Question Paper Generator:Add New Administrator</a>
           </div>
           <div col="col s4">
              <a href="#" class="offset-s8"></a>
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

  <center> <span id="user-availability-status"></span></center>

    <form method="POST" action="">

           <div class="input-field col s6 offset-s3">
             <input id="username" type="text" onBlur='checkAvailability()' name="hid">
             <label >Username</label>

         </div>

        <div class="input-field col s6 offset-s3">
          <input id="password" type="password" name="pass">
          <label>Password</label>
        </div>


       <div class="input-field col s6 offset-s3">
          <input id="password" type="password" name="pass2">
          <label>Re-enter Password</label>
        </div>

	<div class="input-field col s6 offset-s3">

  <button class="btn blue waves-effect waves-light" name="save" type="submit" value="Proceed" id="button">Proceed
  </button>
	</div>





 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="admindash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>


      </form>
  </div>
</div></div>

  </body>
</html>
