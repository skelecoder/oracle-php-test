<?php

	function getRecommandations(){
		include 'connect_db.php';
		
		$s = oci_parse($db, 'select * from recommandations');

		oci_execute($s);
		
		oci_close($db);
		return($s);
	}

	function getRecommandationById($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM recommandations WHERE id = :id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getActionsByRecommandationId($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM actions WHERE recommandation_id = :recommandation_id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":recommandation_id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

?>