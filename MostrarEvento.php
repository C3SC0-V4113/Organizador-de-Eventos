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

    <?php
		require './assets/php/headerCli.php';
		?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">NUESTROS EVENTOS</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                    <?php 
                        require 'class/Events.php';
                        $EventosM = new MetodosEventos();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $id = isset($_GET['id']) ? $_GET['id']:-1;
                        $tipo = isset($_GET['tipo']) ? $_GET['tipo']:-1;
                        $Consulta = "Select Nombre,fecha,NombreLugar,lugares.DirecccionLugar,NombreCliente,Descripcion from Eventos INNER join cliente ON eventos.idCliente = cliente.idCliente INNER JOIN lugares on eventos.idLugar = lugares.idLugar where idEventos=$id";
                        $Ejecucion = $Base->query($Consulta);
                        $Datos = $Ejecucion->fetch_assoc();
                        $Imagenes = "Select * from FotosEventos where idEventos=$id";
                        $EjeI=$Base->query($Imagenes);
                        $VectorImagenes=null;
                        if($EjeI->num_rows!=0)
                        {
                            $i=0;
                            while($img=$EjeI->fetch_assoc())
                            {
                                $VectorImagenes[$i]=$img;
                                $i++;
                            }
                        }
                        $EventosM->MostrarEvento($Datos['Nombre'],$Datos['NombreLugar'],$tipo,$Datos['Descripcion'],$VectorImagenes,$Datos['NombreCliente'],$Datos['fecha'],$Datos['DirecccionLugar']);
                        $Base -> close();          
		                ?>
                    </article>
                </div>

            </div>
        </div>

        <!-- Highlights -->

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
    <script src="assets/js/carousel.js?<?php echo time().".0"; ?>"></script>
    <script src="assets/js/ConfirmarSalir.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>

</body>

</html>