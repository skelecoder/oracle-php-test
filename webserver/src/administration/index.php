<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Système de suivi des recommandations</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<div class="padding-15">

			<div class="login-box">

				<!-- login form -->
				<form method="post" class="sky-form boxed">
					<header><i class="fa fa-users"></i> Connexion</header>

					
					<div id="invalid" class="alert alert-danger noborder text-center weight-400 nomargin noradius" hidden="true">
						Email ou Mot de passe invalide
					</div>

					<!--
					<div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
						Account Inactive!
					</div>

					<div class="alert alert-default noborder text-center weight-400 nomargin noradius">
						<strong>Too many failures!</strong> <br />
						Please wait: <span class="inlineCountdown" data-seconds="180"></span>
					</div>
					-->

					<fieldset>	
					
						<section>
							<label class="label">Nom d'utilisateur</label>
							<label class="input">
								<i class="icon-append fa fa-envelope"></i>
								<input name="username" type="text">
								<span class="tooltip tooltip-top-right">Nom d'utilisateur</span>
							</label>
						</section>
						
						<section>
							<label class="label">Mot de passe</label>
							<label class="input">
								<i class="icon-append fa fa-lock"></i>
								<input name="password" type="password">
								<b class="tooltip tooltip-top-right">Tapez votre mot de passe</b>
							</label>
						</section>

					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary pull-right">Se connecter</button>
						<!--<div class="forgot-password pull-left">
							<a href="#">Mot de passe oublié?</a>
						</div>-->
					</footer>
				</form>
				<!-- /login form -->

			</div>

		</div>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		
		<script>
			$('form').submit(function(ev) {
					ev.preventDefault();
					$.ajax({
						type: 'POST',
						url: 'connexion.php',
						data: $('form').serialize(),
						before: function(){
							$('.spinner').show();
						},
						success: function(data) {
							$('#invalid').attr("hidden", true)
							if(data.status == 'success'){
								window.location=data.url;
							}else{
								$('#invalid').attr("hidden", false);
							}
						}
					});
			});
		</script>
	</body>
</html>