<?php include_once 'functions.php'; ?>

<?php
	function setLanguage($lang) {
		$locale = $lang;
		$query = $_GET;
		// replace parameter(s)
		$query['lang'] = $lang;
		// rebuild url
		$query_result = http_build_query($query);
		// new link
		return $_SERVER['PHP_SELF'].'?'.$query_result;
	}
?>

<div id="header" class="clearfix dark header-md sticky" style="background:#373738;">
	
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo pull-left" href="./">
							<img class="img-responsive" src="assets/images/logo.png" alt="" />
						</a>

						<div class="navbar-collapse pull-right nav-main-collapse collapse">
							<nav class="nav-main">

								<ul id="topMain" class="nav nav-pills nav-main" style="background:#373738!important;">
									<li>
										<a class="text-white" href="./index.php?lang=<?php echo $locale; ?>">
											Acceuil
										</a>
									</li>
									
									<!--<li>
										<a href="./admin/login.php">
											<button class="size-13 label label-primary"><i class="fa fa-user"></i> se connecter</button>
										</a>
									</li>-->
								</ul>

							</nav>
						</div>

					</div>
				</header>
			</div>