<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {

      $niveau = $_POST['niveau'];
      
			// title_ar
			$title_ar = $_POST['title_ar'];
			// title_fr
			$title_fr = $_POST['title_fr'];
      
      $description_ar = $_POST['description_ar'];
      $description_fr = $_POST['description_fr'];

      $errors = array();
			
			$sql = "INSERT INTO administrations (title_ar, title_fr, description_ar, description_fr, niveau) VALUES (:title_ar, :title_fr, :description_ar, :description_fr, :niveau)";
      
		  $stid = oci_parse($db, $sql);

      $inputs = array(':title_ar' => $title_ar,
                      ':title_fr' => $title_fr,
                      ':description_ar' => $description_ar,
                      ':description_fr' => $description_fr,
                      ':niveau' => $niveau);

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
