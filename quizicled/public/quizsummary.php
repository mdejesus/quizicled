<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
    <?php
    
    include '../application/database.php';    
    $con = connect();
    
    // default values
    $id = 0;
    $name = "Quiz Name";
    $random = false;
    $multipage = false;
    $feedback = false;
    $description = "Quiz Description";
    $creator = 0;

	if (array_key_exists("id", $_GET)) {
		$id = $_GET["id"];
		$quiz = getQuiz($id, $con);
		if ($quiz != false) {
			// parse parameters
			$name=$quiz["name"];
			$description=$quiz["description"];
		}
	}    

	// end execution part
	function getQuiz($id, $con) {
		$result = mysql_query("SELECT * FROM quiz WHERE id = " . $id);
		if ($result == false)
			return "cannot connect to server.";
		return mysql_fetch_array($result, MYSQL_ASSOC);
	}
	?>
	
	<h1><?php echo $name; ?></h1>
	<p><?php echo $description; ?></p>
	<form name="quizsummaryform" action="takefullquiz.jsp" method="post">
	<input name="quizid" type="hidden" value="<?php echo $id; ?>" />
	<input type="submit" value="Take Quiz Now!" />
	</form>
</body>
</html>