<!DOCTYPE html>
<html >
     
<?php

session_start();

include("connect.php");

$sql="select Dept_ID from Department"; 
$result=mysql_query($sql); 
$options="";
while ($row=mysql_fetch_array($result)) { 
    $f=$row["Dept_ID"]; 
    $options.="<OPTION VALUE=\"$f\">".$f."</OPTION>"; 
    $i++;
}


if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  


if(isset($_REQUEST['save']))
{
    echo "hi";
    $S_ID=$_REQUEST['sid'];
    $FN=$_REQUEST['fn'];
    $MN=$_REQUEST['mn'];
    $LN=$_REQUEST['ln'];
    $DESG=$_REQUEST['desg'];
    $DEPTID=$_REQUEST['did'];
    var_dump($DEPTID);
    $HOD_ID=$_REQUEST['hid'];
    $PASSWD=md5($_REQUEST['pass']);

    $query="insert into Teacher(`Teacher_ID`,`FName`,`MName`,`LName`,`Designation`,`Dep_ID`,`HOD_ID`,`Password`)  
    VALUES('$S_ID','$FN','$MN','$LN','$DESG','$DEPTID','$HOD_ID','$PASSWD')";    //not single quote  its the symbol above quotes    here login is table name and the fields inside the ()is field corresponding to table fields name;
    $res=mysql_query($query);
    if(!$res){
    echo "<script>alert('Registration Not Successful!')</script>";
    //echo "<script>self.location='addfacutly.php'</script>";
      
    }
    else{
    echo "<script>alert('Registration Successful')</script>";
    echo "<script>self.location='admindash.php'</script>";
    }
}

?>

<head>

          <meta charset="UTF-8">
          <title>Add faculty</title>
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
           <script src="teacher.js"></script>
           <script src="http://malsup.github.com/jquery.form.js"></script> 
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
  <h4 align="center" class="grey-text">Add Faculty Details</h4>
          <center> <span id="user-availability-status"></span></center>

		<form class="form" action="" method="POST">


      
         <div class="input-field col s6 offset-s3">
           <input id="staff_id" type="text" name="sid" onBlur='checkAvailability()' required>
           <label for="staff_id">Staff ID</label>
         </div>
     

       
          <div class="input-field col s6 offset-s3">
            <input id="first_name" type="text" name="fn" required>
            <label for="first_name">First name</label>
          </div>
        

        
           <div class="input-field col s6 offset-s3">
             <input id="middle_name" type="text" name="mn">
             <label for="middle_name">Middle name</label>
           </div>
        

        
            <div class="input-field col s6 offset-s3">
              <input id="last_name" type="text" name="ln" required>
              <label for="last_name">Last name</label>
            </div>
          

          <div class="row">
             <div class="input-field col s6 offset-s3">
               <input id="designation" type="text" name="desg" required>
               <label for="designation">Designation</label>
             </div>
          </div>


         
             <div class="input-field col s6 offset-s3">
<select name="did">	
				 					<option value="1" disabled selected>Choose your Department</option>
				
 
			<?php echo($options);?>				

			</select>               <label for="dept_id">Department ID</label>
             </div>
          

          
             <div class="input-field col s6 offset-s3">
               <input id="HOD_ID" type="text" name="hid">
               <label for="HOD_ID">HOD ID (if applicable)</label>
             </div>
         

          
             <div class="input-field col s6 offset-s3">
               <input id="passwd" type="password" name="pass" required>
               <label for="passwd">Enter the password</label>
             </div>
          

          
             <div class="input-field col s6 offset-s3">
               <input id="passwd" type="password" name="pass2" required>
               <label for="passwd">Re-enter the password</label>
             </div>
         

         <div class="input-field col s6 offset-s3">
	 <button class="waves-effect waves-light btn blue" name="save"  type="submit" value="Proceed" id="login-button">
          Proceed</button>
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
</div></div>



  </body>
</html>
