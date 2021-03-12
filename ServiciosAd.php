<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="index.html">WINE & CHAMPAGNE<br>EVENTOS</a></h1>
                <p>¡B I E N V E N I D O S!</p>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="indexAdmin.html">INICIO</a></li>
                    <li>
                        <a href="ServiciosAd.php">NUESTROS SERVICIOS</a>
                        <ul>
                            <li><a href="EditarHeader.php">Editar Header</a></li>
                            <li>
                                <a>Editar Servicios</a>
                                <ul>
                                    <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                                    <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                                    <li><a href="EliminarServicios">Eliminar Servicio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="BaseEventos.html">EVENTOS</a></li>
                    <li><a href="Base.html">QUIENES SOMOS</a></li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- SERVICIOS -->
        <?php
			$matrizBD =  array(
			'0' => 
			array('nombre'=>'Name Servicio 1','descrip'=>'Descripcion1:scbwucdbucbuebckebceh','icono'=>'fa-home'),
			'1' => 
			array('nombre'=>'Name Servicio 2','descrip'=>'Descripcion2:scbwucdbucbuebckebceh','icono'=>'fa-phone'),
			'2' => 
			array('nombre'=>'Name Servicio 3','descrip'=>'Descripcion3:scbwucdbucbuebckebceh','icono'=>'fa-envelope'), 
			'3' => 
			array('nombre'=>'Name Servicio 4','descrip'=>'Descripcion4:scbwucdbucbuebckebceh','icono'=>'fa-home'),
			'4' => 
			array('nombre'=>'Name Servicio 5','descrip'=>'Descripcion5:scbwucdbucbuebckebceh','icono'=>'fa-pen'),
			'5' => 
			array('nombre'=>'Name Servicio 6','descrip'=>'Descripcion6:scbwucdbucbuebckebceh','icono'=>'fa-pen-fancy'));
			require 'class/servicios.php';
			$Servicios = new Servicio();
		?>
        <div id='main' class='wrapper style2'>
            <div class='title'>NUESTROS SERVICIOS</div>
            <div class='container'>
                <header class="style2">
                    <h2>EDITAR SERVICIOS</h2>
                </header>
                <div id='content'>
                    <div class="col-12">
                        <ul class="actions special">
                            <form id="servicesbtn" name="servicesbtn">
                                <li><input type="submit" class="button special style5 large " value="Agregar Servicio"
                                        onclick="document.servicesbtn.action = 'AgregarServicios.php';" /></li>
                                <li><input type="submit" class="button special style5 large"
                                        value="Actualizar Servicios"
                                        onclick="document.servicesbtn.action = 'ActualizarServicios.php';" /></li>
                                <li><input type="submit" class="button special style5 large" value="Eliminar Servicio"
                                        onclick="document.servicesbtn.action = 'EliminarServicios.php';" /></li>

                            </form>
                            <hr>
                        </ul>
                    </div>
                    <br>
                    <article class='box post'>
                        <?php 
		                    $Servicios -> GenerarHeaderServicios('SERVICIOS DE CALIDAD','Para que tus eventos sean únicos y especiales');
		                ?>
                         <ul class="actions special">
                            <li>
                                <button type="submit" class="button special style5 large" value="Editar Header"
                                    onclick="document.servicesbtn.action = 'EditarHeader.php';"><i class ="icon solid fa-edit"></i></button>
                            </li>
                        </ul>
                        <div class='feature-list'>
                            <div class='row'>
                                <?php 
		                            for ($i=0; $i<sizeof($matrizBD); $i++) 
		                            { 
		                            	$Servicios -> setNombre($matrizBD[$i]['nombre']);
		                            	$Servicios -> setDescripcion($matrizBD[$i]['descrip']);
		                            	$Servicios -> setURL_Icono($matrizBD[$i]['icono']);
		                            	$Servicios -> GenerarServicio();
		                            }
		                        ?>
                            </div>
                        </div>
                        <ul class='actions special'>
                            <li><a href='#' class='button style1 large'>Organiza tu Reunión</a></li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <section id="footer" class="wrapper">
            <div class="title">CONTACTANOS</div>
            <div class="container">
                <header class="style1">
                    <h2>Ipsum sapien elementum portitor?</h2>
                    <p>
                        Sed turpis tortor, tincidunt sed ornare in metus porttitor mollis nunc in aliquet.<br />
                        Nam pharetra laoreet imperdiet volutpat etiam feugiat.
                    </p>
                </header>
                <div class="row">
                    <div class="col-6 col-12-medium">

                        <!-- Contact Form -->
                        <section>
                            <form method="post" action="#">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <input type="text" name="name" id="contact-name"
                                            placeholder="Nombre Completo" />
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <input type="text" name="email" id="contact-email"
                                            placeholder="Correo Electronico" />
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" id="contact-message" placeholder="Mensaje"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style1" value="Enviar" /></li>
                                            <li><input type="reset" class="style2" value="Limpiar" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>

                    </div>
                    <div class="col-6 col-12-medium">

                        <!-- Contact -->
                        <section class="feature-list small">
                            <div class="row">
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-home">Mailing Address</h3>
                                        <p>
                                            Untitled Corp<br />
                                            1234 Somewhere Rd<br />
                                            Nashville, TN 00000
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-comment">Social</h3>
                                        <p>
                                            <a href="#">@untitled-corp</a><br />
                                            <a href="#">linkedin.com/untitled</a><br />
                                            <a href="#">facebook.com/untitled</a>
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-envelope">Email</h3>
                                        <p>
                                            <a href="#">info@untitled.tld</a>
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-phone">Phone</h3>
                                        <p>
                                            (000) 555-0000
                                        </p>
                                    </section>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div id="copyright">
                    <ul>
                        <li>&copy; Untitled.</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>
            </div>
        </section>

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