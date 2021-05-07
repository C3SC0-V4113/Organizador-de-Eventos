<?php
require_once 'class/empresa.class.php';
$mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);

?>
<script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
<!-- Header -->
<section id="header" class="wrapper">
    <!-- Logo -->
    <div id="logo">
        <h1><a href="InicioAdmin.php"><?php
                                        $Nombre = "SELECT `Nombre` FROM `empresa` WHERE 1";
                                        $peticion = $mysqli->query($Nombre);
                                        $filaemprcontact = $peticion->fetch_assoc();
                                        echo $filaemprcontact['Nombre'];
                                        ?></a></h1>
        <p><?php
            $Slogan = "SELECT `Slogan` FROM `empresa` WHERE 1";
            $peticion = $mysqli->query($Slogan);
            $filaemprcontact = $peticion->fetch_assoc();
            echo $filaemprcontact['Slogan'];
            ?></p>
                        <ul class="actions special">
                <form id="servicesbtn" name="servicesbtn">
                    <li>
                        <a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
                    </li>
                </form>
            </ul>
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
            <li>
                <a href="EventosAd.php">EVENTOS</a>
                <ul>
                <li><a href="AgregarEvento.php">Agregar Evento</a></li>
                    <li>
                        <a>Editar Eventos</a>
                        <ul>
                            <li><a href="ActualizarEvento.php">Actualizar Evento</a></li>
                            <li><a href="EliminarEventos.php">Eliminar Evento</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="AcercaDe.php">QUIENES SOMOS</a></li>
            <li class="current"><a href="ReservacionesCliente.php">RESERVACIONES</a></li>
        </ul>
    </nav>
</section>
