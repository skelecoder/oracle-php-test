<?php include_once 'checking-admin.php'; ?>
<?php include_once 'send.php'; ?>
<?php
		include 'connect_db.php';
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			
			$nom = $_POST['nom'];
			$email = $_POST['email'];
			
			$response_array = array();
			
			$has_error = 0;
			$valid_array = array();			
			
			$exists = emailExists($email);
			if(empty($email)){
				$valid_array['email'] = 'null';
				$has_error = 1;
			}else if($exists == 1){
				$valid_array['email'] = 'repeated';
				$has_error = 1;
			}else{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				// Return Error - Invalid Email
					$has_error = 1;
					$valid_array['email'] = 'invalid';
				}else{
						// Return Success - Valid Email
					$valid_array['email'] = 'good';
				}
			}
			
			$errors = array();
			
			if($has_error == 1) {
				$response_array['status'] = 'error';
				$response_array['array'] = $valid_array;
				$response_array['email'] = $email;

				header('Content-type: application/json');
				echo json_encode($response_array);

				exit();
			} else {
				$opciones = [
					'cost' => 11,
				];
				
				//$generated_passwrod = random_password();
        $generated_passwrod = '123421';
				
				$password = password_hash($generated_passwrod, PASSWORD_BCRYPT, $opciones);

				$sql = "INSERT INTO users (nom, username, email, password, type) VALUES (:nom, :username, :email, :password, 'PDM')";
      
        $stid = oci_parse($db, $sql);

        $inputs = array(':nom' => $nom,
                        ':username' => $email,
                        ':email' => $email,
                        ':password' => $password);

        foreach ($inputs as $key => $val) {
            oci_bind_by_name($stid, $key, $inputs[$key]);
        }

        if(!oci_execute($stid,OCI_DEFAULT)) {
          $errors[] = oci_error($stid);
        }
			}

			if(count($errors) === 0) {
				oci_commit($db);
				$response_array['status'] = 'success';
				
				$sujet ='Activation du compte de la plateforme de suivi des recommandations';
				$message ='Mr./Mme. '.$nom.'،<br/><br/>';
				$message .= 'Votre compte est activé sur la plateforme de suivi des recommandations <a href="http://localhost:8060/administration">Lien</a><br><br>';
				$message .= "Votre email est: {$email} <br/>";
				$message .= "Votre mot de passe est: <b>{$generated_passwrod}</b> <br/><br/>";
				$message .= '------------- <br><strong>Nos salutations</strong>';

				send_email($email, $nom_ar, $sujet, $message, 'no-reply@courdescomptes.govright.tech', 'Cour des comptes');
			} else {
				oci_rollback($db);
				$response_array['status'] = 'error';
				$response_array['errors'] = $errors;
			}

			oci_close($db);

			header('Content-type: application/json');
			echo json_encode($response_array);
	}
?>
