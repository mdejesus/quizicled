<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php

session_start();

include '../application/database.php';
include '../application/question.php';

// TODO score quiz


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Quiz Results</title>
</head>
<body>
<h1>Quiz Results</h1>
<ol>
    <?php
    $correct = 0;
		foreach ($_SESSION['questions'] as $questionid) {
			echo "<li>";
			$answer = $_POST[$questionid];
			if(checkAnswer($questionid, $answer))
				$correct++;
			echo "<br />";
		}		
		
	?>
	</ol>
	<?php
	$percentcorrect = $correct / count($_SESSION['questions']) * 100;
	echo "You got " . $percentcorrect . "% correct!<br />";
	?>
	<a href="quizsummary.php?id=<?php echo $_SESSION["quizid"]; ?>">Back to quiz summary</a>
</body>
</html>