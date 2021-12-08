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
					<h1>Liste des recommandations</h1>
					<ol class="breadcrumb">
						<li class="active">Liste des recommandations</li>
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
											<strong>Recommandations</strong>
										</span>
									</div>
									<!-- panel content -->
									<div class="panel-body">
										<table id="engagements" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th style="width:150px;" class="header-cell">Code</th>
													<th style="width:40%;" class="header-cell">Titre</th>
													<th class="text-center header-cell">Avancement</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$recommandations = getRecommandations();
													while (($recommandation = oci_fetch_array($recommandations, OCI_ASSOC)) != false) {
												?>
												<tr>
													<td class="table-cell"><?php echo $recommandation['CODE']; ?></td>
													<td class="table-cell"><?php echo $recommandation['TITLE_FR']; ?></td>
													<td class="table-cell" class="text-center">
														<?php $percentage = $recommandation['PERCENTAGE']; ?>
														<?php echo $percentage; ?> %
														<div class="progress progress-xs">
															<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%; min-width: 0em;">
																<span class="sr-only"><?php echo $percentage; ?>% Complete</span>
															</div>
														</div>
													</td>
													<td><a href="./recommandation-pf.php?id=<?php echo $recommandation['ID']; ?>" class="btn btn-xs btn-primary">Détail</a></td>
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

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

	</body>
</html>