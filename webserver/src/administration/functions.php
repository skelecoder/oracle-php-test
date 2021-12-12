<?php 

	function getRecommandations($archive){
		include 'connect_db.php';
		
		$stid = oci_parse($db, 'select * from recommandations WHERE archive=:archive');

		oci_bind_by_name($stid, ":archive", $archive);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getRecommandationsByMission_Administration_Id($archive, $missionmission_administration_id){
		include 'connect_db.php';
		
		$stid = oci_parse($db, 'select * from recommandations WHERE archive=:archive AND missions_administrations_id=:missions_administrations_id');

		oci_bind_by_name($stid, ":archive", $archive);
		oci_bind_by_name($stid, ":missions_administrations_id", $missionmission_administration_id);
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

	function getAdministrationsByNiveau($niveau){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM administrations WHERE niveau = :niveau';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":niveau", $niveau);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getAdministrationById($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM administrations WHERE id = :id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getSubAdminsById($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM administrations WHERE parent_id = :id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getAdministrationsByMissionId($mission_id){
		include 'connect_db.php';
		
		$sql = 'select ma.id as id, ma.principal, m.title_fr as titre_mission, ad.title_fr as titre_admin from missions_administrations ma LEFT JOIN missions m ON m.id=ma.mission_id LEFT JOIN administrations ad ON ad.id=ma.administration_id WHERE ma.mission_id=:mission_id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":mission_id", $mission_id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getMissionAdministrationById($id){
		include 'connect_db.php';
		
		$sql = 'select ma.id as id, ma.mission_id, ma.principal, m.title_fr as titre_mission, ad.title_fr as titre_admin from missions_administrations ma LEFT JOIN missions m ON m.id=ma.mission_id LEFT JOIN administrations ad ON ad.id=ma.administration_id WHERE ma.id=:id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":id", $id);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getUserByUsername($username){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM users WHERE username = :username';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":username", $username);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

	function getMissionsByUserId($archive, $user_id){
		include 'connect_db.php';
		
		$stid = oci_parse($db, 'select * from missions WHERE user_id=:user_id AND archive=:archive');

		oci_bind_by_name($stid, ":user_id", $user_id);
		oci_bind_by_name($stid, ":archive", $archive);
		oci_execute($stid);
		
		oci_close($db);
		return($stid);
	}

?>