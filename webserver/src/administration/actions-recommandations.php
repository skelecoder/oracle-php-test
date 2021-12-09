<?php include_once 'functions.php'; ?>

<?php 
	$recommandation_id = htmlentities($_GET['recommandationId']);
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
					<h1>Gestion des actions</h1>
					<ol class="breadcrumb">
						<li><a href="./recommandations.php">Liste des recommandations</a></li>
						<li><a href="./recommandation-pf.php?id=<?php echo $recommandation_id; ?>">Détail recommandation</a></li>
						<li class="active">Consistance (détail) des actions</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						
						<div class="col-lg-12">
							<div id="panel-misc-portlet-r5" class="panel panel-default">
								
								<div class="panel-heading">
									<a class="btn btn-primary btn-xs" href="./recommandation-pf.php?id=<?php echo $recommandation_id; ?>"><< Retour</a>
								</div>
								
								<form id="action-form" class="form-horizontal" method="POST">
									<fieldset>
										<!-- panel content -->
										<div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Consistance (détail) de l’action (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="title_ar"></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Consistance (détail) de l’action (Français)</b></label>
                              <textarea rows="3" class="form-control" name="title_fr"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Date de démarrage</b></label>
                              <input type="date" name="start_date" class="form-control">
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Date d’achèvement constatée ou estimée</b></label>
                              <input type="date" name="end_date" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Budget alloué</b></label>
                              <textarea  rows="3" class="form-control" name="budget"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12 text-center">
                          <a onclick="addAction();" class="btn btn-success btn-sm width-200 nomargin-top nomargin-bottom">Ajouter</a>
                        </div>
                      </div>

											<div class="table-responsive">
												<table class="table table-bordered table-vertical-middle nomargin">
													<thead>
														<tr>
                              <th>Consistance (détail) de l’action (العربية)</th>
                              <th>Consistance (détail) de l’action (Français)</th>
                              <th class="width-150">Date de démarrage</th>
                              <th class="width-150">Date d’achèvement constatée ou estimée</th>
                              <th>Budget alloué</th>
															<th class="width-100"></th>
														</tr>
													</thead>
													<tbody>	
														<?php 
															$actions = getActionsByRecommandationId($recommandation_id); 
															while (($action = oci_fetch_array($actions, OCI_ASSOC)) != false) {
														?>				
														<tr>
															<td><?php echo nl2br(stripcslashes($action['TITLE_AR'])); ?></td>
															<td><?php echo nl2br(stripcslashes($action['TITLE_FR'])); ?></td>
															<td>
                                <?php if($action['START_DATE'] == '0000-00-00') {
                                  echo '';
                                }else{
                                  echo date_format(date_create($action['START_DATE']),"d-m-Y");
                                } ?>
															</td>
															<td>
                                <?php if($action['END_DATE'] == '0000-00-00') {
                                  echo '';
                                }else{
                                  echo date_format(date_create($action['END_DATE']),"d-m-Y");
                                } ?>
															</td>
															<td><?php echo nl2br(stripcslashes($action['BUDGET_FR'])); ?></td>
															<td class="text-center">
																<a onclick="showEditModal(<?php echo $action['ID']; ?>);" class="btn btn-xs btn-primary">
																	<i class="fa fa-edit nopadding"></i>
																</a>
																<a onclick="deleteAction(<?php echo $action['ID']; ?>);" class="btn btn-xs btn-danger">
																	<i class="fa fa-trash nopadding"></i>
																</a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
										<!-- /panel content -->
										
									</fieldset>
								</form>

							</div>
						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->
			
			<!-- MODIFIER FINANCEUR -->
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
										<label for="profileFirstName">Date de démarrage</label>
										<input name="start_date" type="date" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<label for="profileFirstName">Date d’achèvement constatée ou estimée</label>
										<input name="end_date" type="date" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<label for="profileFirstName">Consistance (détail) de l’action (العربية)</label>
										<textarea type="text" dir="rtl" name="title_ar" class="form-control"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<label for="profileFirstName">Consistance (détail) de l’action (Français)</label>
										<textarea type="text" name="title_fr" class="form-control"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<label for="profileFirstName">Budget alloué</label>
										<textarea type="text" name="budget" class="form-control"></textarea>
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
							<button onclick="saveEditAction();" class="btn btn-primary btn-sm"><i class="fa fa-save"> </i>Sauvegarder</button>
						</div>

					</div>
				</div>
			</div>
			<!-- MODIFIER FINANCEUR -->
			
			<!-- SUPPRIMER FINANCEUR -->
			<div id="delete-modal" data-id="" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">Supprimer action</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							Voulez vous supprimer cette action ?
							
							<div class="col-md-12 text-center">
								<img class="spinner img-reponsive softhide" src="assets/images/spinner.gif" />
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
							<button onclick="confirmDelete();" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Confirmer suppression</button>
						</div>

					</div>
				</div>
			</div>
			<!-- SUPPRIMER FINANCEUR -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		
		<!-- JS DATATABLE -->
		<script type="text/javascript">
			function addAction() {
				$.ajax({
					type: 'POST',
					url: 'add-action.php',
					data: $('#action-form').serialize()+"&recommandation_id="+<?php echo $recommandation_id; ?>,
					success: function(data) {
						if(data.response.status == 'success'){
							window.location.reload();
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			};
			
			var showEditModal = function(id) {
				$("#edit-modal").attr('data-action-id', id);
				$.ajax({
					url: 'edit-action.php',
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
							$("#edit-modal input[name='start_date']" ).val(data.start_date);
							$("#edit-modal input[name='end_date']" ).val(data.end_date);
							$("#edit-modal textarea[name='title_ar']" ).val(data.title_ar);
							$("#edit-modal textarea[name='title_fr']" ).val(data.title_fr);
							$("#edit-modal textarea[name='budget']" ).val(data.budget_fr);
						}else{
							
						}
					}
				});
				$('#edit-modal').modal('toggle');
			};
			
			var saveEditAction = function() {
				var id = $("#edit-modal").attr('data-action-id');
				var start_date = $( "#edit-modal input[name='start_date']" ).val();
				var end_date = $( "#edit-modal input[name='end_date']" ).val();
				var title_ar = $( "#edit-modal textarea[name='title_ar']" ).val();
				var title_fr = $( "#edit-modal textarea[name='title_fr']" ).val();
				var budget = $( "#edit-modal textarea[name='budget']" ).val();
				$('.spinner').show();
				$.ajax({
					url: 'update-action.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						start_date: start_date,
						end_date: end_date,
						title_ar: title_ar,
						title_fr: title_fr,
						budget: budget
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
			
			var deleteAction = function(id) {
				$("#delete-modal").attr('data-id', id);
				$('#delete-modal').modal('toggle');
			};

			var confirmDelete = function() {
				var id = $("#delete-modal").attr('data-id');

				$.ajax({
					url: 'delete-action.php',
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