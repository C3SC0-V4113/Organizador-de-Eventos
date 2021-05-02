<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <?php
    session_start();
    ?>
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="indexAdmin.php">WINE & CHAMPAGNE<br>EVENTOS</a></h1>
                <p>¡B I E N V E N I D O S!</p>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="indexAdmin.php">INICIO</a></li>
                    <li>
                        <a href="ServiciosAd.php">NUESTROS SERVICIOS</a>
                        <ul>
                            <li><a href="EditarHeader.php">Editar Header</a></li>
                            <li>
                                <a href="">Editar Servicios</a>
                                <ul>
                                    <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                                    <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                                    <li><a href="EliminarServicios.php">Eliminar Servicio</a></li>
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

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Eliminar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Eliminar Servicios de la Web</h2>
                            <p>Seleccione el Servicio que desea eliminar:</p>
                        </header>
                        <?php 
                        require 'class/servicios.php';
                        $Servicios = new Servicio();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Servicios order by Nombre asc";
                        $Ejecucion = $Base->query($Consulta);
                        if($Ejecucion->num_rows!=0)
                        {
                            if($Ejecucion)
                            {
                                $i=1;
                                while ($fila = $Ejecucion->fetch_assoc())
                                {
                                    $Datos[$i] = $fila;
                                    $i++;
                                }
                            }  
                        }
                        else 
                        {
                            $Datos[1] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[2] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[3] = array('idServicios' => '','Nombre' => 'Oops!','Descripcion' => '','urlIMG' =>'none');
                            $Datos[4] = array('idServicios' => '','Nombre' => 'Aún no hay servicios registrados en la Base de Datos','Descripcion' => '','urlIMG' =>'none');
                            $Datos[5] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[6] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                        }
                        $Base->close();
                        ?>
                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($Datos);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>

                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="8" onchange="OnlyID(arrayJS[this.value]['idServicios'],arrayJS[this.value]['Nombre'],arrayJS[this.value]['urlIMG'])">
                                <?php 
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                                echo "<option value='".$i."'>";
                                if($Datos[$i]['urlIMG']!="none"){echo "Servicio $i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                                else{}
                                echo $Datos[$i]['Nombre']."</option>";
                            }
                            ?>
                            </select>
                        </form>
                        <hr>
                        <section>
                            <form class="service" id="Delete" name="Delete" method="post"
                                action="RespuestaServicios.php" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style6" value="Eliminar Servicio" id="eliminarS" name="eliminarS" disabled onclick="confirmar('servicio')" /></li>
                                            <li><input type="submit" class="style2" value="Cancelar"
                                                    onclick="document.Delete.action = 'ServiciosAd.php'; cancel=true;" />
                                            </li>
                                            <input type="hidden" id="IdServicios" name="IdServicios" value="-1" readonly required>
                                            <input type="hidden" id="name" name="name" value="-1" readonly required>
                                        </ul>
                                    </div>

                                </div>
                            </form>
                        </section>
                    </article>
                </div>

            </div>
        </div>

        <!-- Highlights -->

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
    <script src="assets/js/ConfirmarSalir.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
    <script src="assets/js/Seguro.js?<?php echo time().".0"; ?>"></script>

</body>

</html>