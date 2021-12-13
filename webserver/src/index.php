<!DOCTYPE html>
<html>
	<head>
		<?php include 'meta.php'; ?>
		<?php include 'header.php'; ?>
	</head>

	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">
			
			<?php include 'menu.php'; ?>
			
			<hr class="nomargin" style="background:#E6EDD7; height:5px;">

			<!-- HOME -->
			<section style="background:#f0f0f0;">
				<div class="container ">
					<div class="row">
						<div class="col-lg-12 text-center">
							
							<h2 class="bold text-center margin-bottom-20 text-black">SYSTÈME DE SUIVI DES RECOMMANDATIONS</h2>
							
							
						</div>
					</div>
				
					<div class="col-lg-12 margin-bottom-10">

						<div class="box-light" style="background: #373738;"><!-- .box-light OR .box-dark -->
								<div class="row">
									<div class="col-md-7">
										<h4 class="margin-bottom-0" style="color: white;">Année</h4>
									</div>

									<div class="col-md-5">
										<h4 class="margin-bottom-0" style="color: white;">Taux de mise en oeuvre</h4>
									</div>
								</div>

						</div>
					</div>
					
					<!-- 2021 -->
					<div class="col-lg-12 margin-bottom-10">
						<div class="box-light" style="background: #373738;"><!-- .box-light OR .box-dark -->
							<a id="axe-1" href="suivi-by-year.php">
								<div class="row">
									<div class="col-md-2">
										<p class="bold size-30" style="margin-top: 0em; color: white;">2021</p>
									</div>
									<div class="col-md-5">
										<p style="color: white;" class="margin-bottom-0 bold">
											3 recommandations</p>
										<p style="color: white;" class="size-11 margin-top-0 margin-bottom-10">
											<span>
												<i class="fa fa-circle" style="color:#5CB85C;"></i> 1 Achevées
												<i class="fa fa-circle margin-left-20" style="color:#F0AD4E;"></i> 1 Partiellement réalisées
												<i class="fa fa-circle margin-left-20" style="color:#D9534F;"></i> 3 Non entamées
											</span>
										</p>
									</div>
									<div class="col-md-5">
										<div class="progress progress-lg">
                      <div class="progress-bar progress-bar-success" style="width: 60%">60%</div>
											<div class="progress-bar progress-bar-warning" style="width: 20%">20%</div>
											<div class="progress-bar progress-bar-danger" style="width: 20%">20%</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>
			
			<hr class="nomargin" style="background:#E6EDD7; height:5px;">

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
				
				$("#spinner-2019").show();
				$("#spinner-2020").show();
				$("#spinner-2021").show();
				$("#spinner-audit").show();
				$("#spinner-pmea").show();
				$.getJSON('./getGlobal.php', {year: 2019})
					.done(function(data){
						$("#spinner-2019").hide();
						var chart = new CanvasJS.Chart("chart-2019",
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
								dataPoints: data.avancement
							}
							]
						});
						chart.render();
				});
			})
		</script>
	</body>
</html>