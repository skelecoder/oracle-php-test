<?php include_once 'functions.php'; ?>
<?php
	if(isset($_GET['id'])) {
		$mission_id = htmlentities($_GET['id']);
	}
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<?php include 'meta.php'; ?>

		<?php include 'header.php'; ?>
		<?php 
			$mission = oci_fetch_array(getMissionById($mission_id), OCI_ASSOC+OCI_RETURN_NULLS); 
		?>
		<style>
			
			.stripe-divisor {
				display: block;
				width: 100%;
				height: 20px;
				background: url(./assets/images/stripe-color.png) center center;
			}
			
			.table-left {
				border-radius: 20px 0 0 20px;background: #FBE8D3;border-right: 2px solid white;
			}
			.table-middle {
				background: #FBE8D3;border-right: 2px solid white;
			}
			.table-right {
				border-radius: 0 20px 20px 0;background: #FBE8D3;
			}

		</style>
	</head>

	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">
			<?php include 'menu.php'; ?>
			
			<section class="page-header page-header-xs alternate">
				<div class="container">
					<div class="col-lg-8">
						<h1 class="bold"><?php echo nl2br(stripcslashes($mission['TITLE_FR'])); ?></h1>
						<p><?php echo nl2br(stripcslashes($mission['DESCRIPTION_FR'])); ?></p>
					</div>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="./index.php?lang=<?php echo $locale; ?>">Page d'accueil</a></li>
						<li class="active text-black bold">Recommandations de la mission</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->
			
			<section class="padding-xs" style="background:#ffffff;">
				<div class="fullcontainer">
			
					<div class="row">

						<div class="col-md-3">
							
							<div class="col-md-12">
								<!-- CHECKOUT FINAL MESSAGE -->
								<div class="panel panel-default" style="background:#1B5829;">
									<div class="panel-body text-center">
										<p class="nomargin size-15 uppercase text-white bold">
											NOMBRE DES RECOMMANDATIONS: <span id="rec_count" class="font-lato bold"></span>
										</p>
									</div>
								</div>
								<!-- /CHECKOUT FINAL MESSAGE -->
							</div>
							
							<div class="col-md-12 text-center">
								<div id="chart-sonacos" style="height: 200px; width: 100%;"></div>
								<p class="size-13">Taux de la mise en oeuvre</p>
							</div>
							
						</div>

						<div class="col-md-9">
							<h3><b>Taux cumulé des recommandations</b></h3>
							<div class="progress progress-lg">
								<div class="progress-bar progress-bar-success" style="width: 60%">60%</div>
								<div class="progress-bar progress-bar-warning" style="width: 30%">30%</div>
								<div class="progress-bar progress-bar-danger" style="width: 10%">10%</div>
							</div>
							<div class="col-md-4 text-center">
								<h4 class="margin-bottom-0 text-black"><i class="fa fa-circle margin-right-10" style="color:#5CB85C;"></i> Achevées</h4>
								<p class="margin-top-0 size-30 text-black"><b>6/10</b></p>
							</div>
							<div class="col-md-4 text-center">
								<h4 class="margin-bottom-0 bold text-black"><i class="fa fa-circle margin-right-10" style="color:#F0AD4E;"></i> Partiellement réalisées</h4>
								<p class="margin-top-0 size-30 text-black"><b>3/10</b></p>
							</div>
							<div class="col-md-4 text-center">
								<h4 class="margin-bottom-0 bold text-black"><i class="fa fa-circle margin-right-10" style="color:#D9534F;"></i> Non entamées</h4>
								<p class="margin-top-0 size-30 text-black"><b>1/10</b></p>
							</div>
							
							<h3><b>Recommandations adressées à l’organisme principal contrôlé (SONACOS) :</b></h3>
							
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="text-center bold header-cell-green">Code recommandation</th>
											<th style="width:30%;" class="header-cell-green bold">La recommandation</th>
											<th class="text-center bold header-cell-green">Date de démarrage</th>
											<th class="text-center bold header-cell-green">Date d’achèvement</th>
											<th class="text-center bold header-cell-green">Etat d avancement</th>
											<th class="text-center bold header-cell-green"> Avancement %</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$recommandations = getRecommandationsByMissionId($mission_id);
											while (($recommandation = oci_fetch_array($recommandations, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
										?>
											<tr>
												<td class="table-cell-green text-center bold"><?php echo nl2br(stripcslashes($recommandation['CODE'])); ?></td>
												<td class="table-cell-green">
													<?php echo "<a href='./projets.php?lang=".$locale."&amp;code=".$recommandation['CODE']."'>"; ?>
													<?php echo nl2br(stripcslashes($recommandation['TITLE_FR'])); ?>	</a>											
												</td>
												<td class="table-cell-green text-center size-12 bold">
													<?php echo nl2br(stripcslashes($recommandation['START_DATE'])); ?>
												</td>
												<td class="table-cell-green text-center size-12 bold">
													<?php echo nl2br(stripcslashes($recommandation['END_DATE'])); ?>
												</td>
												<td class="table-cell-green text-center">
													<?php $percentage = $recommandation['PERCENTAGE']; ?>
													<?php list($etat, $label) = ( $percentage == 0 ) ? ['Non entamée','danger']: ( $percentage  == 100 ? ['Achevée','success'] : ['Partiellement réalisée','warning'] ); ?>
													<span class="label label-<?php echo $label; ?>"><?php echo $etat; ?></span>
												</td>
												<td class="table-cell-green">
													<?php echo $percentage; ?> %
													<div class="progress progress-xs">
														<div class="progress-bar progress-bar-<?php echo $label; ?>" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%; min-width: 0em;">
															<span class="sr-only"><?php echo $percentage ?>% Complete</span>
														</div>
													</div>
												</td>
											</tr>
										<?php } ?>
										<?php echo '<script type="text/javascript">' . 'document.getElementById("rec_count").innerHTML = ' . oci_num_rows($recommandations) . ';</script>'; ?>
                  					</tbody>
								</table>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>			
			

			<!-- FOOTER -->
			<?php include 'footer.php'; ?>
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery.canvasjs.min.js"></script>

		<script type="text/javascript" src="assets/js/scripts.js"></script>
		
		<script>
			$(document).ready(function() {
				CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                "#5CB85C",
                "#F0AD4E",
								"#D9534F"
                ]);
				CanvasJS.addColorSet("redShades",
                [//colorSet Array
                "#5CB85C",
                "#D9534F"           
                ]);
				
				
								
				<?php
					$dataPoints_sonacos = json_encode(array( 
						array("label"=>"Achevées", "y"=>2),
						array("label"=>"Partiellement réalisées", "y"=>3),
						array("label"=>"Non entamées", "y"=>1)
					)	, JSON_NUMERIC_CHECK);
				?>
						var chart_sonacos = new CanvasJS.Chart("chart-sonacos",
						{
							title:{
								text: "35%",
								verticalAlign: "center",
								dockInsidePlotArea: true
							},
							backgroundColor: 'transparent',
							animationEnabled: true,
							legend:{
								verticalAlign: "bottom",
								horizontalAlign: "center"
							},
							colorSet: "greenShades",
							data: [
							{
								indexLabelFontSize: 13,
								indexLabelFontFamily: "lato",
								indexLabelFontColor: "black",
								indexLabelPlacement: "outside",
								type: "doughnut",
								startAngle:-90,
								percentFormatString: "#0",
								toolTipContent: "<span> {label} : {y}</span>",
								indexLabel: "{label}: #percent%",
								legendText: "{label}: {y}",
								dataPoints: <?php echo $dataPoints_sonacos; ?>
							}
							]
						});
						chart_sonacos.render();
				
			})
		</script>
	</body>
</html>