<!DOCTYPE HTML>
<html>

<head>
    <title>Lugares - Wine & Champagne Eventos</title>
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
            <div class="title">Actualizar Lugares</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Actualizar Lugares para eventos</h2>
                            <p>Seleccione el Lugar que desea modificar:</p>
                        </header>
                        <?php 
                        require 'class/Lugares.php';
                        $Lugares = new MetodosLugares();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Lugares order by idLugar desc";
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
                            $Datos[1] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar' => '');
                            $Datos[2] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar' => '');
                            $Datos[3] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar'  => '');
                            $Datos[4] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar' => '');
                            $Datos[5] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar' => '');
                            $Datos[6] = array('idLugar' => '','NombreLugar' => '','DirecccionLugar' => '');
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
                                onchange="RellenarL(arrayJS[this.value]['DirecccionLugar'],arrayJS[this.value]['NombreLugar'],arrayJS[this.value]['idLugar']);">
                            <?php 
                                $desc = sizeof($Datos);
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                              echo "<option value='".$i."'>";
                              if($Datos[$i]['NombreLugar']!="none")
                              {
                                echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                              }
                              else{

                              }
                              echo $Datos[$i]['NombreLugar'] . "->&nbsp;&nbsp;&nbsp;&nbsp" . $Datos[$i]['DirecccionLugar']."</option>";
                              
                            }
                            ?>
                            </select>
                        </form>
                    
                        <section>
                            <header class="style2">
                                <h2>Modifique el Lugar:</h2>
                            </header>
                                <form class = "Lugar" id="AddLugar" name="AddLugar" method="post" action="RespuestaLugares.php"
                                    enctype="multipart/form-data">

                                    <div class="row gtr-50">

                                        <div class="col-6 col-12-small">
                                            <label for="nombreL">Nombre del Lugar</label>
                                            <input class="Lugar" type="text" name="nombreL" id="nombreL"
                                                disabled placeholder="Ingrese el nombre del Lugar" onchange="cancel = true;" required />
                                        </div>
                                        <div class="col-6 col-12-small">
                                            <label for="DirecL">Dirección del Lugar</label>
                                            <input class="Lugar" type="text" name="DirecL" id="DirecL"
                                                disabled placeholder="Ingrese la Dirección del Lugar" onchange="cancel = true;"
                                                required/>
                                        </div>
                                        <div class="col-12">
                                            <ul class="actions">
                                                <br><br>
                                                <li><input type="submit" id="modificarL" name="modificarL" class="style5"
                                                        value="Guardar Lugar" onclick="cancel=false;" />
                                                </li>
                                                <li><input type="submit" class="style2" value="Cancelar"onclick="cancel = true; document.AddLugar.action = 'EditarLugar.php';" /></a>
                                                </li>
                                                <li><input type="reset" class="style2" value="Limpiar Campos"
                                                        onclick="LimpiarL()" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" id="idLugar" name="idLugar" value="-1" readonly required>

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

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>




</body>

</html>