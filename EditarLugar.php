<!DOCTYPE HTML>
<html>

<head>
    <title>Lugares - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <link rel="stylesheet" href="assets/css/main2.css">
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require 'assets/php/header.php';
		?>

        <!-- EVENTOS -->
        <?php       
			
		?>
        <section id="highlights" class="wrapper style2">
					<div class="title">LUGARES PARA EVENTOS</div>
					<div class="container">
                        <div class="box post">
                    <header class="style2">
                    <h2>EDITAR LUGARES</h2>
                </header>
                <ul class="actions special">
                    <form id="servicesbtn" name="servicesbtn">
                        <a href="./AgregarL.php">
                        <li><input type="button" class="button special style5 large " value="Agregar Lugares"
                                 />
                        </li></a>
                        <a href="./ActualizarLugar.php">
                        <li><input type="button" class="button special style5 large" value="Actualizar Lugares"
                                 />
                        </li></a>
                        <a href="./EliminarL.php">
                        <li><input type="button" class="button special style5 large" value="Eliminar Lugares"
                                />
                        </li></a>


                    </form>
                    <hr>
                </ul>
                </div>
                <?php 
                        require 'class/Lugares.php';
                        $LugaresE = new MetodosLugares();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
		                ?>
                        <br>
						<div class="row aln-center">
                        <?php 
                                $consulta = "SELECT * FROM lugares ORDER BY NombreLugar DESC";
                                //Ejecutando la consulta a través del objeto $db
                                $Ejecucion = $Base->query($consulta);
                                //Obteniendo el número de registros devueltos
                                $num_results = $Ejecucion->num_rows;
                                echo "<h3>LUGARES REGISTRADOS</h3>";
                                echo "<table class='table'>
                                <colgroup>
                                <col class=\"N°\">
                                </colgroup>
                                <colgroup>
                                <col class=\"NombreLugar\">
                                </colgroup>
                                <colgroup>
                                <col class=\"DireccionLugar\">
                                </colgroup>
                                <thead>
                                <tr id=\"theader\">
                                <th>IdLugar</th>
                                <th>Lugar</th>
                                <th>Direccion del Lugar</th>
                                </tr>
                                </thead>
                                <tbody>";
                                $i=0;
                                while ($row = $Ejecucion->fetch_assoc()) {
                                    $i++;
                                echo "<tr class=\"normal\"
                                onmouseover=\"this.className='selected'\"
                                onmouseout=\"this.className='normal'\">";
                                echo "<td scope='col'>";
                                echo "" . $i . "";
                                echo "</td><td scope='col'>";
                                echo "" . ($row['NombreLugar']) . "";
                                echo "</td><td scope='col'>\n";
                                echo "" . $row['DirecccionLugar'];
                                echo "</td><td scope='col'>";
                                echo "</td></tr>";
                                }
                                echo "</tbody>";
                                echo "<tfoot>";
                                echo "<tr id=\"tfooter\">";
                                echo "<th colspan=\"5\">";
                                //Mostrando el número total de registros de la tabla libros
                                echo "Número de registros: " . $num_results . "";
                                echo "</th>";
                                echo "</tr>";
                                echo "</tfoot>";
                                echo "</table>";
                                $Base ->close();
                                ?>

						</div>
					</div>
				</section>

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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>

</body>

</html>