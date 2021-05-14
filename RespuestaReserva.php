<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" media="all" />
    <?php
    session_start();
    ?>

</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <?php
        require './assets/php/headerCli.php';
        ?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Agregar Eventos</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <?php
                            $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
                            $Base->set_charset("utf8");
                            require 'class/reserva.php';
                            $Eventos = new Reserva();
                            if (isset($_POST['guardarE'])) {
                                $nameE = isset($_POST['nombreR']) ? trim($_POST['nombreR']) : -1;
                                $CliE = $Eventos->ObtenerCliente($_SESSION['IdUsuario']);
                                $CliE = $CliE['idCliente'];
                                $descripE = isset($_POST['descripR']) ? trim($_POST['descripR']) : -1;
                                $LugarE = isset($_POST['LugarR']) ? trim($_POST['LugarR']) : -1;
                                $TipoE = isset($_POST['TipoR']) ? trim($_POST['TipoR']) : -1;
                                $fechaE = isset($_POST['FechaReserva']) ? trim($_POST['FechaReserva']) : -1;
                                $fechaE = date("Y-m-d", strtotime($fechaE));
                                $Usuario = isset($_SESSION['IdUsuario']) ? trim($_SESSION['IdUsuario']) : -1;
                                $Empresa = isset($_SESSION['IdEmpresa']) ? trim($_SESSION['IdEmpresa']) : 1;
                                $Servicios = isset($_POST['ArrayIDs']) ? explode(',', $_POST['ArrayIDs']) : 0;

                                if ($nameE != -1 && $CliE != -1 && $descripE != -1 && $LugarE != -1 && $TipoE != -1 && $fechaE != -1) {
                                    $Id = $Eventos->IDEvento();
                                    $Resultado = $Eventos->InsertarReservaE($Id, $TipoE, $Empresa, $Usuario, $nameE, $fechaE, $LugarE, $CliE, $descripE);
                                    $Resultado2 = $Eventos->InsertarReservaR($Id, $fechaE);
                                    $IdR = $Eventos->UltimoID();
                                    $Resultado3 = $Eventos->InsertarServicios($IdR, $Servicios);
                                    if ($Resultado > 0 && $Resultado2 > 0 && $Resultado3 > 0) //Si devuelve 1 es exito, falla si devuelve 0 o -1
                                    {
                                        $Eventos->ExitosR(1, $nameE);
                                    } else {
                                        $Eventos->ErroresR(2);
                                    }
                                } else {
                                    $Eventos->ErroresR(1);
                                }
                            } else if (isset($_POST['modificarE'])) {
                                $IdEvent = isset($_POST['IDEscondido']) ? trim($_POST['IDEscondido']) : -1;
                                $nameE = isset($_POST['nombreR']) ? trim($_POST['nombreR']) : -1;
                                $descripE = isset($_POST['descripR']) ? trim($_POST['descripR']) : -1;
                                $LugarE = isset($_POST['LugarR']) ? trim($_POST['LugarR']) : -1;
                                $TipoE = isset($_POST['TipoR']) ? trim($_POST['TipoR']) : -1;
                                $fechaE = isset($_POST['FechaReserva']) ? trim($_POST['FechaReserva']) : -1;
                                $fechaE = date("Y-m-d", strtotime($fechaE));
                                $Servicios = isset($_POST['ArrayIDs']) ? explode(',', $_POST['ArrayIDs']) : 0;
                                /*---------------------*/
                                if ($nameE != -1 && $IdEvent != -1 && $descripE != -1 && $LugarE != -1 && $TipoE != -1 && $fechaE != -1) {
                                    $IdRes = $Eventos->ReservaEvento($IdEvent);
                                    $Resultado = $Eventos->ActualizarEvento($IdEvent, $nameE, $descripE, $TipoE, $LugarE, $fechaE);
                                    $Resultado2 = $Eventos->ActualizarReserva($IdRes, $fechaE);
                                    $Res = $Eventos->BorrarDetalle($IdRes);
                                    $Resultado3 = $Eventos->InsertarServicios($IdRes, $Servicios);
                                    if ($Resultado > 0 && $Resultado2 > 0 && $Resultado3 > 0) //Si devuelve 1 es exito, falla si devuelve 0 o -1
                                    {
                                        $Eventos->ExitosR(2, $nameE);
                                    } else {
                                        $Eventos->ErroresR(4);
                                    }
                                } else {
                                    $Eventos->ErroresR(3);
                                }
                            }
                            $Base->close();
                            ?>
                        </header>
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
    <script src="assets/js/ConfirmarSalir.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time() . ".0"; ?>"></script>


</body>

</html>