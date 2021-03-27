<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time().".0"; ?>" rel="stylesheet">



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
                    </li>
                    <li><a href="EventosAd.php">EVENTOS</a>
                        <ul>
                            <li>
                                <a href="EventosAd.php">Editar Eventos</a>
                                <ul>
                                    <li><a href="AgregarEvento.php">Agregar Eventos</a></li>
                                    <li><a href="ActualizarEvento.php">Actualizar Eventos</a></li>
                                    <li><a href="EliminarEventos.php">Eliminar Eventos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="Base.html">QUIENES SOMOS</a></li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Eliminar Eventos</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Eliminar Eventos de la Web</h2>
                            <p>Seleccione el Evento que desea modificar:</p>
                        </header>
                        <?php 
                        require 'class/Events.php';
                        $Eventos = new MetodosEventos();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Eventos order by Nombre asc";
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
                            $Datos[1] = array('idEventos' => '','Nombre' => '','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                            $Datos[2] = array('idEventos' => '','Nombre' => '','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                            $Datos[3] = array('idEventos' => '','Nombre' => 'Oops!','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                            $Datos[4] = array('idEventos' => '','Nombre' => 'Aún no hay servicios registrados en la Base de Datos','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                            $Datos[5] = array('idEventos' => '','Nombre' => '','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                            $Datos[6] = array('idEventos' => '','Nombre' => '','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'Cliente'=>"none");
                        }
                        ?>
                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($Datos);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>
                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="7"
                                onchange="EliminarEvento(arrayJS[this.value]['idEventos'],arrayJS[this.value]['Cliente'],arrayJS[this.value]['Nombre'])">
                                <?php 
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                              echo "<option value='".$i."'>";
                              if($Datos[$i]['Lugar']!="none"){echo "Evento $i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                              else{}
                              echo $Datos[$i]['Nombre']."</option>";
                            }
                            ?>
                            </select>
                        </form>


                        <section>
                            <div class="col-12">
                                <ul class="actions">
                                    <form id="Delete" name="Delete" method="post" action="RespuestaEventos.php">
                                        <li><input type="submit" id="EliminarE" name="EliminarE" class="style5"
                                                value="Eliminar Evento" onclick="confirmar('evento');" disabled />
                                        </li>
                                        <li><input type="submit" class="style2" value="Cancelar"
                                                onclick="cancel = false; document.Delete.action = 'EventosAd.php';" />
                                        </li>
                                        <input type="hidden" id="idEventos" name="idEventos" value="-1" readonly
                                            required>
                                        <input type="hidden" id="nameE" name="nameE" value="none" readonly required>
                                    </form>
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
                                    <input type="text" name="name" id="contact-name" placeholder="Nombre Completo" />
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

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>




</body>

</html>