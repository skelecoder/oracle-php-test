<?php include_once 'checking-admin.php'; ?>

<?php	
	if(isset($_GET['id'])) {
		$id = htmlentities($_GET['id']);
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
				$user = oci_fetch_array(getUserById($id), OCI_ASSOC+OCI_RETURN_NULLS);
			?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<h1>Édition porteur de mission</h1>
					<ol class="breadcrumb">
						<li><a href="./users.php">Liste des porteurs de missions</a></li>
						<li class="active">Édition porteur de mission</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						
						<div class="col-lg-10 col-lg-offset-1">
							<div id="panel-misc-portlet-r5" class="panel panel-default">

								<div class="panel-heading">

									<span class="elipsis"><!-- panel title -->
										<strong>Édition porteur de mission</strong>
									</span>

								</div>

								<form class="form-horizontal" method="POST">
									<fieldset>
										<!-- panel content -->
										<div class="panel-body">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileBio">Nom complet</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="nom" value="<?php echo stripcslashes($user['NOM']); ?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileBio">Email <p id="emailInvalid" class="softhide text-danger bold small">* Email invalide</p></label>
												<div class="col-md-9">
													<input dir="ltr" type="text" class="form-control" name="email" value="<?php echo $user['EMAIL']; ?>">
												</div>
											</div>
										
											<div class="softhide loading row text-center">
												<img src="assets/images/spinner.gif" />
											</div>

										</div>
										<!-- /panel content -->

										<!-- panel footer -->
										<div class="panel-footer clearfix">
											<button type="submit" class="btn btn-success pull-right btn-sm nomargin-top nomargin-bottom">Sauvegarder</button>
											<a class="btn btn-default pull-right btn-sm nomargin-top nomargin-bottom" href="./gestion-pdm.php">Retour</a>
										</div>
										<!-- /panel footer -->
										
										<div id="errorsBox" hidden="hidden" class="col-lg-8 col-lg-offset-2 alert alert-danger"><!-- DANGER -->
											<h4 class="text-danger"><strong>Les champs suivants à renseigner</strong></h4>

											<ul class="list-inline" id="errors">

											</ul>
										</div>
										
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
				$('#errors').html('');
				$.ajax({
					type: 'POST',
					url: 'update-pdm.php',
					data: $('form').serialize()+"&id="+<?php echo $id; ?>,
					success: function(data) {
						$('.loading').hide();
						if(data.response.status == 'success'){
							window.location.replace("gestion-pdm.php");
						}else{
							$('#errorsBox').show();
							
							if(data.array.email=='null') {
								$("input[name=email]").addClass("borderRed");
								$('#errors').append('<li class="label label-danger margin-right-10">Email</li>');
							} else if(data.array.email=='invalid') {
								$('#emailInvalid').show();
								$('input[name=email]').addClass("borderRed");
								$('#errors').append('<li class="label label-danger margin-right-10">Email</li>');
							} else if(data.array.email=='repeated') {
								$('#emailInvalid').show();
								$('input[name=email]').addClass("borderRed");
								$('#errors').append('<li class="label label-danger margin-right-10">Email déjà utilisé</li>');
							} else {
								$('#emailInvalid').hide();
								$('input[name=email]').removeClass("borderRed");
							}
						}
					}
				});
			});
		</script>

	</body>
</html>