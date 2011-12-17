<?php
mb_language('uni');
mb_internal_encoding('UTF-8');

// global variable holding connection to mysql database
$con=0;
connect(); // force connection to the database

function connect() {
	global $con;
	
	// database login parameters
	$mysql_host = "localhost";
	$mysql_database = "quizicled";
	$mysql_user = "mdejesus";
	$mysql_password = "uapooquu";
	
	// connect to the server
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	// change to the right database
	mysql_select_db($mysql_database,$con);
	// enable UTF8 support
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'", $con);
	return;
}

?>