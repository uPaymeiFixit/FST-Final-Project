<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
	
$con = mysql_connect("localhost","pics","password");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("Statistics", $con);

$sql = "SELECT * FROM Data";
$result = mysql_query( $sql );

while($row = mysql_fetch_array($result))
{
	if ( $row['gender'] == 'male' )
		$male++;
	else
		$female++;
	$gender .= "'" . $row['gender'] . "',";
	$age .= "'" . $row['age'] . "',";
	$siblings .= "'" . $row['siblings'] . "',";
}

$genPie = "[['Male',$male],['Female',$female]];";
$gender .= "'DEL'";
$age .= "'DEL'";
$siblings .= "'DEL'";
?>
<html>
	<head>
		<title>FST someting</title>
	</head>
	<script type="text/javascript">
	<?php echo "genPie = $genPie
				gender = [$gender];
				age = [$age];
				siblings = [$siblings];
				gender.pop();
				age.pop();
				siblings.pop();" ?>
	</script>
	<body>
		<form action="update.php" method="post">
			Male<input type="radio" name="gender" value="male"><br>
			Female<input type="radio" name="gender" value="female"><br>
			Age<input type="number" name="age"><br>
			Siblings<input type="number" name="siblings"><br>
			<input type="submit" value="submit"><br>
		</form>
	</body>
</html>