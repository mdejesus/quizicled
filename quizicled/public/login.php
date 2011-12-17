<?php
	include '../application/database.php';
	include '../application/user.php';
	
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
		$message=login($username, $password);
	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8">
<title>Account Login</title>
</head>

<body>
<h1>Account Login</h1>
	<form name="loginform" method="post">
		username: <input name="username" type="text" /><br />
		password: <input name="password" type="password" /><br />
		<input type="submit" />
	</form>
	<?php
		echo $message;
	?>
	<a href="createaccount.php">Create a new account</a>
    </body>
</html>