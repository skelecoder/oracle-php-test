<?php include_once 'checking-all.php'; ?>

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
					<a href="new-mission.php" class="btn btn-sm btn-green pull-right"><i class="fa fa-plus"></i> Ajouter une mission</a>
					<h1>Liste des missions</h1>
					<ol class="breadcrumb">
						<li class="active">Liste des missions</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="page-profile">

						<div class="row">
							<div class="col-lg-12">
								<div id="panel-misc-portlet-r5" class="panel panel-default">

									<div class="panel-heading">
										<span class="elipsis"><!-- panel title -->
											<strong>Missions</strong>
										</span>
									</div>
									<!-- panel content -->
									<div class="panel-body">
										<table id="engagements" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th style="width:80%;" class="header-cell">Titre</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$missions = getMissionsByUserId(0, $_SESSION['id']);
													while (($mission = oci_fetch_array($missions, OCI_ASSOC)) != false) {
												?>
												<tr>
													<td class="table-cell"><?php echo stripcslashes($mission['TITLE_FR']); ?></td>
													<td>
														<a href="./edit-mission.php?id=<?php echo $mission['ID']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Modifier</a>
														<a onclick="archiveMission(<?php echo $mission['ID']; ?>);" class="btn btn-xs btn-warning"><i class="fa fa-close"></i> Archiver</a>
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
			
			<!-- ARCHIVER mission -->
			<div id="delete-modal" data-id="" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Archiver mission</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							Voulez vous archiver cette mission ?
							
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
			<!-- ARCHIVER mission -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script>
			var archiveMission = function(id) {
				$("#delete-modal").attr('data-id', id);
				$('#delete-modal').modal('toggle');
			};

			var confirmArchive = function() {
				var id = $("#delete-modal").attr('data-id');

				$.ajax({
					url: 'archive-mission.php',
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