<?php
require_once 'class/empresa.class.php';
$mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);
?>
<!-- Header -->
<section id="header" class="wrapper">
    <!-- Logo -->
    <div id="logo">
        <h1><a href="InicioCliente.php"><?php
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
        <?php
        ?>
    </div>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="InicioCliente.php">INICIO</a></li>
            <li>
                <a href="ServiciosCliente.php">NUESTROS SERVICIOS</a>
                <!--<ul>
                    <li><a href="EditarHeader.php">Editar Header</a></li>
                    <li>
                        <a>Editar Servicios</a>
                        <ul>
                            <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                            <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                            <li><a href="EliminarServicios.php">Eliminar Servicio</a></li>
                        </ul>
                    </li>
                </ul>-->
            </li>
            <li><a href="EventosCliente.php">EVENTOS</a></li>
            <li><a href="AcercaDeCliente.php">QUIENES SOMOS</a></li>
            <li class="current"><a href="#">CONTACTANOS</a></li>
        </ul>
    </nav>
</section>