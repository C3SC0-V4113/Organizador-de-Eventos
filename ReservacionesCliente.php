<!DOCTYPE HTML>
<html>

<head>
	<title>Reservaciones - Wine & Champagne Eventos</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" media="all" />
	<link rel="stylesheet" href="assets/css/contraste.css">

	<?php
    session_start();
    ?>

	<!-- picker-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time() . ".0"; ?>" rel="stylesheet">
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
        <section id="highlights" class="wrapper style3">
            <div class="title">Tus Reservaciones</div>
            <div class="container">
                <article class="box post">
				<div class="feature-list">
                            <div class="row">
                                <section>
                                    <div class="col-xs-12">
                                        <?php 
										$Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
										$Base->set_charset("utf8");
										require 'class/reserva.php';
										$Eventos = new Reserva();
										?>
                                        <form action="class/reserva.php" method="post">
                                            <div class="row gtr-50">
                                            <!--<input type="hidden" name="idss" id="idss" value="<?php //echo $id ?>">-->
                                                <div class="col-xs-12" id="tabla">
                                                    <table class="table" style="color: white">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Fecha</th>
                                                                <th colspan="2">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
															<?php echo $Eventos->TablaReservas($_SESSION['IdUsuario']); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                if (isset($_SESSION['mensaje'])) :
                                                ?>
                                                    <div class="alert col-xs-12 alert-<?php echo $_SESSION['msg_type'] ?>">
                                                        <?php
                                                        echo $_SESSION['mensaje'];
                                                        unset($_SESSION['mensaje']);
                                                        ?>
                                                    </div>
                                                <?Php endif; ?>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                </article>
            </div>
        </section>
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
	
</body>

</html>