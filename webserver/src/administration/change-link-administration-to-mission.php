<?php include_once 'functions.php'; ?>

<?php	
	if(isset($_GET['id'])) {
		$id = htmlentities($_GET['id']);
    $missions_administrations = getAdministrationsById($id);
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
					<h1>Modifier l'organisme controlé</h1>
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
											<strong>Mission: <?php echo stripcslashes($mission_id_administration_id['TITRE_MISSION']); ?></strong>
										</span>
									</div>

                  <form id="mission-form" class="form-horizontal" method="POST">
									  <fieldset>
                      <!-- panel content -->
                      <div class="panel-body">
                        <h4><?php echo stripcslashes($mission_id_administration_id['TITRE_ADMIN']); ?></h4>
                        <?php
                          $administrations = getAdministrationsByNiveau(1);
                          while (($administration = oci_fetch_array($administrations, OCI_ASSOC)) != false) {
                        ?>
                        <div>
                          <input type="radio" value="<?php echo $administration['ID']; ?>" name="administration"> <?php echo stripcslashes($administration['TITLE_FR']); ?> <a onclick="showSubAdmins(<?php echo $administration['ID']; ?>)"><i class="fa fa-plus"></i></a>
                          <ul id="sub-admin-<?php echo $administration['ID']; ?>">
                          </ul>
                        </div>
                        <?php } ?>
                      </div>
                      <!-- / panel content -->

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

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script>
			var showSubAdmins = function(id) {
				$.ajax({
					url: 'get-sous-administrations-by-id.php',
					type: 'GET',
					data: {
            id: id
          },
					beforeSend: function(){
						$('.spinner').show();
					},
					success: function(data) {
						$('.spinner').show();
						$('#sub-admin-'+id).html(data);
					}
				});
			};
      $('form').submit(function(ev) {
				ev.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'update-missionId-administrationId.php',
					data: $('form').serialize()+"&id="+<?php echo $id; ?>,
					success: function(data) {
						if(data.response.status == 'success'){
							_toastr("mission modifiée","top-right","success",false);
						}else{
							_toastr("Erreur","top-right","danger",false);
						}
					}
				});
			});
			
		</script>

	</body>
</html>