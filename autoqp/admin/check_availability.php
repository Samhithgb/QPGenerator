<?php
include("connect.php");
if(!empty($_POST["username"])) {
$result = mysql_query("SELECT count(*) FROM Teacher WHERE Teacher_ID='" . $_POST["username"] . "'");
$row = mysql_fetch_row($result);
$user_count = $row[0];
if($user_count>0) echo "<span style='color:red'> Username Not Available!</span>";
else echo "<span style='color:green'> Username Available.</span>";
}

?>