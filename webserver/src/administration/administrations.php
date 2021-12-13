<?php include_once 'functions.php'; ?>

<?php	
	if(isset($_GET['niveau'])) {
		$niveau = htmlentities($_GET['niveau']);
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
					<a data-toggle="modal" data-target="#add-modal" class="btn btn-sm btn-green pull-right"><i class="fa fa-plus"></i> Ajouter une administration niveau <?php echo $niveau; ?></a>
					<h1>Liste des administrations</h1>
					<ol class="breadcrumb">
						<li class="active">Liste des administrations</li>
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
											<strong>Administrations niveau: <?php echo $niveau; ?></strong>
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
													$administrations = getAdministrationsByNiveau($niveau);
													while (($administration = oci_fetch_array($administrations, OCI_ASSOC)) != false) {
												?>
												<tr>
													<td class="table-cell"><?php echo stripcslashes($administration['TITLE_FR']); ?></td>
													<td>
														<a onclick="showEditModal(<?php echo $administration['ID']; ?>);" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Modifier</a>
														<a href="./administration.php?id=<?php echo $administration['ID']; ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Consulter</a>
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
			
			<div id="add-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Ajouter administration niveau <?php echo $niveau; ?></h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							<form id="add-form" class="form-horizontal" method="POST">
								<fieldset>
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-md-12">
											<label><b>Titre administration (Français)</b></label>
												<input type="text" class="form-control" name="title_fr">
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12">
												<label><b>Titre administration (العربية)</b></label>
												<input dir="rtl" type="text" class="form-control" name="title_ar">
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12">
												<label><b>Description administration (Français)</b></label>
												<textarea rows="2" class="form-control" name="description_fr"></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12">
												<label><b>Description administration (العربية)</b></label>
												<textarea dir="rtl" rows="2" class="form-control" name="description_ar"></textarea>
											</div>
										</div>
									</div>
								</fieldset>
							</form>

							<div class="col-md-12 text-center">
								<img class="spinner img-reponsive softhide" src="assets/images/spinner.gif" />
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
							<button onclick="addAdministration(<?php echo $niveau; ?>);" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Sauvegarder</button>
						</div>

					</div>
				</div>
			</div>
			
			<!-- MODIFIER ACTION -->
			<div data-action-id="" id="edit-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Edition action</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							<div class="form-horizontal">
								
								<div class="form-group">
									<div class="col-md-12">
                  <label><b>Titre administration (Français)</b></label>
                    <input type="text" class="form-control" name="title_fr">
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
                    <label><b>Titre administration (العربية)</b></label>
                    <input dir="rtl" type="text" class="form-control" name="title_ar">
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
                    <label><b>Description administration (Français)</b></label>
                    <textarea rows="2" class="form-control" name="description_fr"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
                    <label><b>Description administration (العربية)</b></label>
                    <textarea dir="rtl" rows="2" class="form-control" name="description_ar"></textarea>
									</div>
								</div>
								
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<div class="col-md-12 text-center">
								<img class="spinner img-reponsive softhide" src="assets/images/spinner.gif" />
							</div>
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
							<button onclick="saveEditAdministration();" class="btn btn-primary btn-sm"><i class="fa fa-save"> </i>Sauvegarder</button>
						</div>

					</div>
				</div>
			</div>
			<!-- MODIFIER ACTION -->
			
			<!-- ARCHIVER administration -->
			<div id="delete-modal" data-id="" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Archiver administration</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							Voulez vous archiver cette administration ?
							
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
			<!-- ARCHIVER administration -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script>
			var addAdministration = function(id) {
				$.ajax({
					url: 'add-administration.php',
					type: 'POST',
					dataType: 'json',
					data: $('#add-form').serialize()+"&niveau="+<?php echo $niveau; ?>,
					before: function(){
						$('.spinner').show();
					},
					success: function(data) {
						$('.spinner').show();
						if(data.response.status == 'success') {
							window.location.reload();
						}else{

						}
					}
				});
			};

			var showEditModal = function(id) {
				$("#edit-modal").attr('data-action-id', id);
				$.ajax({
					url: 'edit-administration.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id:id
					},
					before: function(){
						$('.spinner').show();
					},
					success: function(data) {
						$('.spinner').hide();
						if(data.response.status == 'success'){
							$("#edit-modal input[name='title_ar']" ).val(data.title_ar);
							$("#edit-modal input[name='title_fr']" ).val(data.title_fr);
							$("#edit-modal textarea[name='description_ar']" ).val(data.description_ar);
							$("#edit-modal textarea[name='description_fr']" ).val(data.description_fr);
						}else{
							
						}
					}
				});
				$('#edit-modal').modal('toggle');
			};

			var saveEditAdministration = function() {
				var id = $("#edit-modal").attr('data-action-id');
				var title_ar = $( "#edit-modal input[name='title_ar']" ).val();
				var title_fr = $( "#edit-modal input[name='title_fr']" ).val();
				var description_ar = $("#edit-modal textarea[name='description_ar']" ).val();
				var description_fr = $("#edit-modal textarea[name='description_fr']" ).val();
				$('.spinner').show();
				$.ajax({
					url: 'update-administration.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						title_ar: title_ar,
						title_fr: title_fr,
						description_ar: description_ar,
						description_fr: description_fr
					},
					before: function(){
						$('.spinner').show();
					},
					success: function(data) {
						if(data.response.status == 'success'){
							window.location.reload();
						}else{

						}
					}
				});
			};

			var archiveAdministration = function(id) {
				$("#delete-modal").attr('data-id', id);
				$('#delete-modal').modal('toggle');
			};

			var confirmArchive = function() {
				var id = $("#delete-modal").attr('data-id');

				$.ajax({
					url: 'archive-administration.php',
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