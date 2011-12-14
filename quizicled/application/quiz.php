<?php

// stubbed class, but I'm not sure how the backend should look
class quiz
{
	private $id=0;
	public function getId() {
		return $id;
	}
}

function getQuiz($id) {
	global $con;
	$result = mysql_query("SELECT * FROM quiz WHERE id = " . $id);
	if ($result == false)
		return "cannot connect to server.";
	return mysql_fetch_array($result, MYSQL_ASSOC);
}

?>