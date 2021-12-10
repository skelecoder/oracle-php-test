<?php
    function getRecommandations(){
		include 'connect_db.php';
		
		$s = oci_parse($db, 'select * from recommandations');

		oci_execute($s);
		
		oci_close($db);
		return($s);
	}

	function getRecommandationByCode($code){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM recommandations WHERE code = :code';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":code", $code);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}
	
	function getActionsByRecommandationId($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM actions WHERE RECOMMANDATION_ID = :id';
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

	function getRecommandationsByMissionId($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM recommandations WHERE MISSION_ID = :id AND ARCHIVE = 0';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}
?>