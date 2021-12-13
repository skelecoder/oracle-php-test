<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {

			$id = $_POST['mission_id_administration_id'];
      $principal = $_POST['principal'];

			$errors = array();
			
			$sql = "UPDATE missions_administrations SET principal=:principal WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  $inputs = array(':id' => $id, 
                      ':principal' => $principal);

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
