<?php
	$mission_id = htmlentities($_GET['id']);
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<?php include 'meta.php'; ?>

		<?php include 'header.php'; ?>
		
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
						<h1 class="bold">La SONACOS (Décembre 2019)</h1>
						<p>Il s’agit de la refonte des structures administratives organisationnelles de telle sorte qu’elle permettra aux différents départements ministériels et services administratifs, au niveau central et local, d’assurer la mise en œuvre efficace et performante des politiques publiques et de fournir les services publics en respectant les normes de qualité aux usagers.</p>
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
											NOMBRE DES RECOMMANDATIONS: <span class="font-lato bold">6</span>
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
                    <tr>
                      <td class="table-cell-green text-center bold">REC001</td>
											<td class="table-cell-green">
												<a href="./projets.php?lang=fr&amp;code=REC001">
													 Déployer plus d’efforts pour pouvoir atteindre ou s’approcher des objectifs tracés dans le cadre du PMV en matière de superficie de multiplication												</a>
											</td>
											<td class="table-cell-green text-center size-12 bold">
												Février 2019																							</td>
											<td class="table-cell-green text-center size-12 bold">
												Décembre 2021																							</td>
											<td class="table-cell-green text-center">
																								<span class="label label-danger">
													Non entamée												</span>
											</td>
											<td class="table-cell-green">
												0 %
												<div class="progress progress-xs">
													<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; min-width: 0em; background:#5CB85C;">
														<span class="sr-only">100% Complete</span>
													</div>
												</div>
											</td>
										</tr>
                    <tr>
                      <td class="table-cell-green text-center bold">REC002</td>
											<td class="table-cell-green">
												<a href="./projets.php?lang=fr&amp;code=REC002">
													 Veiller à l’obtention des variétés d’orge répondant aux exigences des multiplicateurs, au choix des régions de production appropriées en plus d’un encadrement  adéquat des multiplicateurs												</a>
											</td>
											<td class="table-cell-green text-center size-12 bold">
												Juin 2019																							</td>
											<td class="table-cell-green text-center size-12 bold">
												Février 2020																							</td>
											<td class="table-cell-green text-center">
																								<span class="label label-warning">
													Partiellement réalisée												</span>
											</td>
											<td class="table-cell-green">
												65 %
												<div class="progress progress-xs">
													<div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; min-width: 0em; background:#F0AD4E;">
														<span class="sr-only">65% Complete</span>
													</div>
												</div>
											</td>
										</tr>
                    <tr>
                      <td class="table-cell-green text-center bold">REC003</td>
											<td class="table-cell-green">
												<a href="./projets.php?lang=fr&amp;code=REC003">
													 Allouer plus d’attention au développement de la multiplication des Fourragères et légumineuses pour concorder avec les objectifs du PMV												</a>
											</td>
											<td class="table-cell-green text-center size-12 bold">
												Novembre 2020																							</td>
											<td class="table-cell-green text-center size-12 bold">
												Décembre 2022																							</td>
											<td class="table-cell-green text-center">
																								<span class="label label-warning">
													Partiellement réalisée												</span>
											</td>
											<td class="table-cell-green">
												80 %
												<div class="progress progress-xs">
													<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; min-width: 0em; background:#F0AD4E;">
														<span class="sr-only">80% Complete</span>
													</div>
												</div>
											</td>
										</tr>
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