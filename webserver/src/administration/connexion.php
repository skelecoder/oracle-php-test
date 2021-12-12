<?php
	// Require https
	/*if ($_SERVER['HTTPS'] != "on") {
			$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			header("Location: $url");
			exit;
	}*/
include_once 'functions.php'; 
 $loginOK = false;  // cf Astuce

if ( isset($_POST) && (!empty($_POST['username'])) && (!empty($_POST['password'])) ) {
  extract($_POST);  
  $user = oci_fetch_array(getUserByUsername($_POST['username']), OCI_ASSOC+OCI_RETURN_NULLS); 
  if (count($user) > 0) {
     $data = $user;
    if (password_verify($_POST['password'], $data['PASSWORD'])) {
      $loginOK = true;
    }
  }
}

if ($loginOK) {
  session_start();
  $_SESSION['id'] = $data['ID'];
  $_SESSION['administration_id'] = $data['ADMINISTRATION_ID'];
  $_SESSION['login'] = $data['USERNAME'];
  $_SESSION['type'] = $data['TYPE'];
  $_SESSION['nom'] = $data['NOM'];
  $_SESSION['token']=md5(rand().time());
	$_SESSION['created'] = time();
	$_SESSION['LAST_ACTIVITY'] = time();
	$url = '';
  if (isset($_SESSION['login']) && isset($_SESSION['type'])) {
		if($_SESSION['type'] == 'ADMIN') {
			$url = './projets-engagements.php?published=1';
		}else if($_SESSION['type'] == 'PDM') {
			$url = './missions.php';	
		}else if($_SESSION['type'] == 'PF') {
			$url = './missions-pf.php';	
		}
	}
	$res = array(
		'status' => 'success',
		'url' => $url
	);

	header('Content-type: application/json');
	echo json_encode($res);
}
else {
	$res = array(
		'status' => 'fail'
	);
	
	header('Content-type: application/json');
	echo json_encode($res);
}
?>