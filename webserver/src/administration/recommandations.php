<?php include_once 'checking-all.php'; ?>

<?php	
	if(isset($_GET['mission_admin_id'])) {
		$mission_admin_id = htmlentities($_GET['mission_admin_id']);
		$missions_administrations = getMissionAdministrationById($mission_admin_id);
    $mission_id_administration_id = oci_fetch_array($missions_administrations, OCI_ASSOC+OCI_RETURN_NULLS);
	}
?>

<!doctype html>
<html lang="en-US">
	<head>
		<?php include 'meta.php'; ?>

		<?php include 'css.php'; ?>

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

			<?php include 'header.php'; ?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<a href="new-recommandation.php?mission_admin_id=<?php echo $mission_admin_id; ?>" class="btn btn-sm btn-green pull-right"><i class="fa fa-plus"></i> Ajouter une recommandation</a>
					<h1>Mission: <?php echo stripcslashes($mission_id_administration_id['TITRE_MISSION']); ?></h1>
					<ol class="breadcrumb">
						<li class="active">Organisme controlé: <?php echo stripcslashes($mission_id_administration_id['TITRE_ADMIN']); ?></li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="page-profile">
						
						<div class="row margin-bottom-20">
							<div class="col-lg-12">
								<a class="btn btn-default btn-xs" href="./edit-mission.php?id=<?php echo $mission_id_administration_id['MISSION_ID']; ?>"><< Retour à la mission</a>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div id="panel-misc-portlet-r5" class="panel panel-default">

									<div class="panel-heading">
										<span class="elipsis"><!-- panel title -->
											<strong>Recommandations</strong>
										</span>
									</div>
									<!-- panel content -->
									<div class="panel-body">
										<table id="engagements" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th style="width:150px;" class="header-cell">Code</th>
													<th style="width:40%;" class="header-cell">Titre</th>
													<th class="text-center header-cell">Avancement</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$recommandations = getRecommandationsByMission_Administration_Id(0, $mission_admin_id);
													while (($recommandation = oci_fetch_array($recommandations, OCI_ASSOC)) != false) {
												?>
												<tr>
													<td class="table-cell"><?php echo $recommandation['CODE']; ?></td>
													<td class="table-cell"><?php echo $recommandation['TITLE_FR']; ?></td>
													<td class="table-cell" class="text-center">
														<?php $percentage = $recommandation['PERCENTAGE']; ?>
														<?php echo $percentage; ?> %
														<div class="progress progress-xs">
															<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%; min-width: 0em;">
																<span class="sr-only"><?php echo $percentage; ?>% Complete</span>
															</div>
														</div>
													</td>
													<td>
														<a href="./recommandation-pf.php?id=<?php echo $recommandation['ID']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Consulter</a>
														<a href="./edit-recommandation.php?id=<?php echo $recommandation['ID']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Modifier</a>
														<a onclick="archiveRecommandation(<?php echo $recommandation['ID']; ?>);" class="btn btn-xs btn-warning"><i class="fa fa-close"></i> Archiver</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->
			
			<!-- ARCHIVER RECOMMANDATION -->
			<div id="delete-modal" data-id="" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Archiver recommandation</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							Voulez vous archiver cette recommandation ?
							
							<div class="col-md-12 text-center">
								<img class="spinner img-reponsive softhide" src="assets/images/spinner.gif" />
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
							<button onclick="confirmArchive();" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Confirmer archivage</button>
						</div>

					</div>
				</div>
			</div>
			<!-- ARCHIVER RECOMMANDATION -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script>
			var archiveRecommandation = function(id) {
				$("#delete-modal").attr('data-id', id);
				$('#delete-modal').modal('toggle');
			};

			var confirmArchive = function() {
				var id = $("#delete-modal").attr('data-id');

				$.ajax({
					url: 'archive-recommandation.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id:id
					},
					success: function(data) {
						if(data.response.status == 'success'){
							window.location.reload();
						}else{

						}
					}
				});
				$('.spinner').show();
			};
		</script>

	</body>
</html>