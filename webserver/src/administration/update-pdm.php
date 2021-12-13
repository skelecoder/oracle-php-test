<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];

			$nom = $_POST['nom'];
			$email = $_POST['email'];

			$errors = array();
			
			$sql = "UPDATE users SET nom=:nom, email=:email WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  $inputs = array(':id' => $id, 
                      ':nom' => $nom,
                      ':email' => $email);

      foreach ($inputs as $key => $val) {
          oci_bind_by_name($stid, $key, $inputs[$key]);
      }

			if(!oci_execute($stid,OCI_DEFAULT)) {
				$errors[] = $stmt->error;
			}

			$response_array = array();

			if(count($errors) === 0) {
				oci_commit($db);
				$response_array['status'] = 'success';
			} else {
				oci_rollback($db);
				$response_array['status'] = 'error';
				$response_array['errors'] = $errors;
			}

			oci_close($db);
			
			$json = array(
					'response' => $response_array
    		);

			header('Content-type: application/json');
			echo json_encode($json);
	}
?>
