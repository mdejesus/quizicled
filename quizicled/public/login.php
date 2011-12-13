<?php
	include '../application/database.php';
	
	$username="";
	$password="";
	$message="";
	
	// parsing form data
	if (key_exists("username", $_POST))
		$username = $_POST["username"];
	if (key_exists("password", $_POST))
		$password = hash("sha1", $_POST["password"], false);

	$message=login($username, $password);
	
	// end execution
	
	/**
	 * 
	 * Logs in a user.
	 * @param string $username cleartext
	 * @param string $password a SHA1 hash of the password
	 * @return void|string
	 */
	function login(string $username, string $password) {
		
		$badloginmsg = "Incorrect username or password.";
		
		if ($username == "" || $password == "")
			return;
		
		// query database
		$con = connect();
		$result = mysql_query("SELECT * FROM user WHERE username LIKE '" . $username . "';", $con);
		if ($result == false) {
			return "error connecting to server.";
		}

		// 
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		if ($row != false) {
			if ($password == $row["password"]) {
				// Login successful
				return "Welcome!";			
			}
		}
		return $badloginmsg;
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=MS932">
<title>Insert title here</title>
</head>

<body>
	<form name="loginform" method="post">
		username: <input name="username" type="text" /><br />
		password: <input name="password" type="password" /><br />
		<input type="submit" />
	</form>
	<?php
		echo $message;
	?>
    </body>
</html>