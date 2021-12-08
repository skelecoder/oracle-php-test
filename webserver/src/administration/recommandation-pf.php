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
					<h1>Détail recommandation</h1>
					<ol class="breadcrumb">
						<li><a href="./recommandations.php">Liste recommandations</a></li>
						<li class="active"><?php echo $recommandation['TITLE_FR']; ?></li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="elipsis"><!-- panel title -->
										<strong>Calendrier effectif de mise en oeuvre</strong>
									</span>
								</div>

								<form class="form-horizontal" method="POST">
									<fieldset>
										<!-- panel content -->
										<div class="panel-body">
											<div class="col-lg-12">
												<div class="form-group">
													<label>Ressources non budgétaires allouées</label>
													<textarea rows="3" class="form-control" name="ressources"><?php echo stripcslashes($recommandation['RESSOURCES']); ?></textarea>
												</div>
											</div>
											
											<div class="col-lg-12">
												<div class="form-group">
													<label>Parties impliquées et responsable de la mise en œuvre</label>
													<textarea rows="3" class="form-control" name="responsable"><?php echo stripcslashes($recommandation['RESPONSABLE']); ?></textarea>
												</div>
											</div>
											
											<div class="col-lg-12">
												<div class="form-group">
													<label>Actions entreprises par l’organisme pour l’implémentation des recommandations</label>
													<textarea rows="3" class="form-control" name="actions"><?php echo stripcslashes($recommandation['ACTIONS']); ?></textarea>
												</div>
											</div>
										</div>

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
										<strong>Fiche recommandation</strong>
									</span>
								</div>
								<!-- panel content -->
								<div class="panel-body">

								<div class="row">
									<div class="col-lg-6">
										<p><b>Date de démarrage prévisionnelle</b></p>
										<?php if($recommandation['START_DATE'] == '0000-00-00') {
                      echo '';
                    }else{
                      echo date_format(date_create($recommandation['START_DATE']),"d-m-Y");
                    } ?>
									</div>
									<div class="col-lg-6">
										<p><b>Date d’achèvement prévisionnelle</b></p>
										<?php if($recommandation['END_DATE'] == '0000-00-00') {
                      echo '';
                    }else{
                      echo date_format(date_create($recommandation['END_DATE']),"d-m-Y");
                    } ?>
									</div>
								</div>
									
								<div class="row margin-top-20">
									<div class="col-lg-12">
										<p><b>Résultats escomptés</b></p>
										<div class="margin-bottom-20" style="text-align:justify"><?php echo nl2br(stripcslashes($recommandation['ESCOMPTE'])); ?></div>
									</div>
								</div>
									
								<div class="row">
									<div class="col-lg-12">
										<p><b>Résultats obtenus</b></p>
										<div class="margin-bottom-30" style="text-align:justify"><?php echo nl2br(stripcslashes($recommandation['OBTENU'])); ?></div>
									</div>
								</div>
									
									<div class="row">
										<div class="col-lg-12">
											<p><b>Obsérvations</b></p>
											<div class="margin-bottom-30" style="text-align:justify"><?php echo nl2br(stripcslashes($recommandation['OBSERVATIONS'])); ?></div>
										</div>
									</div>

								</div>
								<!-- /panel content -->
							</div>
						</div>
						<!-- / 1.FICHE -->

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script type="text/javascript">
			$('form').submit(function(ev) {
				ev.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'update-recommandation-pf.php',
					data: $('form').serialize()+"&id="+<?php echo $recommandation_id; ?>,
					success: function(data) {
						if(data.response.status == 'success'){
							_toastr("Recommandation actualisée","top-right","success",false);
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});
		</script>
															

	</body>
</html>