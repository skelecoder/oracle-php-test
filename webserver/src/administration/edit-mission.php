<?php include_once 'functions.php'; ?>

<?php	
	if(isset($_GET['id'])) {
		$mission_id = htmlentities($_GET['id']);
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

      <?php 
				$mission = oci_fetch_array(getMissionById($mission_id), OCI_ASSOC+OCI_RETURN_NULLS); 
			?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Édition mission</h1>
					<ol class="breadcrumb">
						<li><a href="./missions.php">Liste des missions</a></li>
						<li class="active">Édition mission</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						
						<div class="col-lg-12">
							<div id="panel-misc-portlet-r5" class="panel panel-default">
								
								<div class="panel-heading">
									<a class="btn btn-primary btn-xs" href="./missions.php"><< Retour</a>
								</div>
								
								<form id="mission-form" class="form-horizontal" method="POST">
									<fieldset>
										<!-- panel content -->
										<div class="panel-body">
                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Titre mission (العربية)</b></label>
                              <textarea dir="rtl" rows="2" class="form-control" name="title_ar"><?php echo stripcslashes($mission['TITLE_AR']); ?></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Titre mission (Français)</b></label>
                              <textarea rows="2" class="form-control" name="title_fr"><?php echo stripcslashes($mission['TITLE_FR']); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Description (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="description_ar"><?php echo stripcslashes($mission['DESCRIPTION_AR']); ?></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Description (Français)</b></label>
                              <textarea rows="3" class="form-control" name="description_fr"><?php echo stripcslashes($mission['DESCRIPTION_FR']); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
										</div>
										<!-- /panel content -->

										<!-- panel footer -->
										<div class="panel-footer clearfix">
											<button type="submit" class="btn btn-success pull-right btn-sm nomargin-top nomargin-bottom">Sauvegarder</button>
										</div>
										<!-- /panel footer -->
										
									</fieldset>
								</form>

							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-lg-12">
							<div id="panel-misc-portlet-r5" class="panel panel-default">

								<div class="panel-heading">
									<span class="elipsis"><!-- panel title -->
										<strong>Organismes controlés</strong>
									</span>
									<ul class="options pull-right relative list-unstyled">
										<li><a href="link-administration-to-mission.php?id=<?php echo $mission_id; ?>" class="btn btn-primary btn-xs white size-13"><i class="fa fa-plus"></i> Ajouter organisme</a></li>
									</ul>
								</div>
								<!-- panel content -->
								<div class="panel-body">
									<table id="engagements" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th style="width:50%;" class="header-cell">Titre</th>
												<th class="header-cell">Principal?</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
												$missions_administrations = getAdministrationsByMissionId($mission_id);
												while (($mission_administration = oci_fetch_array($missions_administrations, OCI_ASSOC)) != false) {
											?>
											<tr>
												<td class="table-cell"><?php echo stripcslashes($mission_administration['TITRE_ADMIN']); ?></td>
												<td>
													<input <?php if($mission_administration['PRINCIPAL']==1) { echo 'checked'; } ?> value="<?php echo $mission_administration['ID']; ?>" type="checkbox" name="principal">
												</td>
												<td>
													<a href="change-link-administration-to-mission.php?id=<?php echo $mission_administration['ID']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Changer organisme</a>
													<a href="./administration.php?id=<?php echo $mission_administration['ID']; ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Consulter les recommandations</a>
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
			</section>
			<!-- /MIDDLE -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		
		<!-- JS DATATABLE -->
		<script type="text/javascript">
			$('form').submit(function(ev) {
				ev.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'update-mission.php',
					data: $('form').serialize()+"&id="+<?php echo $mission_id; ?>,
					success: function(data) {
						if(data.response.status == 'success'){
							_toastr("mission modifiée","top-right","success",false);
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});

			$('input[type=checkbox][name=principal]').change(function() {
				if($(this).is(":checked")) {
					var principal = 1;
				}else{
					var principal = 0;
				}
				$.ajax({
					url: 'set-organisme-principal-by-mission.php',
					type: 'POST',
					dataType: 'json',
					data: {
						mission_id_administration_id:$(this).val(),
						principal: principal
					},
					success: function(data) {
						if(data.response.status == 'success'){
							//window.location.reload();
						}else{

						}
					}
        });
      });
		</script>

	</body>
</html>