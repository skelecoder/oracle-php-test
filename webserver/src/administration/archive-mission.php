<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];

			$errors = array();
			
			$sql = "UPDATE missions SET archive=1 WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  oci_bind_by_name($stid, ":id", $id);

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
