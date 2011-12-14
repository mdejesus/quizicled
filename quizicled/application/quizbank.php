<?php

/**
 * 
 * Get the quiz metadata.
 * @param $id quiz id
 * @return string|multitype returns an array if the query is successful, otherwise returns an error message.
 */
function getQuiz($id) {
	global $con;
	$result = mysql_query("SELECT * FROM quiz WHERE id = " . $id);
	if ($result == false)
	return "cannot connect to server.";
	return mysql_fetch_array($result, MYSQL_ASSOC);
}

// just a stubbed class, I'm not sure how the backend should be designed
class QuizBank {
	public function getQuiz(int $id) {
		return null;
	}
}



?>