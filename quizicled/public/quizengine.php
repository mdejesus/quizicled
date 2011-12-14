<?php

include '../application/database.php';
include '../application/quiz.php';
include '../application/questionbank.php';

/*
 * Variables in the session
 * quizid
 * feedback
 * questions
 * questionsindex
 * answers
 */
session_start();

// default values
$id = 0;
$name = "Quiz Name";
$random = false;
$multipage = false;
$feedback = false;
$description = "Quiz Description";
$creator = 0;

if (array_key_exists("id", $_POST)) {
	$id = $_POST["id"];
	$_SESSION['quizid']=$id; // store quizid in the session
	$quiz = getQuiz($id);
	if ($quiz != false) {
		// parse parameters
		$random=$quiz["random"] ? true : false;
		$multipage=$quiz["multipage"] ? true : false;
		$feedback=$quiz["feedback"] ? true : false;
		$_SESSION['feedback']=$feedback; // store feedback flag in the session
	}
}

// TODO assemble question order
$_SESSION['questions']=getQuestions($id);
$_SESSION['questionsindex']=0;

$_SESSION['answers']=array(); // create new array

if ($multipage)
	header( 'Location: multipagequiz.php' );
else
	header( 'Location: fullquiz.php' );

?>