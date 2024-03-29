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
	<?php

	/*function includeWithVariables($filePath, $variables = array(), $print = true)
	{
		$output = NULL;
		if (file_exists($filePath)) {
			// Extract the variables to a local namespace
			extract($variables);

			// Start output buffering
			ob_start();

			// Include the template file
			include $filePath;

			// End buffering and return its contents
			$output = ob_get_clean();
		}
		if ($print) {
			print $output;
		}
		return $output;
	}*/

	//Llenando la clase
	require_once 'class/empresa.class.php';
	//Conexion
	$Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
	$Base->set_charset("utf8");
	//Peticion
	$Peticion = 'SELECT * FROM `empresa`';
	$Retorno = $Base->query($Peticion);
	$fila = $Retorno->fetch_assoc();
	//Llenando la clase
	$empresa = new empresa(
		$fila['idEmpresa'],
		$fila['Nombre'],
		$fila['TituloDescripcion'],
		$fila['LogoDesc'],
		$fila['Descripcion'],
		$fila['EventosTitle'],
		$fila['EventosDesc'],
		$fila['UbicTitle'],
		$fila['UbicDesc'],
		$fila['ContactTitle'],
		$fila['ContactDesc'],
		$fila['Slogan'],
		$fila['Telefono'],
		$fila['Direccion'],
		$fila['Email'],
		$fila['Logo_Url']
	);
	?>
	<div id="page-wrapper">
		<?php
		require './assets/php/header.php';
		?>
		<!-- Main -->
		<div id="main" class="wrapper style2">
			<div class="title">SOBRE NOSOTROS</div>
			<div class="container">
				<!-- Content -->
				<div id="content">
					<article class="box post">
						<header class="style1">
							<h2>Nuestra Historia</h2>
							<p>Creando Memorias desde 2021</p>
						</header>
						<div class="feature-list">
							<div class="row">
								<div class="col-6 col-12-medium">
									<section>
										<h3 class=<?php echo "'icon ";
													$empresa->Showlogodesc();
													echo "'"; ?>><?php $empresa->Showtitulodesc(); ?></h3>
										<p><?php $empresa->ShowDescripcion(); ?></p>
									</section>
								</div>
								<div class="col-6 col-12-medium">
									<section>
										<h3></h3>
										<p></p>
										<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a></a>
									</section>
								</div>
							</div>
						</div>
						<ul class="actions special">
								<form id="empresabtn" name="empresabtn">
									<li>
										<a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
									</li>
								</form>
							</ul>
					</article>
				</div>

			</div>
		</div>
		<!-- Highlights -->
		<section id="highlights" class="wrapper style3">
			<div class="title">QUÉ HACEMOS</div>
			<div class="container">
				<div class="row aln-center">
					<div class="col-12">
						<section class="highlight">
							<h3><a href="#"><?php $empresa->Showeventostitle(); ?></a></h3>
							<p class="descrip"><?php $empresa->Showeventosdesc(); ?></p>
						</section>
					</div>
					<div class="row aln-center">
                            <?php 
                                include( 'class/InicioEventos.php');
                                $Consulta = "Select * from fotoseventos limit 3";
                                $Ejecucion = $conexion->query($Consulta);
                                if($Ejecucion)
                                {
                                    while ($fila = $Ejecucion->fetch_assoc())
                                    {
                                        //echo "<div class='col-4 col-12-medium'><section class='highlight'><a href='#'' class='image featured'><img src='data:image/jpeg;base64,". base64_encode($fila['UrlFoto'])."' style='width:100%;'></a></section></div>";
                                        echo "<div class='col-4 col-12-medium'><section class='highlight'><a href='#'' class='image featured'><img src='". ($fila['UrlFoto'])."' style='width:100%;'></a></section></div>";
                                    }
                                }
                            ?> 
                    </div>
				</div>
			</div>
			<ul class="actions special">
					<form id="empresabtn" name="empresabtn">
						<li>
							<a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
						</li>
					</form>
				</ul>
		</section>
		<!--Ubicacion-->
		<section id="highlights" class="wrapper style4">
			<div class="title">DONDE NOS UBICAMOS</div>
			<div class="container">
				<div class="row aln-center">
					<div class="col-6 col-12-medium">
						<h3><a href="#"><?php $empresa->Showubictitle(); ?></a></h3>
						<p class="descrip"><?php $empresa->Showubicdesc(); ?></p>
					</div>
					<div class="col-6 col-12-medium">
						<div id="map"></div>
					</div>
				</div>
				<ul class="actions special">
						<form id="empresabtn" name="empresabtn">
							<li>
								<a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
							</li>
						</form>
					</ul>
			</div>
		</section>
		<?php
		require './assets/php/footer.php';
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