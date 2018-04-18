<?php
session_start();
session_unset ();
session_destroy();
if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass']))
{
	setcookie('pseudo');
	setcookie('pass');	
}setcookie('cookie_name');
header('location:index.php');
?>