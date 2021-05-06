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
            <div class="title">Agregar Lugares</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Agregar Lugares para Eventos: </h2>
                            <p>Complete la siguiente Información:</p>
                        </header>
                        <section>
                            <form id="AddLugar" name="AddLugar" method="post" action="RespuestaLugares.php"
                                enctype="multipart/form-data">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <label for="nombreL">Nombre del Lugar</label>
                                        <input class="Lugar" type="text" name="nombreL" id="nombreL"
                                            placeholder="Ingrese el nombre del Lugar" onchange="cancel = true;"
                                            required />
                                    </div>
                                  
                                    <div class="col-12 col-12-small">
                                        <label for="DirecL">Direcición del Lugar</label>
                                        <textarea class="Lugar" name="DirecL" id="DirecL" maxlength = "500"
                                            placeholder="Ingrese la Direcición del Lugar" rows="4"
                                            onchange="cancel = true;" required></textarea>
                                    </div>

                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" id="guardarL" name="guardarL" class="style5" value="Guardar Lugar" onclick="cancel=false;" />
                                            </li>

                                            <li><a href="EditarLugar.php"><input type="button" class="style2" value="Cancelar"
                                                    onclick="cancel = true; document.AddLugar.action = 'EditarLugar.php';" /></a>
                                            </li>
                                            <li><input type="reset" class="style2" value="Limpiar Campos"
                                                    onclick="LimpiarE()" /></li>
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

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>




</body>

</html>