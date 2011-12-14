<?php

/**
 * 
 * Given a quiz id, returns an array of question ids for the quiz.
 * @param int $quizid
 * @return multitype:
 */
function getQuestions($quizid) {
	global $con;
	$result = mysql_query("select id from question where quizid = " . $quizid, $con);
	$questions = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		array_push($questions, $row["id"]);
	}
	return $questions;
}

?>