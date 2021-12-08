<!-- mobile settings -->
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

		<?php 
			define('DEFAULT_LOCALE','fr');
			$locale = (isset($_GET['lang']))? $_GET['lang'] : DEFAULT_LOCALE;
			if($locale=="ar") {
		?>
		<!-- RTL -->
		<link href="assets/plugins/bootstrap/RTL/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/bootstrap/RTL/bootstrap-flipped.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout-RTL.css" rel="stylesheet" type="text/css" />
		<!-- ARABIC FONT -->
		
		<link href="assets/css/arabic.css" rel="stylesheet" type="text/css" />
		<?php
			}
		?>

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />

		<?php
		if($locale == 'ar') {
			$months = array(
					"Jan" => "يناير",
					"Feb" => "فبراير",
					"Mar" => "مارس",
					"Apr" => "أبريل",
					"May" => "ماي",
					"Jun" => "يونيو",
					"Jul" => "يوليوز",
					"Aug" => "غشت",
					"Sep" => "شتنبر",
					"Oct" => "أكتوبر",
					"Nov" => "نوفمبر",
					"Dec" => "دجنبر"
			);
		}else{
			$months = array(
					"Jan" => "Janvier",
					"Feb" => "Février",
					"Mar" => "Mars",
					"Apr" => "Avril",
					"May" => "Mai",
					"Jun" => "Juin",
					"Jul" => "Juillet",
					"Aug" => "Août",
					"Sep" => "Séptembre",
					"Oct" => "Octobre",
					"Nov" => "Novembre",
					"Dec" => "Décembre"
			);
		}
		?>