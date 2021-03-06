<?php include_once 'functions.php'; ?>
<?php	
	if(isset($_GET['id'])) {
		$recommandation_id = htmlentities($_GET['id']);
	}
?>
<?php
/*header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Report.doc");
*/
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<?php include 'meta.php'; ?>
		<?php include 'header.php'; ?>
		<?php 
			$recommandation = oci_fetch_array(getRecommandationById($recommandation_id), OCI_ASSOC+OCI_RETURN_NULLS); 
		?>

		<style>
			.amcharts-chart-div > a {
					display: none !important;
			}
		</style>
	</head>

	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">
			<?php include 'menu.php'; ?>
			
			<!-- 
				PAGE HEADER 

				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
								.page-header-xlg= 130px margins
					.dark		= dark page header
					.light		= light page header
			-->
			<section class="page-header page-header-xs alternate">
				<div class="container">

					<h4 class="nomargin">
						<span class="bold" style="color:#000;">
						<u>Code recommandation:</u>
						</span>
						<span class="font-lato bold text-black"><?php echo $recommandation['CODE']; ?></span>
					</h4>
					<h4 class="width-700 nomargin" style="color:#000;"><span class="bold" style="color:#000;">
						<u>La recommandation:</u> </span><?php echo nl2br(stripcslashes($recommandation['TITLE_FR'])); ?></h4>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="./index.php?lang=<?php echo $locale; ?>">Page d'accueil</a></li>
						<li><a href="./axes.php?axe=1&lang=<?php echo $locale; ?>">La SONACOS (D??cembre 2019)</a></li>
						<li class="active text-black bold"><?php echo $recommandation['CODE']; ?></li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->
			
			<section class="nopadding margin-top-20" style="background:#FFFCF9;">
				<div class="container">
						
					<div class="row">		
						
						<div class="col-lg-12 padding-20">
							<div class="row padding-bottom-20">	
								<div class="col-md-4 text-center" style="padding: 0 0 0 10px !important;">
									<?php $percentage = $recommandation['PERCENTAGE']; ?>
									<div dir="ltr" style="width:150px; height:150px;" class="margin-top-10 piechart" data-color="<?php if($percentage < 100){echo '#F0AD4E'; }else{echo '#007631';} ?>" data-size="150" data-percent="<?php echo $percentage; ?>" data-width="15" data-animate="1000" data-trackcolor="#E7EED8">
										<span class="size-25 font-lato weight-600 margin-bottom-0 text-black">
											<span class="countTo bold font-raleway text-black" data-speed="1000"><?php echo $percentage; ?></span>%
										</span>
									</div>
									<p class="size-13 margin-bottom-0 bold text-black">Avancement de la recommendation</p>
								</div>
								<div class="col-md-8" style="color:#007631;">
									
									<div class="row padding-bottom-20">	
										<div class="col-xs-6 text-center">
											<i class=""><img width="25" class="margin-bottom-10" src="assets/images/start_date.png" /></i>
											<br>
											<p class="nomargin text-primary bold">Date de d??marrage pr??visionnelle</p>
											<div dir="ltr" class="label label-primary text-white font-lato bold">
												<?php echo $recommandation['START_DATE']; ?>
											</div>
										</div>
										<div class="col-xs-6 text-center">
											<i class=""><img width="25" class="margin-bottom-10" src="assets/images/end_date.png" /></i>
											<br>
											<p class="nomargin text-primary bold">Date d???ach??vement pr??visionnelle</p>
											<div class="label label-success text-white font-lato bold">
												<?php echo $recommandation['END_DATE']; ?>
											</div>
										</div>
									</div>
									
									<div class="row margin-top-20" style="border-top: 5px solid #E7EED8;">	
										<div class="col-md-8 col-md-offset-2 text-center" style="background:#E7EED8; border-radius:0 0 40px 40px;">
											<div class="rectangle absolute" style="top:2px;<?php if($locale=='ar'){echo 'right';}else{echo 'left';} ?>:30px;"></div>
											<h5 class="nomargin uppercase" style="color:#007631;">R??SULTATS ESCOMPT??S</h5>
										</div>
										<div class="col-md-12 padding-20">
											<?php if($recommandation['ESCOMPTE_FR'] == ''){echo '<div class="alert alert-default alert-mini">N??ant</div>'; }else{echo nl2br(stripcslashes($recommandation['ESCOMPTE_FR']));} ?>
										</div>
									</div>

									<div class="row" style="border-top: 5px solid #E7EED8;">	
										<div class="col-md-8 col-md-offset-2 text-center" style="background:#E7EED8; border-radius:0 0 40px 40px;">
											<div class="rectangle absolute" style="top:2px;<?php if($locale=='ar'){echo 'right';}else{echo 'left';} ?>:30px;"></div>
											<h5 class="nomargin uppercase" style="color:#007631;">R??SULTATS OBTENUS</h5>
										</div>
										<div class="col-md-12 padding-20">
											<?php if($recommandation['OBTENU_FR'] == ''){echo '<div class="alert alert-default alert-mini">N??ant</div>'; }else{echo nl2br(stripcslashes($recommandation['OBTENU_FR']));} ?>
										</div>
									</div>

									<div class="row" style="border-top: 5px solid #E7EED8;">	
										<div class="col-md-8 col-md-offset-2 text-center" style="background:#E7EED8; border-radius:0 0 40px 40px;">
											<div class="rectangle absolute" style="top:2px;<?php if($locale=='ar'){echo 'right';}else{echo 'left';} ?>:30px;"></div>
											<h5 class="nomargin uppercase" style="color:#007631;">OBSERVATIONS</h5>
										</div>
										<div class="col-md-12 padding-20">
											<?php if($recommandation['OBSERVATIONS_FR'] == ''){echo '<div class="alert alert-default alert-mini">N??ant</div>'; }else{echo nl2br(stripcslashes($recommandation['OBSERVATIONS_FR']));} ?>
										</div>
									</div>

									<div class="softhide row" style="border-top: 5px solid #E7EED8;">	
										<div class="col-md-8 col-md-offset-2 text-center" style="background:#E7EED8; border-radius:0 0 40px 40px;">
											<div class="rectangle absolute" style="top:2px;<?php if($locale=='ar'){echo 'right';}else{echo 'left';} ?>:30px;"></div>
											<h5 class="nomargin uppercase" style="color:#007631;">DOCUMENTS JUSTIFICATIFS</h5>
										</div>
										<div class="col-md-12 padding-20">
											<span class="small bold" style="background:#007631;color:white;padding:5px;margin:5px;line-height:2.7em;border-radius:5px;">
												<i class="fa fa-file-text-o margin-right-10"></i> Titre document 1
											</span>
											<span class="small bold" style="background:#007631;color:white;padding:5px;margin:5px;line-height:2.7em;border-radius:5px;">
												<i class="fa fa-file-text-o margin-right-10"></i> Titre document 2
											</span>
											<span class="small bold" style="background:#007631;color:white;padding:5px;margin:5px;line-height:2.7em;border-radius:5px;">
												<i class="fa fa-file-text-o margin-right-10"></i> Titre document 3
											</span>
											<span class="small bold" style="background:#007631;color:white;padding:5px;margin:5px;line-height:2.7em;border-radius:5px;">
												<i class="fa fa-file-text-o margin-right-10"></i> Titre document 4
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>

				</div>
			</section>
			
			<hr class="nomargin" style="background:#E7EED8; height:5px;">
			
			<section class="padding-top-0" style="background:#FFFCF9;">
				<div class="container">
					
					<div class="row" style="margin:auto 0;">
						<div class="col-md-6 col-md-offset-3 text-center" style="background:#E7EED8; border-radius:0 0 40px 40px;">
							<div class="rectangle absolute" style="top:2px;<?php if($locale=='ar'){echo 'right';}else{echo 'left';} ?>:30px;"></div>
							<h5 class="nomargin uppercase" style="color:#007631;">Calendrier effectif de mise en ??uvre</h5>
						</div>
					</div>
					
					<div class="row margin-top-40">
						<div class="col-md-4">
							<p class="nomargin"><b>Ressources non budg??taires allou??es:</b></p>
							<?php echo nl2br(stripcslashes($recommandation['RESSOURCES'])); ?>
						</div>
						<div class="col-md-4">
							<p class="nomargin"><b>Parties impliqu??es et responsable de la mise en ??uvre:</b></p>
							<?php echo nl2br(stripcslashes($recommandation['RESPONSABLE'])); ?>
						</div>
						<div class="col-md-4">
							<p class="nomargin"><b>Actions entreprises par l???organisme pour l???impl??mentation des recommandations:</b></p>
							<?php echo nl2br(stripcslashes($recommandation['ACTIONS'])); ?>
						</div>
					</div>
					
					<div class="row margin-top-40">

						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-hover table-vertical-middle">
									<thead>
										<tr>
											<th style="width:35%;" class="header-cell-green">Consistance (d??tail) de l???action</th>
											<th style="width:15%;" class="text-center header-cell-green">Date de d??marrage</th>
											<th style="width:15%;" class="text-center header-cell-green">Date d???ach??vement constat??e ou estim??e</th>
											<th style="width:10%;" class="header-cell-green">Budget allou??</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$actions = getActionsByRecommandationId($recommandation['ID']);
											while (($action = oci_fetch_array($actions, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
										?>
											<tr>
												<td class="table-cell-green"><?php echo nl2br(stripcslashes($action['TITLE_FR'])); ?></td>
												<td class="table-cell-green text-center size-12 bold"><?php echo $action['START_DATE']; ?></td>
												<td class="table-cell-green text-center size-12 bold"><?php echo $action['END_DATE']; ?></td>
												<td class="table-cell-green"><?php echo nl2br(stripcslashes($action['BUDGET_FR'])); ?></td>
											</tr>
										<?php } ?>
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

		<script type="text/javascript" src="assets/js/scripts.js"></script>
		<script>
			$(document).ready(function(){
				$.getJSON("getProjectFinancement.php", { projet_id : <?php echo $projet['id']; ?>, locale :'<?php echo $locale; ?>'}, function(result){
					AmCharts.makeChart("chartdiv",
						{
							"type": "pie",
							"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]] DHS</b> ([[percents]]%)</span>",
							"innerRadius": "60%",
							"labelRadius": 50,	
							"fontSize": 15,
							"maxLabelWidth": 400,
							"pullOutRadius": "30%",
							"percentPrecision": 0,
							"labelText": "[[title]]: %[[percents]]",
							"labelRadius": 20,
							"titleField": "category",
							"valueField": "column",
							"theme": "light",
							"allLabels": [],
							"balloon": {},
							"titles": [],
							/*"legend": {
								"enabled": true,
								"align": "center",
								"markerType": "circle"
							},*/
							"dataProvider": result.resultat
						}
					);
				});
			});
		</script>
		
	</body>
</html>
