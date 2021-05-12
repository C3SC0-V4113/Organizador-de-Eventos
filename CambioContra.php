<!DOCTYPE HTML>
<html>
<head>
    <title>Cambio de Contraseña - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
    session_start();
    if(isset($_SESSION['IdUsuario']) && $_SESSION['IdUsuario']!=1)
    {
        require './assets/php/headerCli.php';
    }
    else {
       
        require 'assets/php/header.php';
    }
		
		?>

        

        <!-- SERVICIOS -->
        <?php
            $Base = new mysqli('localhost','root','','mydb',3307);
            $Base -> set_charset("utf8");
            ?>
        <div id='main' class='wrapper style2'>
            <div class='title'>CAMBIO DE CONTRASEÑA</div>
            <div class='container'>
                <div id='content'>
                    <article class='box post'>
                    <form action="class/EditarCliente.php" method="post">
                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Contraseña Actual: </label>
                    <input class="service" type="password" name="ContraActual" id="ContraActual"  
                    placeholder="Contraseña Actual" onchange="cancel = true;"
                    required/>
                    </div>

                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Nueva Contraseña: </label>
                    <input class="service" type="password" name="Nueva1" id="Nueva1"
                    placeholder="Nueva Contraseña" onchange="cancel = true;"
                    required/>
                    </div>
                    <div class="col-12 col-12-medium">
                    <label for="nombreS">Renconfirme Nueva Contraseña: </label>
                    <input class="service" type="password" name="Nueva2" id="Nueva2" 
                    placeholder="Reconfirme Nueva Contraseña" onchange="cancel = true;" 
                    required/>
                    </div>
                    <br>
                    <ul class='actions special' id="actionspeciales">
                            <li><input type="submit" id="newcontra" name="newcontra" class='button style1 large' value="Guardar Nueva Contraseña" onclick="Clientes()"></li>
                        </ul>
                    </form>
                    </article>
                </div>
            </div>
        </div>
		<?php
        if($_SESSION['NombreUsuario']!='ADMINISTRADOR')
        {
            require './assets/php/footerCli.php';
        }
        else {
            require 'assets/php/footer.php';
        }
		
        if(isset($_GET['exito']))
        {
            if($_GET['exito']==1)
            {
                echo "<script language='javascript'> window.alert('¡Contraseña Actualizada con Éxito!');</script>";
            }
            else if($_GET['exito']==-1)
            {
                echo "<script language='javascript'> window.alert('¡Error: Contraseña Actual ingresada incorrecta!');</script>";
            }
            else if($_GET['exito']==-2)
            {
                echo "<script language='javascript'> window.alert('¡Error: Reconfirmación de contraseña no coincide!');</script>";
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