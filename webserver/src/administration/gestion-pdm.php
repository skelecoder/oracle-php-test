<?php include_once 'checking-admin.php'; ?>

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
					<h1>Liste des porteurs de missions</h1>
					<a href="./new-pdm.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"> </i>Ajouter un nouveau porteur de mission</a>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">

						<div class="col-md-12">
						
							<!-- ------ -->
							<div class="panel panel-default">

								<div class="panel-body">

									<div class="table-responsive nomargin">
											<table class="table table-bordered table-striped table-vertical-middle">
											<thead>
												<tr>
													<th>Nom complet</th>
													<th>Email</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$users = getUsersByType('PDM');
													while (($user = oci_fetch_array($users, OCI_ASSOC)) != false) {
												?>
												<tr>
													<td><?php echo $user['NOM']; ?></td>
													<td><?php echo $user['EMAIL']; ?></td>
													<td class="text-center">
														<a class="btn btn-primary btn-xs" href="user-pdm.php?id=<?php echo $user["ID"]; ?>">
															<span><i class="fa fa-edit"> </i>Modifier</span>
														</a>
														<a class="btn btn-danger btn-xs" onclick="deleteUser(<?php echo $user['ID']; ?>);">
															<span><i class="fa fa-trash"> </i>Supprimer</span>
														</a>
													</td>
												</tr>
												<?php
													}
												?>
											</tbody>
										</table>

									</div>

								</div>

							</div>
							<!-- /----- -->

						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->
			
			<!-- Delete PROJECT Modal >-->
			<div id="delete-modal" data-id="" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">

						<!-- header modal -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="mySmallModalLabel">حذف المستعمل</h4>
						</div>

						<!-- body modal -->
						<div class="modal-body">
							هل تريد حذف المستعمل؟
							
							<div class="col-md-12 text-center">
								<img class="spinner img-reponsive softhide" src="assets/images/spinner.gif" />
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">إلغاء</button>
							<button onclick="confirmDelete();" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> تأكيد الحذف</button>
						</div>

					</div>
				</div>
			</div>
			<!-- Small Modal >-->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<script>
			var deleteUser = function(actionId) {
				$("#delete-modal").attr('data-id', actionId);
				$('#delete-modal').modal('toggle');
			};

			var confirmDelete = function() {
				var actionId = $("#delete-modal").attr('data-id');

				$.ajax({
					url: 'delete-user.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id:actionId
					},
					success: function(data) {
						if(data.response.status == 'success'){
							location.reload(true);
						}else{

						}
					}
				});
				$('.spinner').show();
			};
		</script>

	</body>
</html>