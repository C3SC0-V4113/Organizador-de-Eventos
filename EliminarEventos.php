<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time().".0"; ?>" rel="stylesheet">



</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require './assets/php/header.php';
		?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Eliminar Eventos</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Eliminar Eventos de la Web</h2>
                            <p>Seleccione el Evento que desea modificar:</p>
                        </header>
                        <?php 
                        require 'class/Events.php';
                        $Eventos = new MetodosEventos();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Eventos where Visibilidad = 0 order by Nombre asc";
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
                            $Datos[1] = array('idEventos' => '','Nombre' => '','Descripcion' => '','idLugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                            $Datos[2] = array('idEventos' => '','Nombre' => '','Descripcion' => '','idLugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                            $Datos[3] = array('idEventos' => '','Nombre' => 'Oops!','Descripcion' => '','idLugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                            $Datos[4] = array('idEventos' => '','Nombre' => 'Aún no hay servicios registrados en la Base de Datos','Descripcion' => '','Lugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                            $Datos[5] = array('idEventos' => '','Nombre' => '','Descripcion' => '','idLugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                            $Datos[6] = array('idEventos' => '','Nombre' => '','Descripcion' => '','idLugar' =>'none','fecha'=>"none",'idCliente'=>"none");
                        }
                        ?>
                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($Datos);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>
                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="7"
                                onchange="EliminarEvento(arrayJS[this.value]['idEventos'],arrayJS[this.value]['idCliente'],arrayJS[this.value]['Nombre'])">
                                <?php 
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                              echo "<option value='".$i."'>";
                              if($Datos[$i]['idLugar']!="none"){echo "Evento $i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                              else{}
                              echo $Datos[$i]['Nombre']."</option>";
                            }
                            ?>
                            </select>
                        </form>


                        <section>
                            <div class="col-12">
                                <ul class="actions">
                                    <form id="Delete" name="Delete" method="post" action="RespuestaEventos.php">
                                        <li><input type="submit" id="EliminarE" name="EliminarE" class="style5"
                                                value="Eliminar Evento" onclick="confirmar('evento');" disabled />
                                        </li>
                                        <li><input type="submit" class="style2" value="Cancelar"
                                                onclick="cancel = false; document.Delete.action = 'EventosAd.php';" />
                                        </li>
                                        <input type="hidden" id="idEventos" name="idEventos" value="-1" readonly
                                            required>
                                        <input type="hidden" id="nameE" name="nameE" value="none" readonly required>
                                    </form>
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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
    <script src="assets/js/Seguro.js?<?php echo time().".0"; ?>"></script>

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>




</body>

</html>