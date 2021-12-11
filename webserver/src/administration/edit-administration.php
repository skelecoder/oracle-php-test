<?php
	include 'connect_db.php';
	if ( isset($_POST) ) {
		
		$id = $_POST['id'];
		
		$errors = array();
		
		$sql = 'SELECT * FROM administrations WHERE id = :id';
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
		
		$json = array(
			'id' => $res["ID"],
			'title_ar' => stripcslashes($res["TITLE_AR"]),
			'title_fr' => stripcslashes($res["TITLE_FR"]),
			'description_ar' => nl2br(stripcslashes($res["DESCRIPTION_AR"])),
			'description_fr' => nl2br(stripcslashes($res["DESCRIPTION_FR"])),
			'response' => $response_array
		);

		header('Content-type: application/json');
		echo json_encode($json);
	}
?>