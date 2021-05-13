<?php
require_once 'class/empresa.class.php';
$mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);$mysqli->set_charset('utf8');
if(!isset($_SESSION))
{session_start();}
?>

<script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
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
            <?php
            if(isset($_SESSION['IdUsuario']))
            {
                $ref='InfoCliente.php';
                $name= strtoupper($_SESSION['NombreUsuario']);
                $downmenu = '
                <ul>
                <li><a href="InfoCliente.php">MI INFORMACIÓN</a></li>
                <li><a href="CambioContra.php">CAMBIAR CONTRASEÑA</a></li>
                <li><a href="class/CerrarSesion.php">CERRAR SESIÓN</a></li>
                </ul>
                ';
            }
            else 
            {
                $ref = 'Login.php';
                $name = 'INICIAR SESIÓN';
                $downmenu='';  
            }
            ?>
            </li>
            <li><a href="EventosCl.php">EVENTOS</a></li>
            <li><a href="AcercaDeCliente.php">QUIENES SOMOS</a></li>
            <li class="current"><a href="ReservacionesCliente.php">RESERVACIONES</a></li>
            <li><a href="<?php echo $ref ?>"><?php echo $name ?></a>
            <?php echo $downmenu; ?></li>
            
        </ul>
    </nav>
</section>