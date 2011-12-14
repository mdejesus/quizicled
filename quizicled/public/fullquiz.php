<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php 

include '../application/database.php';
include '../application/question.php';

session_start(); 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Quizicled - <?php echo $_SESSION["quizname"]; ?></title>
</head>
<body>
<h1><?php echo $_SESSION["quizname"]; ?></h1>
<form name="quizform" action="scorequiz.php" method="post"><ol>
    <?php
		foreach ($_SESSION['questions'] as $questionid) {
			echo "<li>";
			askQuestion($questionid);
			echo "<br />";
		}			
	?>
	<input type="submit" />
</ol></form>
</body>
</html>