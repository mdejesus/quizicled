<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>Test</title>
</head>
<body>
<?php
/*
 * Created on Dec 12, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
mb_language('uni');
mb_internal_encoding('UTF-8');
 
$mysql_host = "mysql-user-master.stanford.edu";
$mysql_database = "c_cs108_mdejesus";
$mysql_user = "ccs108mdejesus";
$mysql_password = "uapooquu";
$cmd = "";

if (array_key_exists("command", $_POST) && $_POST["command"] != "") {
	$cmd = $_POST["command"];
	echo $cmd . "<br />";	
	$con = connect();
	$result = mysql_query($cmd, $con);
	
	echo "<table border=\"1\"><tr>";
	for($i=0; $i < mysql_num_fields($result); $i++) {
		echo "<th>" . mysql_field_name($result, $i) . "</th>";
	}
	echo "</tr>";
	while($row = mysql_fetch_array($result, MYSQL_NUM ))
	{
		echo "<tr>";
		foreach ($row as $value) {
			echo "<td>" . $value . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
 
function connect() {
	global $mysql_host, $mysql_database, $mysql_user, $mysql_password;
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database,$con);
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci';", $con);
	return $con;
}
 
 
?>
<form name="test" action="accessdb.php" method="post">
<input type="text" name="command" value="<?php echo $cmd; ?>"/>
<input type="submit" />
</form>
</body>
</html>



