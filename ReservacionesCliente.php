<!DOCTYPE HTML>
<html>

<head>
	<title>Sobre Nosotros - Wine & Champagne Eventos</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" media="all" />
	<link rel="stylesheet" href="assets/css/contraste.css">
</head>

<body class="no-sidebar is-preload">
	<div id="page-wrapper">
		<?php
		require './assets/php/headerCli.php';
		?>
		<!-- Main -->
		<div id="main" class="wrapper style2">
			<div class="title">EXPERTOS EN ORGANIZACION</div>
			<div class="container">
				<!-- Content -->
				<div id="content">
					<article class="box post">
						<header class="style1">
							<h2>Con nosotros tú evento está seguro</h2>
						</header>
						<div class="feature-list">
							<div class="row">
								<div class="col-12 col-12-medium">
									<section>
										<h3></h3>
										<p>Somos los indicados para crear hermosas memorias que durarán toda la vida a tu lado, con un pequeño formulario registra tú reservación</p>
									</section>
									<ul class="actions special">
										<form id="servicesbtn" name="servicesbtn">
											<a href="./AgregarReservacion.php">
												<li>
													<input type="button" class="button special style5 large" value="RESERVA YA!" onclick="document.servicesbtn.action = 'AgregarReservacion.php';">
												</li>
											</a>
										</form>
										<hr>
									</ul>
								</div>
							</div>
						</div>
					</article>
				</div>

			</div>
		</div>
		<!-- Highlights -->
		<!--<section id="highlights" class="wrapper style3">
			<div class="title">QUÉ HACEMOS</div>
			<div class="container">
				<div class="row aln-center">
					<div class="col-12">
						<section class="highlight">
							<h3><a href="#"></a></h3>
							<p class="descrip"></p>
						</section>
					</div>
					<div class="row aln-center">
                    </div>
				</div>
			</div>
		</section>-->
		<!--Ubicacion-->
		<!--<section id="highlights" class="wrapper style4">
			<div class="title">DONDE NOS UBICAMOS</div>
			<div class="container">
				<div class="row aln-center">
					<div class="col-6 col-12-medium">
						<h3><a href="#"></a></h3>
						<p class="descrip"></p>
					</div>
				</div>
			</div>
		</section>-->
		<?php
		require './assets/php/footerCli.php';
		?>
	</div>
	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/googleapi.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>

</html>