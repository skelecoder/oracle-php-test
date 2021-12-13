<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];

			// title_ar
			$title_ar = $_POST['title_ar'];
			// title_fr
			$title_fr = $_POST['title_fr'];

      $description_ar = $_POST['description_ar'];
      $description_fr = $_POST['description_fr'];

			$errors = array();
			
			$sql = "UPDATE missions SET title_ar=:title_ar, title_fr=:title_fr, description_ar=:description_ar, description_fr=:description_fr WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  $inputs = array(':id' => $id, 
                      ':title_ar' => $title_ar,
                      ':title_fr' => $title_fr,
                      ':description_ar' => $description_ar,
                      ':description_fr' => $description_fr);

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
