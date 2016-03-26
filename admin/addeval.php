<html>
	<?php 
session_start();

include("connect.php");
 if(isset($_REQUEST['save']))
{
    $date=($_REQUEST['eval_date']);
    $type=$_REQUEST['eval_type'];
	$id=uniqid();
	$added=$_SESSION['username'];
    $query="insert into Evaluation(`Eval_Start_Date`,`Eval_Type`,`Eval_ID`,`Added_By`)  
    VALUES('$date','$type','$id','$added')";   
   
    $res=mysql_query($query);
   	if($res){
    echo "<script>alert('Addition of evaluation successful!')</script>";
    echo "<script>self.location='admin/admindash.php'</script>";
	   }
	   
	else echo "<script>alert('Error! Please try again')</script>";

}

?>

<head>
    <meta charset="UTF-8">
    <title>Add Evaluation</title>
    
     
    
        <link rel="stylesheet" href="style.css">

    
    
    
  </head>

  <body>
	<script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
		<script src="course.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js">
$("#date").datepicker({ dateFormat: 'yy-dd-mm' });
</script>
    <div class="wrapper" id="wr">
<div class="container">
		<br><br><br>
		<h1>Add a new evaluation to Database</h1>
<br>
	<form id="form1" method="post">
			<input name= "eval_date" id="date" placeholder="Start date(YYYY-MM-DD)" required>
			<br>
			Select the type of evaluation:<br><br>
			<select id="eval_type" name="eval_type" required>
				<option value="CIE">Continous Internal Evaluation</option>
				<option value="SEE">Semester End Examination</option>
			</select>
				<button type="submit" id="sub" name= "save" id="save-button">Add Evaluation</button>
			
			</form>

	
	
	
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 

    
    
    
  </body>
</html>