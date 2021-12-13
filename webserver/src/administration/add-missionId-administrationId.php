<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
      
			$mission_id = $_POST['mission_id'];
			$administration_id = $_POST['administration'];

      $errors = array();
			
			$sql = "INSERT INTO missions_administrations (mission_id, administration_id) VALUES (:mission_id, :administration_id)";
      
		  $stid = oci_parse($db, $sql);

      $inputs = array(':mission_id' => $mission_id,
                      ':administration_id' => $administration_id);

      foreach ($inputs as $key => $val) {
          oci_bind_by_name($stid, $key, $inputs[$key]);
      }

			if(!oci_execute($stid,OCI_DEFAULT)) {
				$errors[] = oci_error($stid);
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
