<html>
<?php 
session_start();
include("connect.php");
if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$options='';
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		$SID=$_SESSION['username'];
		$QID=uniqid();
		$co = $filesop[0];
		$question = $filesop[1];
		$desc=$filesop[2];
		$lod=$filesop[3];
		$U_No = $filesop[4];
		$marks = $filesop[5];
		$CID=$_SESSION['subject'];
		$sql = mysql_query("INSERT INTO Questions VALUES ('$SID','$QID','$marks','$co','$question','$desc','$lod','$U_No','$CID')");
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
    <title>Upload .csv</title>
    
     
    
        <link rel="stylesheet" href="style.css">

    
    
    
  </head>
  <h1>Upload Questions from .csv file </h1>
  <body>
	    <div class="wrapper" id="wr">

	<div class="container">	
		
	Please make sure the file is a .csv file encoded in UTF-8 and English(US)
	Columns : CO(in digits),Question,Remarks,Level of Difficulty,Unit_No (IN THE SAME ORDER).
<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <button type="submit" name="submit" value="Submit">Upload</button>
		<button type="button" onClick="location.href='addquestions.php'">Go Back</input>
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