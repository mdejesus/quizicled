<?php
mb_language('uni');
mb_internal_encoding('UTF-8');

function connect() {
	$mysql_host = "mysql-user-master.stanford.edu";
	$mysql_database = "c_cs108_mdejesus";
	$mysql_user = "ccs108mdejesus";
	$mysql_password = "uapooquu";
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database,$con);
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'", $con);
	return $con;
}

?>