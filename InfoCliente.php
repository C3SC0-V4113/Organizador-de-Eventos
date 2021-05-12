<!DOCTYPE HTML>
<html>
<head>
    <title>Mi Información - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require './assets/php/headerCli.php';
		?>

        

        <!-- SERVICIOS -->
        <?php
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");
            $consulta = "SELECT * from Cliente where idUsuario='".$_SESSION['IdUsuario']."'";
            $Resultados = $Base->query($consulta);
            $Datos = $Resultados->fetch_assoc();
            $tel = $Datos['Telefono'];
            $correo = $Datos['Correo'];
            ?>
        <div id='main' class='wrapper style2'>
            <div class='title'>MI INFORMACIÓN</div>
            <div class='container'>
                <div id='content'>
                    <article class='box post'>
                    <form action="class/EditarCliente.php" method="post">
                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Nombre Cliente: </label>
                    <input class="service" type="text" name="nombreC" id="nombreC" disabled value="<?php echo $_SESSION['NombreUsuario'] ?>"
                    placeholder="Ingrese su Nombre Completo" onchange="cancel = true;" maxlength ="45"
                    required/>
                    </div>

                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Teléfono: </label>
                    <input class="service" type="text" name="telC" id="telC" disabled value="<?php echo $tel ?>"
                    placeholder="Ingrese su Número de Teléfono" onchange="cancel = true;" maxlength ="9" pattern="[0-9]{4}-[0-9]{4}"
                    required/>
                    </div>
                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Correo Electrónico: </label>
                    <input class="service" type="text" name="correoC" id="correoC" disabled value="<?php echo $correo ?>"
                    placeholder="Ingrese su Correo Electrónico" onchange="cancel = true;" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$"
                    required/>
                    </div>
                    <br>
                    <ul class='actions special' id="actionspeciales">
                            <li><input type="button" id="editar" name="editar" class='button style1 large' value="Editar Información" onclick="Clientes()"></li>
                        </ul>
                    </form>
                    </article>
                </div>
            </div>
        </div>
		<?php
		require './assets/php/footerCli.php';
        if(isset($_GET['exito']))
        {
            if($_GET['exito']==1)
            {
                echo "<script language='javascript'> window.alert('¡Cambios realizados con éxito!');</script>";
            }
            else {
                echo "<script language='javascript'> window.alert('¡Error al hacer los cambios!');</script>";
            }
            
        }
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