<?php 

session_start();

// handle the new question form action
if (array_key_exists("newquestion", $_POST)) {
	if(array_key_exists("quiz", $_SESSION)) {
		// TODO mysql query to add quiz
		unset($_SESSION["quiz"]);
	}
	
	// TODO mysql query to add question
}

// handle the finish making quiz
if (array_key_exists("finish", $_POST)) {
	// TODO redirect to specific quiz summary page
	header('Location: quizsummary.php');
}

// if quiz exists in session, then quiz not created yet
// do not show finish button until quiz created
$show_finish_button = true;
if(array_key_exists("quiz", $_SESSION)) {
	$quiz = $_SESSION["quiz"];
	$show_finish_button = false;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add a Question</title>
</head>
<body>
<?php include 'header.php'; ?>
<h1>Add a Question</h1>
<form name="addquestionform" method="post">
<input name="type" type="radio" value="qr" />Question-Response<br />
<input name="type" type="radio" value="fitb" />Fill-in-the-Blank<br />
<input name="type" type="radio" value="ir" />Image-Response<br />
<input name="type" type="radio" value="mc" />Multiple Choice<br />
<input name="newquestion" type="submit" value="Add a New Question" />
    <?php
    if ($show_finish_button)
    	echo '<input name="finish" type="submit" value="Don\'t add a New Question and Finish Making Quiz" />';
	?>
</form>
</body>
</html>