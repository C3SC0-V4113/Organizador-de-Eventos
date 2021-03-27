<!DOCTYPE HTML>
<html>
<head>
    <title>Inicio - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/main2.css">
    
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require './assets/php/headerCli.php';
		?>

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
                            <li><a href='ServiciosCliente.php' class='button style1 large'>Conoce más</a></li>
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
                        <h3><a href="#">Algunos recuerdos</a></h3>
                                    <p>Estas fotos fueron tomadas en los eventos organizados por nosotros. Si te ha gustado puedes seguir conociendo acerca de nuestros eventos. ¡No te arrepentirás!</p>
                        <ul class='actions special'>
                            <li><a href='EventosCliente.php' class='button style1 large'>Conoce más</a></li>
                        </ul>
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