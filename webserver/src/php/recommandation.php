<?php
	date_default_timezone_set('Etc/UTC');
	@ini_set('display_errors', 0);
	@ini_set('track_errors', 0);

	require('connect.php');


/** ******************************** **
 *	@recommandation FORM
 ** ******************************** **/

	// Check Action First!
	if(isset($_POST['action']) && $_POST['action'] == 'recommandation_send') {
		$array 		= $required = array();

		// catch post data
		$post_data 	= isset($_POST['recommandation']) ? $_POST['recommandation'] : null;
		$is_ajax 	= (isset($_POST['is_ajax']) && $_POST['is_ajax'] == 'true') ? true : false;

		// check post data
		if($post_data === null) {
			if($is_ajax === false) {
				_redirect('#alert_mandatory');
			} else {
				die('_mandatory_');
			}
		}

		// EXTRACT DATA FROM POST
		// foreach($post_data as $key=>$value) {

		// }

		// Check for required! Redirect if something found empty!
		foreach($required as $req) {
			if(strlen(trim($post_data[$req]['required'])) < 2)  {
				if($is_ajax === false) {
					_redirect('#alert_mandatory');
					exit;
				} else {
					die('_mandatory_');
				}
			}
		}

		$stmt = "insert into recommandations (titre,start_date,end_date,escompte,obtenu,observations,ressources,responsable,actions) values ('".$post_data['titre'] ."',TO_DATE( '".$post_data['start_date']."', 'DD-MM-YYYY' ),TO_DATE( '".$post_data['end_date']."', 'DD-MM-YYYY' ),'".$post_data['escompte']."','".$post_data['obtenu']."','".$post_data['observations']."','".$post_data['ressources']."','".$post_data['responsable']."','".$post_data['actions']."' )";
		$s = oci_parse($conn, $stmt);

		$r = oci_execute($s);
		header("Location: asd")
		exit;
	}


	// function do_insert($conn) {
	// 	$stmt = "insert into recommandations values (".$post_data['titre'] .",TO_DATE( '".$post_data['start_date']."', 'DD-MM-YYYY' ),TO_DATE( '".$post_data['end_date']."', 'DD-MM-YYYY' ),".$post_data['escompte'].",".$post_data['obtenu'].",".$post_data['observations'].",".$post_data['ressources'].",".$post_data['responsable'].",".$post_data['actions']." )";
	// 	$s = oci_parse($conn, $stmt);
	// 	$r = oci_execute($s);  // Don't commit
	// }


	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);

		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

/** ******************************** **
 *	@REDIRECT
		#alert_success 		= enregistré
		#alert_failed		= non enregistré - internal server error (404 error or SMTP problem)
		#alert_mandatory	= non enregistré - champs requis
 ** ******************************** **/
	function _redirect($hash) {
		
		$HTTP_REFERER = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

		if($HTTP_REFERER === null)
			die("Invalid Referer. Output Message: {$hash}");

		header("Location: {$HTTP_REFERER}{$hash}");
		exit;
	}

?>