<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
</head>
<body class="no-sidebar is-preload" onload="Header(arrayJS['HeaderTitulo'],arrayJS['DescripcionHeader'])">
    <div id="page-wrapper">

    <?php
		require './assets/php/header.php';
		?>
        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Editar Header</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Editar Header de "Nuestros Servicios"</h2>
                            <p>Modifique los siguientes campos:</p>
                        </header>
                        <section>
                            <form class="service" id="EditHeader" name="EditHeader" method="post"
                                action="RespuestaServicios.php">
                                <div class="row gtr-50">
                                    <div class="col-12">
                                        <label for="nombreS">Titulo del Header</label>
                                        <input class="service" type="text" name="tituloH" id="tituloH" maxlength="50"
                                            placeholder="Ingrese el Titulo del Header" onchange="cancel = true;" required/>
                                    </div>
                                    <div class="col-12">
                                        <label for="descripH">Descripción del Header</label>
                                        <textarea class="service" name="descripH" id="descripH" maxlength="200"
                                            placeholder="Ingrese la Descripción del Header" rows="4"
                                            onchange="cancel = true;" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input id="actualizarH" name="actualizarH" type="submit" class="style5" value="Actualizar Cambios" onclick ="cancel=false;" /></li>
                                            <li><a href="ServiciosAdmin.php"><input type="button" class="style2" value="Cancelar"
                                                    onclick="cancel = true;" /></a>
                                            </li>
                                            <li><input type="reset" class="style2" value="Limpiar Campos"
                                                    onclick="cancel = true;LimpiarH();" /></li>
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

    <?php
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Consulta = "SELECT * FROM InfoServicios where idEmpresa=1";
        $Resultados = $Base->query($Consulta);
        if($Resultados->num_rows!=0)
        {
            if($Resultados)
            {
                $fila = $Resultados->fetch_assoc();
            }  
        }
        else 
        {
            echo'<script type="text/javascript">alert("Aún no hay información sobre el Header en la base de datos, porfavor llene los campos.");</script>';
        }
        $Base->close();
?>
<script type="text/javascript">
var arrayJS = <?php echo json_encode($fila);?>;
for (var i = 0; i < arrayJS.length; i++) {
    console.log("<br>" + arrayJS[i]);
}
</script>

</body>

</html>