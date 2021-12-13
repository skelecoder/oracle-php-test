<?php
session_start();

if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > (60*60*2)) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['created'] = time();  // update creation time
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > (60*60*2))) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
		header('location: ../');
  	exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

/*
if(!isset($_SESSION['token'])){
	$_SESSION['token']=md5(rand().time());
	header("location: ./projets.php?token=".$_SESSION['token']);
}
if(!isset($_GET['token']) OR $_GET['token']!=$_SESSION['token']){
	header('location: ./projets.php?token='.$_SESSION['token']);
	exit;
}
*/

if(!isset($_SESSION['login']) or ($_SESSION['type']!='PF')){
	session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
	header('location: ./');
	exit();
}else{
	include_once 'functions.php';
}
?>