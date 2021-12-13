
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>SYSTÈME DE SUIVI DES RECOMMENDATIONS</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="Govright" />		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/dai.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/barchart.css" rel="stylesheet" type="text/css" />

		
		<!-- PAGE LEVEL SCRIPTS -->
		<link href="assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />

			</head>

	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">
			
			
    <?php include 'menu.php'; ?>		
			<hr class="nomargin" style="background:#E6EDD7; height:5px;">

			<!-- HOME -->
			<section class="padding-10" style="background:url('assets/images/demo/wall2.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="./" class="btn btn-link" style="color:white"><i class="fa fa-long-arrow-left"></i> Retour à la page d'accueil</a>
						</div>
						<div class="col-lg-12 text-center">
														<div class="text-center">
								<h2 class="bold" style="color:#f0f0f0;">Taux de mise en œuvre des recommandations pour l'année<br> 2021</h2>
							</div>
							
							<div id="spinner-2019" class="softhide text-white">
								<img src="assets/images/loader.gif" width="40" /> <br>
								chargement de l'avancement des réalisations pour l'année 2019 ...
							</div>
							<div id="chart-2019" style="height: 300px; width: 100%;">40%</div>
							
						</div>
					</div>
					
					<div class="row margin-top-20 margin-bottom-30">
						<div class="col-md-4 text-center">
							<h4 class="margin-bottom-0 text-white"><i class="fa fa-circle margin-right-10" style="color:#5CB85C;"></i> Achevées</h4>
							<p class="margin-top-0 size-30 text-white"><b>1</b></p>
						</div>
						<div class="col-md-4 text-center">
							<h4 class="margin-bottom-0 bold text-white"><i class="fa fa-circle margin-right-10" style="color:#F0AD4E;"></i> Partiellement réalisées</h4>
							<p class="margin-top-0 size-30 text-white"><b>1</b></p>
						</div>
						<div class="col-md-4 text-center">
							<h4 class="margin-bottom-0 bold text-white"><i class="fa fa-circle margin-right-10" style="color:#D9534F;"></i> Non entamées</h4>
							<p class="margin-top-0 size-30 text-white"><b>3</b></p>
						</div>
					</div>
				</div>
			</section>
			
			<hr class="margin-top-0" style="background:#E6EDD7; height:5px;">
			
			<section class="padding-top-20" style="background:#FFFCF9;">
				<div class="container">

					<div class="row" style="margin:auto 0;">

					<div class="col-md-12 margin-bottom-30">

						<h4 class="text-center margin-top-30 margin-bottom-0 bold" style="color:#373738;">
							SUIVI DES RECOMMANDATIONS PAR MISSION
						</h4>
						<hr class="margin-top-10" style="width:200px;background:#007631; height:2px;">

					</div>
						
					<div class="softhide row text-center">		
						
												<a href="./mission.php?id=1&lang=fr" style="color:black;">
							<div class="col-md-3 text-center margin-bottom-40">
																<div dir="ltr" style="width:150px; height:150px;" class="margin-top-30 piechart" data-color="#F7C600" data-size="150" data-percent="81.666666666667" data-width="20" data-animate="1000" data-trackcolor="#E6EDD7">
									<span class="size-30 weight-600 margin-bottom-0">
										<span class="countTo bold font-raleway" data-speed="1000">81.666666666667</span>%
									</span>
								</div>
								<p class="size-13 margin-bottom-0 bold" style="color:#007631;">La SONACOS (Décembre 2021)</p>
							</div>
						</a>
												<a href="./mission.php?id=216&lang=fr" style="color:black;">
							<div class="col-md-3 text-center margin-bottom-40">
																<div dir="ltr" style="width:150px; height:150px;" class="margin-top-30 piechart" data-color="#F7C600" data-size="150" data-percent="18.928571428571" data-width="20" data-animate="1000" data-trackcolor="#E6EDD7">
									<span class="size-30 weight-600 margin-bottom-0">
										<span class="countTo bold font-raleway" data-speed="1000">18.928571428571</span>%
									</span>
								</div>
								<p class="size-13 margin-bottom-0 bold" style="color:#007631;">Mission 2</p>
							</div>
						</a>
												
						
					</div>
						
					<div class="row">
						<a href="./mission.php?id=1&lang=fr" style="color:black;">
							<div class="col-lg-4 text-center">
								<div id="chart-sonacos" style="height: 200px; width: 100%;"></div>
								<p class="size-13 margin-bottom-0 bold" style="color:#007631;">SONACOS<br>(Décembre 2021)</p>
							</div>
						</a>
						<a href="./mission.php?id=21&lang=fr" style="color:black;">
							<div class="col-lg-4 text-center">
								<div id="chart-tourisme" style="height: 200px; width: 100%;"></div>
								<p class="size-13 margin-bottom-0 bold" style="color:#007631;">Mission 2</p>
							</div>
						</a>
					</div>

				</div>
					
				</div>
			</section>

			<!-- FOOTER -->
			<footer id="footer">
				
	<div class="copyright text-center padding-10" style="background:#373738;">
		<div class="container text-white text-center bold font-lato width-400">
			<img src="assets/images/logo.png" />
		</div>
	</div>
</footer>			<!-- /FOOTER -->

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
                "#F0AD4E",
                "#D9534F"           
                ]);
				
				$("#spinner-2019").show();
				$("#spinner-2020").show();
				$("#spinner-2021").show();
				$("#spinner-audit").show();
				$("#spinner-pmea").show();
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
								indexLabelFontColor: "white",
								indexLabelPlacement: "outside",
								type: "doughnut",
								startAngle:-90,
								percentFormatString: "#0",
								toolTipContent: "<span> {label} : {y}</span>",
								indexLabel: "{label}: #percent%",
								legendText: "{label}: {y}",
								dataPoints: [{"label":"Achev\u00e9es","y":6},{"label":"Partiellement r\u00e9alis\u00e9es","y":4},{"label":"Non entam\u00e9es","y":3}]							}
							]
						});
						chart.render();
								
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
								dataPoints: [{"label":"Achev\u00e9es","y":2},{"label":"Partiellement r\u00e9alis\u00e9es","y":3},{"label":"Non entam\u00e9es","y":1}]							}
							]
						});
						chart_sonacos.render();
								
										var chart_tourisme = new CanvasJS.Chart("chart-tourisme",
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
								dataPoints: [{"label":"Achev\u00e9es","y":4},{"label":"Partiellement r\u00e9alis\u00e9es","y":1},{"label":"Non entam\u00e9es","y":2}]							}
							]
						});
						chart_tourisme.render();
			})
		</script>
	</body>
</html>