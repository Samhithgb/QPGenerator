
<?php
session_start();

 if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../welcome.php'</script>";
      }  
?>      	
<html >
  <head>
    <meta charset="UTF-8">
    <title>Question Paper Generation</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>



  <body>
	
      
 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
        
        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator :Faculty Dashboard</a></div>
<div col="col s4">
         <a href="#" class="offset-s5">Hi, <?php echo $_SESSION["name"]; ?>
       </a>
       </div>
   </div>
   
  
    
  </nav>
        
 <div class="row blue">
    <div class="col s8 blue">
      <ul class="tabs white">
        <li class="tab col s2 blue  hoverable"><a class="active white-text" href="#test1">Home
</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test2">Developers</a></li>
        <li class="tab col s2 blue" ><a class="active white-text" href="#test3">Guidelines</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test4">About Us</a></li>
        <div class="indicator white" style="z-index:1" </div>

      </ul>
    </div>
    </div>
    
    




    <div class="container">	<br>	
	    <form class="form" method="post" action="ciedetails.php" class="col s12">
	    Choose units in examination syllabus
<br>

            <br>
            <p>
           <input  id="uid1" name="unit_1" type="checkbox" value="yes"  />
           <label for="uid1">Unit 1</label>
         </p>
         <p>
           <input   id="uid2" name="unit_2" type="checkbox" value="yes" />
           <label for="uid2">Unit 2</label>
         </p>
           <p>
           <input   id="uid3" name="unit_3" type="checkbox" value="yes" />
           <label for="uid3">Unit 3</label>
         </p>
  <p>
           <input   id="uid4" name="unit_4" type="checkbox" value="yes" />
           <label for="uid4">Unit 4</label>
         </p>
            <p>
           <input  id="uid5" name="unit_5" type="checkbox" value="yes" />
           <label for="uid5">Unit 5</label>
         </p>

          

           

            <br>
            
            Theory Questions : Enter number of questions from each unit (Out of total 5). Enter 0 if unit is not included.<br><br>
            <div class="row">
                      <div class="input-field col s5">
             <input  id="tuid1" name="tunit_1" type="number" placeholder="Unit 1" required >
                      </div>
                                       <div class="input-field col s5">     
            <input id="tuid2" name="tunit_2" type="number" placeholder=" Unit 2" required>
            </div>
            </div>
            
            <div class="row">
                      <div class="input-field col s5">
            <input id="tuid3" name="tunit_3" type="number" placeholder="Unit 3"required >
           </div>
                                       <div class="input-field col s5">     
            <input id="tuid4" name="tunit_4" type="number" placeholder="Unit 4" required >
             </div>
            </div>
               <div class="row">
                      <div class="input-field col s5">
            <input id="tuid5" name="tunit_5" type="number" placeholder=" Unit 5" required>
         </div>
            </div>
            
            <center>
 <button class="btn waves-effect waves-light blue" type="submit" name= "save" id="sub">Proceed
    		<i class="material-icons right">send</i>
 			 </button></center>
            

		</form>
	</div>


  <div class="fixed-action-btn horizontal" style=" 45px; right: 24px;">
    <a class="btn-floating btn-large blue hoverable" href="facultydash.php">
      <i class="material-icons right">send</i>
    </a>
    </div>


    
    
    
  </body>
</html>
