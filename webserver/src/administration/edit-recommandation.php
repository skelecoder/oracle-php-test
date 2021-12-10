<?php include_once 'functions.php'; ?>

<?php	
	if(isset($_GET['id'])) {
		$recommandation_id = htmlentities($_GET['id']);
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
				$recommandation = oci_fetch_array(getRecommandationById($recommandation_id), OCI_ASSOC+OCI_RETURN_NULLS); 
			?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Édition recommandation</h1>
					<ol class="breadcrumb">
						<li><a href="./recommandations.php">Liste des recommandations</a></li>
						<li class="active">Édition recommandation</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						
						<div class="col-lg-12">
							<div id="panel-misc-portlet-r5" class="panel panel-default">
								
								<div class="panel-heading">
									<a class="btn btn-primary btn-xs" href="./recommandations.php"><< Retour</a>
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
                              <input type="text" class="form-control" name="code" value="<?php echo stripcslashes($recommandation['CODE']); ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>La recommandation (العربية)</b></label>
                              <textarea dir="rtl" rows="2" class="form-control" name="title_ar"><?php echo stripcslashes($recommandation['TITLE_AR']); ?></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>La recommandation (Français)</b></label>
                              <textarea rows="2" class="form-control" name="title_fr"><?php echo stripcslashes($recommandation['TITLE_FR']); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Date de démarrage prévisionnelle</b></label>
                              <input type="date" name="start_date" class="form-control" value="<?php echo date_format(date_create($recommandation['START_DATE']),"Y-m-d"); ?>">
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Date d’achèvement prévisionnelle</b></label>
                              <input type="date" name="end_date" class="form-control" value="<?php echo date_format(date_create($recommandation['END_DATE']),"Y-m-d"); ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Résultats escomptés (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="escompte_ar"><?php echo stripcslashes($recommandation['ESCOMPTE_AR']); ?></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Résultats escomptés (Français)</b></label>
                              <textarea rows="3" class="form-control" name="escompte_fr"><?php echo stripcslashes($recommandation['ESCOMPTE_FR']); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Résultats obtenus (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="obtenu_ar"><?php echo stripcslashes($recommandation['OBTENU_AR']); ?></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Résultats obtenus (Français)</b></label>
                              <textarea rows="3" class="form-control" name="obtenu_fr"><?php echo stripcslashes($recommandation['OBTENU_FR']); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Observations (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="observations_ar"><?php echo stripcslashes($recommandation['OBSERVATIONS_AR']); ?></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Observations (Français)</b></label>
                              <textarea rows="3" class="form-control" name="observations_fr"><?php echo stripcslashes($recommandation['OBSERVATIONS_FR']); ?></textarea>
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
				ev.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'update-recommandation.php',
					data: $('form').serialize()+"&id="+<?php echo $recommandation_id; ?>,
					success: function(data) {
						if(data.response.status == 'success'){
							_toastr("Recommandation modifiée","top-right","success",false);
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});
		</script>

	</body>
</html>