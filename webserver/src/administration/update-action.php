<?php
		include 'connect_db.php';
		if ( isset($_POST) ) {
			
			$id = $_POST['id'];

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
			// title_ar
			$title_ar = $_POST['title_ar'];
			// title_fr
			$title_fr = $_POST['title_fr'];

      $budget_fr = $_POST['budget'];
      $budget_ar = 'sdfsf';

			$errors = array();
			
			$sql = "UPDATE actions SET title_ar=:title_ar, title_fr=:title_fr, start_date=TO_DATE( :start_date, 'YYYY-MM-DD' ), end_date=TO_DATE( :end_date, 'YYYY-MM-DD' ), budget_fr=:budget_fr, budget_ar=:budget_ar WHERE id=:id";
      
      $stid = oci_parse($db, $sql);
      
		  $inputs = array(':id' => $id, 
                      ':title_ar' => $title_ar,
                      ':title_fr' => $title_fr,
                      ':start_date' => $start_date,
                      ':end_date' => $end_date,
                      ':budget_fr' => $budget_fr,
                      ':budget_ar' => $budget_ar);

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
