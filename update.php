<?php

$con = mysql_connect("localhost","pics","password");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("Statistics", $con);

$gender = $_POST["gender"];
$age = $_POST["age"];
$siblings = $_POST["siblings"];

$sql = "INSERT INTO Data (gender, age, siblings) VALUES ('$gender', $age, $siblings)";

mysql_query( $sql );

/* Redirect browser */
header("Location: /FSTstat");
/* Make sure that code below does not get executed when we redirect. */
exit;
?>