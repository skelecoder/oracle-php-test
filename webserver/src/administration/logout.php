<?php
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['login']);
	unset($_SESSION['type']);
	unset($_SESSION['nom']);
	unset($_SESSION['token']);
	unset($_SESSION['created']);
	unset($_SESSION['LAST_ACTIVITY']);
  session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
	header('location: ./');
	exit();
?>
