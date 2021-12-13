<?php
	include 'connect_db.php';
	if ( isset($_POST) ) {
		
		$id = $_POST['id'];
		
		$errors = array();
		
		$sql = 'SELECT * FROM actions WHERE id = :id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);

		if(!oci_execute($stid,OCI_DEFAULT)) {
      $errors[] = oci_error($stid);
    }

    $res = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS); 
		
		oci_close($db);

    if(count($errors) === 0) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
			$response_array['errors'] = $errors;
		}
		
		if($res["START_DATE"] == '0000-00-00') {
			$start_date = '';
		}else{
			$start_date = date_format(date_create($res["START_DATE"]),"Y-m-d");
		}
		
		if($res["END_DATE"] == '0000-00-00') {
			$end_date = '';
		}else{
			$end_date = date_format(date_create($res["END_DATE"]),"Y-m-d");
		}
		
		$json = array(
			'id' => $res["ID"],
			'start_date' => $start_date,
			'end_date' => $end_date,
			'title_ar' => nl2br(stripcslashes($res["TITLE_AR"])),
			'title_fr' => nl2br(stripcslashes($res["TITLE_FR"])),
			'budget_fr' => nl2br(stripcslashes($res["BUDGET_FR"])),
			'response' => $response_array
		);

		header('Content-type: application/json');
		echo json_encode($json);
	}
?>