<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];

			$code = $_POST['code'];
      
			// title_ar
			$title_ar = $_POST['title_ar'];
			// title_fr
			$title_fr = $_POST['title_fr'];

			// start_date
			if($_POST['start_date']==''){
				$start_date = NULL;
			}else{
				$start_date = $_POST['start_date'];
			}
			// end_date
			if($_POST['end_date']==''){
				$end_date = NULL;
			}else{
				$end_date = $_POST['end_date'];
			}
      
      $escompte_ar = $_POST['escompte_ar'];
      $escompte_fr = $_POST['escompte_fr'];

      $obtenu_ar = $_POST['obtenu_ar'];
      $obtenu_fr = $_POST['obtenu_fr'];

      $observations_ar = $_POST['observations_ar'];
      $observations_fr = $_POST['observations_fr'];

			$errors = array();
			
			$sql = "UPDATE recommandations SET code=:code, title_ar=:title_ar, title_fr=:title_fr, start_date=TO_DATE( :start_date, 'YYYY-MM-DD' ), end_date=TO_DATE( :end_date, 'YYYY-MM-DD' ), escompte_ar=:escompte_ar, escompte_fr=:escompte_fr, obtenu_ar=:obtenu_ar, obtenu_fr=:obtenu_fr, observations_ar=:observations_ar, observations_fr=:observations_fr WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  $inputs = array(':code' => $code, 
                      ':title_ar' => $title_ar,
                      ':title_fr' => $title_fr,
                      ':start_date' => $start_date,
                      ':end_date' => $end_date,
                      ':escompte_ar' => $escompte_ar,
                      ':escompte_fr' => $escompte_fr,
                      ':obtenu_ar' => $obtenu_ar,
                      ':obtenu_fr' => $obtenu_fr,
                      ':observations_ar' => $observations_ar,
                      ':observations_fr' => $observations_fr,
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
