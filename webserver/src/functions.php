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

	function getAdministrationsByMissionId($mission_id){
		include 'connect_db.php';
		
		$sql = 'select ma.id as id, ma.principal, m.title_fr as titre_mission, ad.title_fr as titre_admin from missions_administrations ma LEFT JOIN missions m ON m.id=ma.mission_id LEFT JOIN administrations ad ON ad.id=ma.administration_id WHERE ma.mission_id=:mission_id';
		$stid = oci_parse($db, $sql);

		oci_bind_by_name($stid, ":mission_id", $mission_id);
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

	function getTotalRecommandationsByMissioId($id){
		include 'connect_db.php';
		
		$sql = 'SELECT * FROM missions_administrations WHERE mission_id = :mission_id';
		$missions_administrations = oci_parse($db, $sql);
		oci_bind_by_name($missions_administrations, ":mission_id", $id);
		oci_execute($missions_administrations);

		$total_recommandations = 0;
		$achevees = 0;
		$en_cours = 0;
		$non_entamees = 0;

		while (($mission_administration = oci_fetch_array($missions_administrations, OCI_ASSOC)) != false) {
			$results=array();
			//$recommandations = getRecommandationsByMission_Administration_Id(0, $mission_administration['ID']);
			//$total_recommandations += oci_fetch_all($recommandations, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
			$recommandations = getRecommandationsByMission_Administration_Id(0, $mission_administration['ID']);
			while (($recommandation = oci_fetch_array($recommandations, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
				++$total_recommandations;
				if($recommandation['PERCENTAGE'] == 100) {
					++$achevees;
				}else if($recommandation['PERCENTAGE'] == 0) {
					++$non_entamees;
				} else {
					++$en_cours;
				}
			}
		}
		
		oci_close($db);

		$res = array(
			'total_recommandations' => $total_recommandations,
			'achevees' => $achevees,
			'en_cours' => $en_cours,
			'non_entamees' => $non_entamees
		);
		return($res);
	}

?>