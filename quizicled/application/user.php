<?php

/**
*
* Logs in a user.
* Assumes ../index.php exists.
* @param string $username cleartext
* @param string $password a SHA1 hash of the password
* @return void|string
*/
function login($username, $password) {
	global $con;
	$badloginmsg = "Incorrect username or password.";

	// query database
	$result = mysql_query("SELECT * FROM user WHERE username LIKE '" . $username . "'", $con);
	if ($result == false) {
		return "error connecting to server.";
	}

	// check results for password match
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	if ($row != false) {
		if ($password == $row["password"]) {
			// Login successful
			setcookie("userid", $row["id"], time()+3600);
			header( 'Location: ..' );
		}
	}
	return $badloginmsg;
}

function getUsername($userid) {
	global $con;
	$result = mysql_query("SELECT * FROM user WHERE username LIKE '" . $username . "'", $con);
	if ($result == false)
		return "error connecting to server.";
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	if ($row != false)
		return $row["username"];
	return "Bad userid";
}
?>