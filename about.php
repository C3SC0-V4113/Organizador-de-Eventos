<!DOCTYPE HTML>
<html>

<head>
	<title>ORGANIZADORA DE EVENTOS</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" />
</head>

<body class="no-sidebar is-preload">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<select name="opciones" id="opciones">
			<option>Admin</option>
			<option>Cliente</option>
		</select>
		<input type="submit" name="enviar" id="enviar" value="Cambiar Rol">
	</form>
	<?php
	$admin = false;
	$permiso;
	if (isset($_POST['enviar'])) {
		$permiso = (isset($_POST['opciones'])) ? $_POST['opciones'] : '';
		if ($permiso == 'Admin') {
			$admin = true;
		} else {
			$admin = false;
		}
	}
	echo "<p>El permiso es : $permiso</p>";
	echo "<p>permiso de admin:" . (bool)$admin . "</p>";

	function includeWithVariables($filePath, $variables = array(), $print = true)
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
	}

	//Llenando la clase
	require 'class/empresa.class.php';
	//Conexion
	$Base = new mysqli('localhost','root','','mydb',3307);
	$Base -> set_charset("utf8");
	//Peticion
	$Peticion='SELECT * FROM `empresa`';
	$Retorno=$Base->query($Peticion);
	$fila=$Retorno->fetch_assoc();
	print_r($fila);
	//Llenando la clase
	$empresa = new empresa($fila['idEmpresa'],$fila['Nombre'],$fila['Descripcion'],$fila['Slogan'],$fila['Telefono'],$fila['Direccion'],$fila['Email'],$fila['Logo_Url']);
	?>
	<div id="page-wrapper">
		<?php
		includeWithVariables('./assets/php/header.php', array('admin' => $admin));
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
										<h3 class="icon solid fa-check">SERIVICIO 1</h3>
										<p><?php $empresa->ShowDescripcion();?></p>
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
						<?php
						if ($admin) {
						?>
							<ul class="actions special">
								<form id="servicesbtn" name="servicesbtn">
									<li>
										<input type="submit" class="button special style5 large" value="Editar Informacion" onclick="document.servicesbtn.action = 'EditarHeader.php';">
									</li>
								</form>
							</ul>
						<?php
						}
						?>
						<!--<ul class="actions special">
									<li><a href="#" class="button style1 large">Organiza tu Reunión</a></li>
									<li><a href="#" class="button style2 large">Más Información</a></li>
								</ul>-->
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
							<h3><a href="#">MOMENTOS INOLVIDABLES</a></h3>
							<p class="descrip">Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis numquam voluptatibus, sapiente sed sint enim deserunt omnis, necessitatibus impedit cupiditate est, magni tempore molestias repellat sequi ipsum error praesentium quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, obcaecati beatae commodi labore earum mollitia provident, rerum officia autem at, libero est in atque quia eaque minus quos ipsam! Aliquid! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia qui, dolorem aperiam quasi in, accusamus beatae vitae ducimus saepe asperiores sapiente possimus iste minus delectus ipsa maxime necessitatibus explicabo autem.</p>
						</section>
					</div>
					<div class="col-4 col-12-medium">
						<section class="highlight">
							<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
						</section>
					</div>
					<div class="col-4 col-12-medium">
						<section class="highlight">
							<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
						</section>
					</div>
					<div class="col-4 col-12-medium">
						<section class="highlight">
							<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
						</section>
					</div>
				</div>
			</div>
			<?php
			if ($admin) {
			?>
				<ul class="actions special">
					<form id="servicesbtn" name="servicesbtn">
						<li>
							<input type="submit" class="button special style5 large" value="Editar Informacion" onclick="document.servicesbtn.action = 'EditarHeader.php';">
						</li>
					</form>
				</ul>
			<?php
			}
			?>
		</section>
		<!--Ubicacion-->
		<section id="highlights" class="wrapper style4">
			<div class="title">DONDE NOS UBICAMOS</div>
			<div class="container">
				<div class="row aln-center">
					<div class="col-6 col-12-medium">
						<h3><a href="#">ESTAMOS CERCA!</a></h3>
						<p class="descrip">Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus voluptates est dolorem totam corrupti suscipit laudantium at, incidunt ipsa. Reprehenderit voluptates tempore similique illo hic nihil corrupti facilis, ad eius!</p>
						<p class="descrip">Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ad est porro minima nemo. Voluptatibus non architecto odit molestiae rem, sint eveniet veniam autem impedit ad inventore alias facere reiciendis. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus incidunt natus magnam, blanditiis sequi eum ut recusandae sed hic voluptatibus neque tempora, numquam expedita aliquam enim molestias facilis corrupti dolore?</p>
					</div>
					<div class="col-6 col-12-medium">
						<div id="map"></div>
					</div>
				</div>
				<?php
				if ($admin) {
				?>
					<ul class="actions special">
						<form id="servicesbtn" name="servicesbtn">
							<li>
								<input type="submit" class="button special style5 large" value="Editar Informacion" onclick="document.servicesbtn.action = 'EditarHeader.php';">
							</li>
						</form>
					</ul>
				<?php
				}
				?>
			</div>
		</section>
		<?php
		includeWithVariables('./assets/php/footer.php', array('admin' => $admin));
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