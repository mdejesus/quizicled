<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1>full quiz</h1>
    <?php
		foreach ($_SESSION['questions'] as $questionid)
			echo $questionid . ", ";
	?>
</body>
</html>