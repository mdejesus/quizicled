<?php
$home = "\quizicled";

include(realpath(dirname(__FILE__) . '\..\application\user.php'));
?>
<a href="<?php echo $home?>">Home</a><br/>
<?php
setcookie("test", "yay", time()+3600); 
foreach (array_keys($_COOKIE) as $key )
	echo $key . "<br />";
// TODO convert to isset()
if (array_key_exists("userid", $_COOKIE)) {
	print "Hello " . getUsername($_COOKIE["userid"]) . ". ";
	print '<a href="' . $home . '/public/logout.php' . '">Logout</a>';
}
else {
	print '<a href="' . $home . '/public/login.php' . '">Login</a>';
}

?>