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
<script type="text/javascript">
function show_question() {
	// default: don't show any elements
	document.getElementById("qrform").style.display = "none";
	document.getElementById("fitbform").style.display = "none";
	document.getElementById("irform").style.display = "none";
	document.getElementById("mcform").style.display = "none";

	// parse form and show specific question form
	if (document.getElementById("qr").checked)
		document.getElementById("qrform").style.display = "inline";
	if (document.getElementById("fitb").checked)
		document.getElementById("fitbform").style.display = "inline";
	if (document.getElementById("ir").checked)
		document.getElementById("irform").style.display = "inline";
	if (document.getElementById("mc").checked)
		document.getElementById("mcform").style.display = "inline";

	// show add question button
	// assumes a choice was made to invoke this function
	document.forms["addform"]["newquestion"].style.display = "inline";
}
</script>
<form name="addform" method="post">
Please select a question type.<br />
<input id="qr" name="type" type="radio" value="qr" onclick="show_question()" />Question-Response<br />
<input id="fitb" name="type" type="radio" value="fitb" onclick="show_question()" />Fill-in-the-Blank<br />
<input id="ir" name="type" type="radio" value="ir" onclick="show_question()" />Image-Response<br />
<input id="mc" name="type" type="radio" value="mc" onclick="show_question()" />Multiple Choice<br />

<div id="qrform" style="display: none">
<h2>Question-Response</h2>
Question: <input name="qrquestion" type="text" /><br />
Answer: <input name="qranswer" type="text" /><br />
</div>

<div id="fitbform" style="display: none">
<h2>Fill-in-the-Blank</h2>
Question: <input name="fitbquestion1" type="text" /> _____ <input name="fitbquestion2" type="text" /><br />
Answer: <input name="fitbanswer" type="text" /><br />
</div>

<div id="irform" style="display: none">
<h2>Image-Response</h2>
Question: <input name="irquestion" type="text" /><br />
Image URL: <input name="irimage" type="text" /> Note: We do not host any images on this website.<br />
Answer: <input name="iranswer" type="text" /><br />
</div>

<div id="mcform" style="display: none">
<h2>Question-Response</h2>
Question: <input name="mcquestion" type="text" /><br />
Choices: Please enter the answer as the first choice. You may leave choices blank to limit the number of choices.<br /><ol>
<li><input name="mcchoice1" type="text" /><br />
<li><input name="mcchoice2" type="text" /><br />
<li><input name="mcchoice3" type="text" /><br />
<li><input name="mcchoice4" type="text" /><br />
<li><input name="mcchoice5" type="text" /><br />
</ol></div>

<input name="newquestion" type="submit" value="Add a New Question" style="display: none" />
    <?php
    if ($show_finish_button)
    	echo '<input name="finish" type="submit" value="Don\'t add a New Question and Finish Making Quiz" />';
	?>
</form>
</body>
</html>