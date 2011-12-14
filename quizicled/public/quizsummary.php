<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
    <?php
    
    include '../application/database.php';   
    include '../application/quizbank.php'; 
    
    // default values
    $id = 0;
    $name = "Quiz Name";
    $description = "Quiz Description";
    $creator = 0;

	if (array_key_exists("id", $_GET)) {
		$id = $_GET["id"];
		$quiz = getQuiz($id);
		if ($quiz != false) {
			// parse parameters
			$name=$quiz["name"];
			$description=$quiz["description"];
		}
	}    

	?>
	
	<h1><?php echo $name; ?></h1>
	<p><?php echo $description; ?></p>
	<form name="quizsummaryform" action="quizengine.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>" />
	<input type="submit" value="Take Quiz Now!" />
	</form>
</body>
</html>