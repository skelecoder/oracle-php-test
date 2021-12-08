<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];
			// code
			$ressources = $_POST['ressources'];

			$errors = array();
			
			$sql = "UPDATE recommandations_v1 SET ressources=:ressources WHERE id=:id";
      
		  $stid = oci_parse($db, $sql);
			oci_bind_by_name($stid, ":id", $id);
			oci_bind_by_name($stid, ":ressources", $ressources);

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
