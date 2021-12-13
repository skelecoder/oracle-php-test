<?php include_once 'functions.php'; ?>
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
          <h1>Mission: <?php echo stripcslashes($mission_id_administration_id['TITRE_MISSION']); ?></h1>
					<ol class="breadcrumb">
						<li class="active">Organisme controlé: <?php echo stripcslashes($mission_id_administration_id['TITRE_ADMIN']); ?></li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

          <div class="row margin-bottom-20">
						<div class="col-lg-12">
              <a class="btn btn-default btn-xs" href="./recommandations.php?mission_admin_id=<?php echo $mission_admin_id; ?>"><< Retour à la liste des recommandations</a>
            </div>
          </div>

					<div class="row">
						
						<div class="col-lg-12">
							<div id="panel-misc-portlet-r5" class="panel panel-default">
              
								<div class="panel-heading">
									Nouvelle recommandation
								</div>
								
								<form id="recommandation-form" class="form-horizontal" method="POST">
									<fieldset>
										<!-- panel content -->
										<div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-4">
                              <label><b>Code recommandation</b></label>
                              <input type="text" class="form-control" name="code">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>La recommandation (العربية)</b></label>
                              <textarea dir="rtl" rows="2" class="form-control" name="title_ar"></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>La recommandation (Français)</b></label>
                              <textarea rows="2" class="form-control" name="title_fr"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Date de démarrage prévisionnelle</b></label>
                              <input type="date" name="start_date" class="form-control">
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Date d’achèvement prévisionnelle</b></label>
                              <input type="date" name="end_date" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Résultats escomptés (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="escompte_ar"></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Résultats escomptés (Français)</b></label>
                              <textarea rows="3" class="form-control" name="escompte_fr"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Résultats obtenus (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="obtenu_ar"></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Résultats obtenus (Français)</b></label>
                              <textarea rows="3" class="form-control" name="obtenu_fr"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Observations (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="observations_ar"></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Observations (Français)</b></label>
                              <textarea rows="3" class="form-control" name="observations_fr"></textarea>
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
        alert('sdf');
				ev.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'add-recommandation.php',
					data: $('form').serialize()+"&mission_admin_id=<?php echo $mission_admin_id; ?>",
					success: function(data) {
						if(data.response.status == 'success'){
							window.location.replace('recommandations.php?mission_admin_id=<?php echo $mission_admin_id; ?>');
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});
		</script>

	</body>
</html>