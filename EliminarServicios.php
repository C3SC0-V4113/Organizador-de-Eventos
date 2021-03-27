<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require './assets/php/header.php';
		?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Eliminar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Eliminar Servicios de la Web</h2>
                            <p>Seleccione el Servicio que desea eliminar:</p>
                        </header>
                        <?php 
                        require 'class/servicios.php';
                        $Servicios = new Servicio();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Servicios order by Nombre asc";
                        $Ejecucion = $Base->query($Consulta);
                        if($Ejecucion->num_rows!=0)
                        {
                            if($Ejecucion)
                            {
                                $i=1;
                                while ($fila = $Ejecucion->fetch_assoc())
                                {
                                    $Datos[$i] = $fila;
                                    $i++;
                                }
                            }  
                        }
                        else 
                        {
                            $Datos[1] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[2] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[3] = array('idServicios' => '','Nombre' => 'Oops!','Descripcion' => '','urlIMG' =>'none');
                            $Datos[4] = array('idServicios' => '','Nombre' => 'Aún no hay servicios registrados en la Base de Datos','Descripcion' => '','urlIMG' =>'none');
                            $Datos[5] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[6] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                        }
                        $Base->close();
                        ?>
                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($Datos);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>

                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="8" onchange="OnlyID(arrayJS[this.value]['idServicios'],arrayJS[this.value]['Nombre'],arrayJS[this.value]['urlIMG'])">
                                <?php 
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                                echo "<option value='".$i."'>";
                                if($Datos[$i]['urlIMG']!="none"){echo "Servicio $i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                                else{}
                                echo $Datos[$i]['Nombre']."</option>";
                            }
                            ?>
                            </select>
                        </form>
                        <hr>
                        <section>
                            <form class="service" id="Delete" name="Delete" method="post"
                                action="RespuestaServicios.php" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style6" value="Eliminar Servicio" id="eliminarS" name="eliminarS" disabled onclick="confirmar('servicio')" /></li>
                                            <li><input type="submit" class="style2" value="Cancelar"
                                                    onclick="document.Delete.action = 'ServiciosAdmin.php'; cancel=true;" />
                                            </li>
                                            <input type="hidden" id="IdServicios" name="IdServicios" value="-1" readonly required>
                                            <input type="hidden" id="name" name="name" value="-1" readonly required>
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

        <!-- Footer -->
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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
    <script src="assets/js/Seguro.js?<?php echo time().".0"; ?>"></script>

</body>

</html>