<!DOCTYPE HTML>
<html>
<head>
    <title>Inicio - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/main2.css?<?php echo time() . ".0"; ?>">
    
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
        require './assets/php/header.php';
    ?>

    <div id="main" class="wrapper style2">
    
        <!-- Main -->
            <div class="title">INICIO</div>
            <div class="container">

            <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style2">
                        <h2>CREANDO EXPERIENCIAS INOLVIDABLES</h2>
                            <p style="text-align: justify;">Nuestra empresa de eventos radica en comercializar un servicio integral cinco estrellas de eventos para empresas y particulares creando experiencias y generando emociones para ti.</p>
                        </header>
                        <p class="image featured" id="entrada">
                            <?php $ruta = "images/principal.png"; ?>
                            <img src="<?php echo $ruta; ?>" alt="" />
                        </p>
                        <h2>¿POR QUÉ ELEGIRNOS?</h2>
                        <p style="text-align: justify;">Son muchos los diferentes criterios por los que nos guiamos para decidir y escoger. En esta empresa de eventos valoramos la gran capacidad de nuestras celebraciones para aportar a los asistentes la posibilidad de encontrar un lugar en el que experimentar y sentir de manera diferente, en el que también puedas relacionarte con los demás, aprender, descubrir y compartir vivencias.
                        Todos nuestros eventos, sin excepción, captan la atención de los invitados, pues cada uno de ellos es diferente y único, y en cada uno de ellos se sienten y se tienen diferentes experiencias y sensaciones.
                        Esto es posible gracias a el gran equipo de profesionales que se encuentra detrás de cada acontecimiento, un equipo que se caracteriza por su pasión, especialización, entusiasmo, experiencia y vocación en todo lo que organiza nuestra empresa de eventos</p><br>
                    </article>
                </div>
            </div>
        <hr>
    <!-- SERVICIOS -->
        <?php
            require 'class/servicios.php';
            $Servicios = new Servicio();
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");
        ?>

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
            <li><a href='ServiciosAdmin.php' class='button style1 large'>Conoce más</a></li><br><br><br>
        </ul>
<hr>

    <!-- EVENTOS -->
        <?php 
            require 'class/Events.php';
            $EventosM = new MetodosEventos();
            $EventosM -> GenerarHeaderEventos('EVENTOS EXTRAORDINARIOS','Te mostramos algunos eventos que hemos organizado');
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");
        ?>
<section id="entrada">
        <section id="highlights" class="wrapper style2">
            <div class="row aln-center" id="areaeventos">
                <?php
                    $Consulta = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where Visibilidad=0 order by fecha DESC LIMIT 2 ";
                    $Ejecucion = $Base->query($Consulta);
                    if($Ejecucion->num_rows!=0)
                    {
                        if($Ejecucion)
                        {
                            while ($fila = $Ejecucion->fetch_assoc())
                            {
                                $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 2";
                                $Ejecucion3 = $Base->query($Consulta3);
                                $EventosM -> ExtraerBaseE($fila);
                                $EventosM->ExtraerTipo($fila);
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
                        echo "<p>Oops! Parece que aún no hay eventos registrados.</p><hr></header>";
                    }
                ?>
            </div>
            <ul class='actions special'>
                <li><a href='EventosAd.php' class='button style1 large'>Conoce más</a></li>
            </ul>
        </section>
        </section>
    </div>

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

</body>
</html>