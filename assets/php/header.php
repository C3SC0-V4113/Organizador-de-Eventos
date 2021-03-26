<?php
require_once 'class/empresa.class.php';
$mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);
?>
<!-- Header -->
<section id="header" class="wrapper">
    <!-- Logo -->
    <div id="logo">
        <h1><a href="index.html"><?php
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
        if ($admin) {
        ?>
            <ul class="actions special">
                <form id="servicesbtn" name="servicesbtn">
                    <li>
                    <a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
                    </li>
                </form>
            </ul>
        <?php
        }
        ?>
    </div>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.html">INICIO</a></li>
            <li>
                <a href="#">NUESTROS SERVICIOS</a>
                <ul>
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Magna veroeros</a></li>
                    <li><a href="#">Etiam nisl</a></li>
                    <li>
                        <a href="#">Sed consequat</a>
                        <ul>
                            <li><a href="#">Lorem dolor</a></li>
                            <li><a href="#">Amet consequat</a></li>
                            <li><a href="#">Magna phasellus</a></li>
                            <li><a href="#">Etiam nisl</a></li>
                            <li><a href="#">Sed feugiat</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Nisl tempus</a></li>
                </ul>
            </li>
            <li><a href="#">EVENTOS</a></li>
            <li><a href="#">QUIENES SOMOS</a></li>
            <li class="current"><a href="#">CONTACTANOS</a></li>
        </ul>
    </nav>
</section>