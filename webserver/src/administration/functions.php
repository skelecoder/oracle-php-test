<?php

	function getRecommandations($archive){
		include 'connect_db.php';
		
		$stid = oci_parse($db, 'select * from recommandations WHERE archive=:archive');

		oci_bind_by_name($stid, ":archive", $archive);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getMissions($archive){
		include 'connect_db.php';
		
		$stid = oci_parse($db, 'select * from missions WHERE archive=:archive');

		oci_bind_by_name($stid, ":archive", $archive);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
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

	function getMissionById($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM missions WHERE id = :id';
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