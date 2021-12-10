			<?php

			function active($currect_page){
				$url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
				$url = end($url_array);  
				if(strpos($url,$currect_page) !== false){
						echo 'active'; //class name in css 
				} 
			}
			?>
			<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				
				<nav id="sideNav"><!-- MAIN MENU -->
				
					
					<ul class="nav nav-list">
						
						<li class="<?php active('recommandations.php');?>">
							<a href="./recommandations.php">
								<span>Recommandations</span>
							</a>
						</li>
						<li class="<?php active('missions.php');?>">
							<a href="./missions.php">
								<span>Missions</span>
							</a>
						</li>
					</ul>

					

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>

			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header" style="background-color: #00aeef;">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left">
					<img src="../assets/images/logo.png" alt="admin panel" height="92%" />
				</span>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="" height="34" /> 
								<span class="user-name">
									<span class="hidden-xs" style="color:white;">
										<span style="text-transform: uppercase;">PF</span> <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">
								<li><!-- logout -->
									<a href="./pass_change.php"><i class="fa fa-shield"></i> <span>تغيير كلمة السر</span></a>
								</li>
								<li><!-- logout -->
									<a href="./logout.php"><i class="fa fa-power-off"></i> خروج</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->

			<?php
				$months = array(
					"January" 	=> "يناير",
					"February" 	=> "فبراير",
					"March" 		=> "مارس",
					"April" 		=> "أبريل",
					"May" 			=> "مايو",
					"June" 			=> "يونيو",
					"July" 			=> "يوليو",
					"August" 		=> "غشت",
					"September" => "شتنبر",
					"October" 	=> "أكتوبر",
					"November" 	=> "نوفمبر",
					"December" 	=> "دجنبر"
				);
			?>