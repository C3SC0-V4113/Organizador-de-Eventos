<!DOCTYPE HTML>
<html>

<head>
    <title>Actualizar Reserva - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" media="all" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time() . ".0"; ?>" rel="stylesheet">
    <?php
    session_start();
    ?>
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <?php
        require './assets/php/header.php';
        ?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
        <?php
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        require 'class/reserva.php';
        $Eventos = new Reserva();
            $IdEvento=$_GET['editRes'];
            $ConsultaReserva=$Eventos->LlamarEventID($IdEvento);
            $ConsultaServicios=$Eventos->LlamarServiciosReserva($IdEvento);
            $Nombre=$ConsultaReserva['Nombre'];
            $Descripcion=$ConsultaReserva['Descripcion'];
            $Fecha=$ConsultaReserva['fecha'];
            $IdLug=$ConsultaReserva['idLugar'];
            $IdTip=$ConsultaReserva['IdTipoEvento'];
            $cadena= implode(",",$ConsultaServicios);
        ?>
            <div class="title">Actualizar Reservación</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Actualiza tú reservacion</h2>
                            <p>Complete la siguiente Información:</p>
                        </header>
                        <section>
                            <form id="AddReserva" name="AddReserva" method="post" action="RespuestaReserva.php" enctype="multipart/form-data">
                            
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <label for="nombreR">Nombre del Evento</label>
                                        <input class="event" type="text" name="nombreR" id="nombreR" value="<?php echo $Nombre; ?>" placeholder="Ingrese el Tipo de evento" onchange="cancel = true;" required />
                                    </div>
                                    <div class="col-12 col-12-small">
                                        <label for="descripR">Descripción del Evento</label>
                                        <textarea class="event" name="descripR" id="descripR" maxlength="500" placeholder="Ingrese la Descripción del Evento" rows="4" onchange="cancel = true;" required><?php echo $Descripcion; ?></textarea>
                                    </div>
                                    <div class="col-4 col-12-small">
                                        <label for="LugarR">Seleccione el lugar donde se realizó el evento</label>
                                        <select name="LugarR" id="LugarR" required>
                                            <option disabled selected>Seleccione el lugar del Evento</option>
                                            <?php
                                            $Matriz = $Eventos->ConsultarLugares();
                                            echo $Eventos->ImprimirLugares($Matriz);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4 col-12-small">
                                        <label for="TipoR">Seleccione el tipo de evento</label>
                                        <select name="TipoR" id="TipoR" required>
                                            <option disabled selected>Seleccione el tipo de Evento</option>
                                            <?php
                                            $Matriz2 = $Eventos->ConsultarTipos();
                                            echo $Eventos->ImprimirTipos($Matriz2);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4 col-12-small">
                                        <label for="FechaReserva">Fecha en que se realizará el evento <span id="adver">*</span></label>
                                        <input class="event" type="date" name="FechaReserva" id="FechaReserva" value="<?php echo $Fecha ?>" />
                                    </div>
                                    <div class="col-12">
                                    <p id="adver">*Debe elegir una fecha con almenos tres meses de anticipación</p>
                                    </div>
                                    <div class="col-12">
                                        <?php
                                        require 'class/servicios.php';
                                        $Servicios = new Servicio();
                                        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
                                        $Base->set_charset("utf8");
                                        $Consulta = "Select * from Servicios order by Nombre asc";
                                        $Ejecucion = $Base->query($Consulta);
                                        if ($Ejecucion->num_rows != 0) {
                                            if ($Ejecucion) {
                                                $i = 1;
                                                while ($fila = $Ejecucion->fetch_assoc()) {
                                                    $Datos[$i] = $fila;
                                                    $i++;
                                                }
                                            }
                                        } else {
                                            $Datos[1] = array('idServicios' => '', 'Nombre' => '', 'Descripcion' => '', 'urlIMG' => 'none');
                                            $Datos[2] = array('idServicios' => '', 'Nombre' => '', 'Descripcion' => '', 'urlIMG' => 'none');
                                            $Datos[3] = array('idServicios' => '', 'Nombre' => 'Oops!', 'Descripcion' => '', 'urlIMG' => 'none');
                                            $Datos[4] = array('idServicios' => '', 'Nombre' => 'Aún no hay servicios registrados en la Base de Datos', 'Descripcion' => '', 'urlIMG' => 'none');
                                            $Datos[5] = array('idServicios' => '', 'Nombre' => '', 'Descripcion' => '', 'urlIMG' => 'none');
                                            $Datos[6] = array('idServicios' => '', 'Nombre' => '', 'Descripcion' => '', 'urlIMG' => 'none');
                                        }
                                        ?>
                                        <script type="text/javascript">
                                            var arrayJS = <?php echo json_encode($Datos); ?>;
                                            for (var i = 0; i < arrayJS.length; i++) {
                                                console.log("<br>" + arrayJS[i]);
                                            }
                                        </script>

                                        <label for="PantallaSer">Seleccione los servicios que desea añadir a su evento</label>

                                        <form name="PantallaSer" id="PantallaSer">
                                            <select multiple name="Pantalla" id="Pantalla" size="7" onchange="RellenarS(arrayJS[this.value]['Nombre'],arrayJS[this.value]['Descripcion'],arrayJS[this.value]['urlIMG'],arrayJS[this.value]['Precio'],arrayJS[this.value]['idServicios'])">
                                                <?php
                                                for ($i = 1; $i <= sizeof($Datos); $i++) {
                                                    echo "<option value='" . $Datos[$i]['Precio'] .'--'.$Datos[$i]['idServicios']. "'>";
                                                    if ($Datos[$i]['urlIMG'] != "none") {
                                                        echo "Precio $" . $Datos[$i]['Precio'] . ":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                    } else {
                                                    }
                                                    echo $Datos[$i]['Nombre'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" value="" name="TotalEscondido" id="TotalEscondido">
                                            <input type="hidden" value="<?php echo $IdEvento ?>" name="IDEscondido" id="IDEscondido">
                                            <input type="hidden" value="<?php echo $cadena; ?>" name="ArrayIDs" id="ArrayIDs">
                                            <input type="hidden" value="<?php echo $IdLug."--".$IdTip; ?>" name="LugarTipo" id="LugarTipo">
                                        </form>
                                        <h3 id="totalNo"></h3>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" id="modificarE" name="modificarE" class="style5" value="Actualizar Reservacion" onclick="cancel=false;" />
                                            </li>
                                            <li><a href="ReservacionesCliente.php"><input type="button" class="style2" value="Cancelar" onclick="cancel = true; document.AddReserva.action = 'ReservacionesCliente.php';" /></a>
                                            </li>
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
    <script src="assets/js/ConfirmarSalir.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time() . ".0"; ?>"></script>
    <script src="assets/js/total.js"></script>
    <script src="assets/js/calendario.js"></script>
    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time() . ".0"; ?>"></script>
</body>

</html>