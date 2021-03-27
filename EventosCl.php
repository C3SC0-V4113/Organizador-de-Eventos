<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
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
                                <a href="">Editar "Tipos de Eventos"</a>
                                <ul>
                                    <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                                    <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                                    <li><a href="EliminarServicios.php">Eliminar Servicio</a></li>>
                                </ul>
                                <a href="">Editar "Eventos"</a>
                                    <li><a href="Nuestros_Eventos.php">Agregar "Nuestros Eventos"</a></li>
                                    <li><a href="Actualizar_Eventos">Actualizar "Nuestros Eventos"</a>
                                    <li><a href="Eliminar_Eventos">Eliminar "Nuestros Eventos"</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="BaseEventos.html">EVENTOS</a></li>
                    <li><a href="Base.html">QUIENES SOMOS</a></li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- EVENTOS -->
        <?php       
			
		?>
        <section id="highlights" class="wrapper style2">
					<div class="title">NUESTROS EVENTOS</div>
                    
					<div class="container">
                <div class="content">
                <div class="box post">
                <?php 
                        require 'class/Events.php';
                        $EventosM = new MetodosEventos();
		                $EventosM -> GenerarHeaderEventos('EVENTOS EXTRAORDINARIOS','Para que tus eventos sean únicos y especiales');
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
		                ?>
                </div>
                </div>
						<div class="row aln-center">
                        <?php 
                                $Consulta = "Select idEventos,IdTipoEvento,Nombre,fecha,Lugar,Cliente,substring(Descripcion,1,95) as Descripcion from Eventos order by idEventos desc";
                                $Ejecucion = $Base->query($Consulta);
                                $Consulta2 = "Select * from tipoevento";
                                $Ejecucion2 = $Base->query($Consulta2);
                                
                                if($Ejecucion2->num_rows!=0)
                                {
                                    while($tipos = $Ejecucion2->fetch_assoc())
                                    {
                                        $todostipos[$tipos['idTipoEvento']]=$tipos;
                                    }
                                }
                                if($Ejecucion->num_rows!=0)
                                {
                                    if($Ejecucion)
                                    {
                                        while ($fila = $Ejecucion->fetch_assoc())
                                        {
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM -> ExtraerTipo($todostipos[$fila['IdTipoEvento']]);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que aún no hay servicios registrados.</p><hr></header>";
                                }
                                
                                $Base -> close();          
		                        ?>
						</div>
					</div>
				</section>

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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>

</body>

</html>