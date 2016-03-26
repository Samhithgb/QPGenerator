<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Select Level of Difficulty</title>
    <link rel="stylesheet" href="style.css">

    
    
    
  </head>
<body>
		<script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
		<script src="lod.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
    <div class="wrapper">
	<div class="container">
		<br><br><br>
		<h1>Select number of questions from each level</h1>
<br>

	<form class="form" id="formlod" method="post" >	
		   
		   	Quiz:
			   <br><br>
	        <input name= "lev1" id="lev1" type="number" placeholder="Level 1 Questions" required>
			<input id="lev2" name="lev2" type="number" placeholder="Level 2 Questions" required>
			<input id="lev3" name="lev3" type="number" placeholder="Level 3 Questions" required>
			<br>
			 Theory:
			 <br><br>
	        <input name= "lev1" id="lev11" type="number" placeholder="Level 1 Questions" required>
			<input id="lev22" name="lev22" type="number" placeholder="Level 2 Questions" required>
			<input id="lev33" name="lev33" type="number" placeholder="Level 3 Questions" required>
			
			<button type="submit" id="sub" name= "save" id="login-button">Proceed</button>
			

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
		