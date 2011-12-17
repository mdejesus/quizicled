<?php

include '../application/database.php';

$username="";
$password="";
$message="";

// parsing form data
if (key_exists("username", $_POST))
$username = $_POST["username"];
if (key_exists("password", $_POST))
$password = $_POST["password"];

if ($username != "" || $password != "") {
	$password = hash("sha1", $_POST["password"], false);
	if (createaccount($username, $password) == true) {
		// TODO set login cookie
		header( 'Location: index.php' );
	}
	else {
		$message="Username is taken.";
	}
}

/**
 * 
 * Creates a user account
 * @param string $username account user name
 * @param string $password hash of the password
 * @return true if user account created, false if already exists
 */
function createaccount($username, $password) {
	global $con;
	$query = "INSERT INTO user values (0, '" . $username . "','" . $password . "', CURDATE())";
	return mysql_query($query, $con);
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create Account</title>
</head>
<body>
	<h1>Create an Account</h1>
    <form name="createform" method="post">
		username: <input name="username" type="text" /><br />
		password: <input name="password" type="password" /><br />
		<input type="submit" />
	</form>
	<?php
		echo $message;
	?>
	</body>
</html>
