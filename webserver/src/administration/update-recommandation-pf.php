<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];
			// code
			$ressources = $_POST['ressources'];
			$responsable = $_POST['responsable'];
			$actions = $_POST['actions'];
			$percentage = $_POST['percentage'];

			$errors = array();
			
			$sql = "UPDATE recommandations SET ressources=:ressources, responsable=:responsable, actions=:actions, percentage=:percentage WHERE id=:id";
      
		  $stid = oci_parse($db, $sql);

			$inputs = array(':ressources' => $ressources, 
											':responsable' => $responsable,
											':actions' => $actions,
											':percentage' => $percentage,
											':id' => $id,);

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
