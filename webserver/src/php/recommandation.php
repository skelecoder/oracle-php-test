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
		$email_body = null;
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
		file_put_contents('php://stderr', print_r($post_data, TRUE));

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



		// Visitor IP:
		$ip = ip();


		// DATE
		$date 		 = date('l, d F Y , H:i:s');
		$email_body .= "{$date} <br>";
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

 /** ********************************** 
 @VISITOR ip
/** ******************************* **/
	function ip() {
		if     (getenv('HTTP_CLIENT_IP'))       { $ip = getenv('HTTP_CLIENT_IP');       } 
		elseif (getenv('HTTP_X_FORWARDED_FOR')) { $ip = getenv('HTTP_X_FORWARDED_FOR'); } 
		elseif (getenv('HTTP_X_FORWARDED'))     { $ip = getenv('HTTP_X_FORWARDED');     } 
		elseif (getenv('HTTP_FORWARDED_FOR'))   { $ip = getenv('HTTP_FORWARDED_FOR');   } 
		elseif (getenv('HTTP_FORWARDED'))       { $ip = getenv('HTTP_FORWARDED');       } 
										   else { $ip = $_SERVER['REMOTE_ADDR'];        } 
		return $ip;
	}
?>