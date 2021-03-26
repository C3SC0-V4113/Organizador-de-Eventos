<!DOCTYPE HTML>
<html>
<head>
    <title>Inicio - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="InicioAdmin.php">WINE & CHAMPAGNE<br>EVENTOS</a></h1>
                <p>¡B I E N V E N I D O S!</p>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="InicioAdmin.php">INICIO</a></li>
                    <li>
                        <a href="ServiciosAdmin.php">NUESTROS SERVICIOS</a>
                        <ul>
                            <li><a href="EditarHeader.php">Editar Header</a></li>
                            <li>
                                <a>Editar Servicios</a>
                                <ul>
                                    <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                                    <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                                    <li><a href="EliminarServicios.php">Eliminar Servicio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="EventosAdmin.php">EVENTOS</a></li>
                    <li><a href="AcercadeAdmin.php">QUIENES SOMOS</a></li>
                    <li class="current"><a href="#">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- Main -->
                <div id="main" class="wrapper style2">
                    <div class="title">INICIO</div>
                    <div class="container">

                        <!-- Content -->
                            <div id="content">
                                <article class="box post">
                                    <header class="style1">
                                        <h2>Creando experiencias inolvidables</h2>
                                        <p>Nuestra empresa de eventos radica en comercializar un servicio integral cinco estrellas de eventos para empresas y particulares creando experiencias y generando emociones para ti.</p>
                                    </header>
                                    <a href="#" class="image featured">
                                        <?php $ruta = "images/pic01.jpg"; ?>
                                        <img src="<?php echo $ruta; ?>" alt="" />
                                    </a>
                                    <h2>¿Por qué elegirnos?</h2>
                                    <p>Son muchos los diferentes criterios por los que nos guiamos para decidir y escoger. En esta empresa de eventos valoramos la gran capacidad de nuestras celebraciones para aportar a los asistentes la posibilidad de encontrar un lugar en el que experimentar y sentir de manera diferente, en el que también puedas relacionarte con los demás, aprender, descubrir y compartir vivencias.</p>
                                    <p>Todos nuestros eventos, sin excepción, captan la atención de los invitados, pues cada uno de ellos es diferente y único, y en cada uno de ellos se sienten y se tienen diferentes experiencias y sensaciones.</p>
                                    <p>Esto es posible gracias a el gran equipo de profesionales que se encuentra detrás de cada acontecimiento, un equipo que se caracteriza por su pasión, especialización, entusiasmo, experiencia y vocación en todo lo que organiza nuestra empresa de eventos</p>
                                </article>
                            </div>

                    </div>
                </div>


        <!-- SERVICIOS -->
        <?php
            require 'class/servicios.php';
            $Servicios = new Servicio();
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");

        ?>

        <section id="highlights" class="wrapper style2">
        
        <div id='main' class='wrapper style2'>
            <div class='container'>
                <div id='content'>
                    <article class='box post'>
                        <?php 
                            $HeaderC = "SELECT * FROM InfoServicios";
                            $HeaderR = $Base->query($HeaderC);
                            if($HeaderR->num_rows!=0)
                            {
                                if($HeaderR)
                                {
                                    $fila = $HeaderR->fetch_assoc();
                                    $Servicios -> GenerarHeaderServicios($fila['HeaderTitulo'],$fila['DescripcionHeader']);
                                }  
                            }
                            else 
                            {
                                $Servicios -> GenerarHeaderServicios('Oops!','Aún no hay información ingresada para esta sección.');
                            } 
                        ?>
                        <div class='feature-list'>
                            <div class='row'>
                                <?php 
                                    $Consulta = "Select * from Servicios order by Nombre asc limit 4";
                                    $Ejecucion = $Base->query($Consulta);
                                    if($Ejecucion)
                                    {
                                        while ($fila = $Ejecucion->fetch_assoc())
                                        {
                                            $Servicios -> ExtraerBase($fila);
                                            $Servicios -> GenerarServicio();
                                        }
                                    }
                                    $Base->close();
                                ?>
                            </div>
                        </div>
                        <ul class='actions special'>
                            <li><a href='ServiciosAdmin.php' class='button style1 large'>Conoce más</a></li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    
</section>

                <!-- EVENTOS -->
        <?php
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");
        ?>
                <section id="highlights" class="wrapper style3">
                    <div class="title">NUESTROS EVENTOS</div>
                    <div class="container">
                        <div class="row aln-center">
                            <?php 
                                include( 'class/InicioEventos.php');
                                $Consulta = "Select * from fotoseventos limit 3";
                                $Ejecucion = $conexion->query($Consulta);
                                if($Ejecucion)
                                {
                                    while ($fila = $Ejecucion->fetch_assoc())
                                    {
                                        echo "<div class='col-4 col-12-medium'><section class='highlight'><a href='#'' class='image featured'><img src='data:image/jpeg;base64,". base64_encode($fila['UrlFoto'])."' style='width:100%;'></a></section></div>";
                                    }
                                }
                            ?> 
                        </div>
                        <h3><a>Algunos recuerdos</a></h3>
                            <p>Estas fotos fueron tomadas en los eventos organizados por nosotros. Si te ha gustado puedes seguir conociendo acerca de nuestros eventos. ¡No te arrepentirás!</p>
                        <ul class='actions special'>
                            <li><a href='EventosAdmin.php' class='button style1 large'>Conoce más</a></li>
                        </ul>
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

</body>

</html>