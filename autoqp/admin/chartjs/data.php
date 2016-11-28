<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'Question_Paper_Generator');


//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
session_start();

$subject=$_SESSION['sub'];

//query to get data from the table
$query = "SELECT LOD,Count(*) as count FROM Questions where Course_Id= '$subject' GROUP BY LOD";

//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}




//close connection
$mysqli->close();

//now print the data
echo json_encode($data);

