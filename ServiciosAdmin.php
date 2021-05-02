<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" media="all" />
    <?php
    session_start();
    ?>

</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <?php
        require './assets/php/header.php';
        ?>

        <!-- SERVICIOS -->
        <?php
        require 'class/servicios.php';
        $Servicios = new Servicio();
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");

        ?>
        <div id='main' class='wrapper style2'>
            <div class='title'>NUESTROS SERVICIOS</div>
            <div class="col-12">
                <header class="style2">
                    <h2>EDITAR SERVICIOS</h2>
                </header>
                <ul class="actions special">
                    <form id="servicesbtn" name="servicesbtn">
                        <a href="./EditarHeader.php">
                            <li>
                                <input type="button" class="button special style5 large" value="Editar Header" onclick="document.servicesbtn.action = 'EditarHeader.php';">
                            </li>
                        </a>
                        <a href="./AgregarServicios.php">
                            <li><input type="button" class="button special style5 large " value="Agregar Servicio" onclick="document.servicesbtn.action = 'AgregarServicios.php';" />
                            </li>
                        </a>
                        <a href="./ActualizarServicios.php">

                            <li><input type="button" class="button special style5 large" value="Actualizar Servicios" onclick="document.servicesbtn.action = 'ActualizarServicios.php';" />
                            </li>
                        </a>

                        <a href="./EliminarServicios.php">
                            <li><input type="button" class="button special style5 large" value="Eliminar Servicio" onclick="document.servicesbtn.action = 'EliminarServicios.php';" />
                            </li>
                        </a>


                    </form>
                    <hr>
                </ul>
            </div>
            <div class='container'>
                <div id='content'>
                    <article class='box post'>
                        <br>
                        <?php
                        $HeaderC = "SELECT * FROM InfoServicios";
                        $HeaderR = $Base->query($HeaderC);
                        if ($HeaderR->num_rows != 0) {
                            if ($HeaderR) {
                                $fila = $HeaderR->fetch_assoc();
                                $Servicios->GenerarHeaderServicios($fila['HeaderTitulo'], $fila['DescripcionHeader']);
                            }
                        } else {
                            $Servicios->GenerarHeaderServicios('Oops!', 'Aún no hay información ingresada para esta sección.');
                        }
                        ?>

                        <div class='feature-list'>
                            <div class='row'>
                                <?php
                                $Consulta = "Select * from Servicios order by Nombre asc";
                                $Ejecucion = $Base->query($Consulta);
                                if ($Ejecucion->num_rows != 0) {
                                    if ($Ejecucion) {
                                        while ($fila = $Ejecucion->fetch_assoc()) {
                                            $Servicios->ExtraerBase($fila);
                                            $Servicios->GenerarServicio();
                                        }
                                    }
                                } else {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que aún no hay servicios registrados.</p><hr></header>";
                                }

                                $Base->close();
                                ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
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