<?php

session_start();
$quiz = array();

// default values
$quiz["name"] = "New Quiz";
$quiz["description"] = "Quiz Description";
$quiz["category"] = "Language";
$quiz["random"] = false;
$quiz["multipage"] = false;
$quiz["feedback"] = false;

// form submitted flag
$submitted = false;

// parse form data
if (array_key_exists("name", $_POST)) {
	$quiz["name"] = $_POST["name"];
	$submitted = true;
}
if (array_key_exists("description", $_POST))
	$quiz["description"] = $_POST["description"];
if (array_key_exists("category", $_POST))
	$quiz["category"] = $_POST["category"];
if (array_key_exists("random", $_POST))
	$quiz["random"] = true;
if (array_key_exists("multipage", $_POST))
	$quiz["multipage"] = true;
if (array_key_exists("feedback", $_POST))
	$quiz["feedback"] = true;

$_SESSION["quiz"] = $quiz;

if ($submitted)
	header('Location: createquestion.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create a Quiz</title>
</head>
<body>
<?php include 'header.php'?>
<h1>Create a Quiz</h1>
<form name="createquizform" method="post">
Quiz name: <input name="name" type="text" /><br />
Quiz description: <textarea name="description" rows="5" cols="40"></textarea><br />
Category: <select name="category">
<option value="Language">Language</option>
<option value="History">Geography</option>
<option value="Entertainment">Entertainment</option>
<option value="Science">Science</option>
<option value="History">History</option>
<option value="Literature">Literature</option>
<option value="Sports">Sports</option>
<option value="Movies">Movies</option>
<option value="Television">Television</option>
<option value="Music">Music</option>
<option value="Gaming">Gaming</option>
<option value="Miscellaneous">Miscellaneous</option>
</select>
Tags: <input name="tags" type="text" /><br />
Quiz options:<br />
<input name="random" type="checkbox" />Random<br />
<input name="multipage" type="checkbox" />Multipage<br />
<input name="feedback" type="checkbox" />Immediate Correction<br />
<input type="submit" />
</form>
</body>
</html>