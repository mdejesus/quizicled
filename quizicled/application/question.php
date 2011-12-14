<?php

function askQuestion($id) {
	global $con;
	$result = mysql_query("select * from question where id = ". $id, $con);
	if ($result == false)
		return "cannot connect to server.";
	$row = mysql_fetch_assoc($result);
	$type = intval($row["type"]);
	switch($type) {
		case 0:
			break;
		case 1:
			askFillInTheBlank($id);
			break;
		case 2:
			break;
		case 3:
			break;
		default:
			return "Unknown question type.";
	}
}

function checkAnswer($id, $answer) {
	global $con;
	$result = mysql_query("select * from question where id = ". $id, $con);
	if ($result == false)
	return "cannot connect to server.";
	$row = mysql_fetch_assoc($result);
	$type = intval($row["type"]);
	switch($type) {
		case 0:
			break;
		case 1:
			return checkFillInTheBlank($id, $answer);
			break;
		case 2:
			break;
		case 3:
			break;
		default:
			return "Unknown question type.";
	}
}

/**
 * 
 * Checks if an answer is one of the accepted answers in the database.
 * @param $id question id
 * @param $answer
 * @return string|boolean
 */
function checkAnswerBank($id, $answer) {
	global $con;
	$result = mysql_query("select * from answer where id=" . $id . " and answer='" . $answer . "'", $con);
	if ($result == false)
		return "cannot connect to server.";
	if (mysql_fetch_assoc($result) == false)
		return false;
	else
		return true;
}

// fill in the blank type

function printFillInTheBlank($id) {
	global $con;
	$result = mysql_query("select * from fill_in_the_blank where id=" . $id, $con);
	if ($result == false)
	return "cannot connect to server.";
	$row = mysql_fetch_assoc($result);
	echo $row["question1"] . " _____ " . $row["question2"] . "<br />";
}

function askFillInTheBlank($id) {
	printFillInTheBlank($id);
	echo '<input name="' . $id . '" type="text" /><br />';
}

function checkFillInTheBlank($id, $answer) {
	printFillInTheBlank($id);
	echo '<input type="text" value="' . $answer . '"/><br />';
	if (checkAnswerBank($id, $answer)) {
		echo "correct! <br />";
		return true;
	}
	else {
		echo "wrong! <br />";
		return false;
	}
	
}

?>