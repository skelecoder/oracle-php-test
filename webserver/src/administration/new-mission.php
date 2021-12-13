<?php include_once 'functions.php'; ?>

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
					<h1>Nouvelle mission</h1>
					<ol class="breadcrumb">
						<li><a href="./missions.php">Liste des missions</a></li>
						<li class="active">Nouvelle mission</li>
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
                              <textarea dir="rtl" rows="2" class="form-control" name="title_ar"></textarea>
                            </div>
                            
                            <div class="col-lg-6">
                              <label><b>Titre mission (Français)</b></label>
                              <textarea rows="2" class="form-control" name="title_fr"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><b>Description mission (العربية)</b></label>
                              <textarea dir="rtl" rows="3" class="form-control" name="description_ar"></textarea>
                            </div>
                            <div class="col-lg-6">
                              <label><b>Description mission (Français)</b></label>
                              <textarea rows="3" class="form-control" name="description_fr"></textarea>
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
					url: 'add-mission.php',
					data: $('form').serialize(),
					success: function(data) {
						if(data.response.status == 'success'){
							window.location.replace('missions.php');
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});
		</script>

	</body>
</html>