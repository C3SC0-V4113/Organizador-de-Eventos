<!DOCTYPE HTML>
<html>

<head>
    <title>Lugares - Wine & Champagne Eventos</title>
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
            <div class="title">Agregar Lugares</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <?php
                            $Base = new mysqli('localhost','root','','mydb',3307);
                            $Base -> set_charset("utf8");
                            require 'class/Lugares.php';
                            $Lugares = new MetodosLugares();
                            if(isset($_POST['guardarL']))
                            {
                                $nameL = trim($_POST['nombreL']);
                                $DirL = trim($_POST['DirecL']);
                                //Verificando que se hayan ingresado datos
                                //en todos los controles del formulario
                                if (empty($nameL) || empty($DirL)) {
                                $msg = "Existen campos en el formulario sin
                                llenar. ";
                                $msg .= "Regrese al formulario y llene todos los
                                campos. <br />\n";
                                $msg .= "[<a
                                href=\"AgregarL.php\">Volver</a>]\n";
                                echo $msg;
                                exit(0);
                                }
                                if (!get_magic_quotes_gpc()) {
                                $nameL = addslashes($nameL);
                                $DirL = addslashes($DirL);
                                }
                        

                                if($nameL!=-1 && $DirL!=-1)
                                {
                                    $Consulta = "Select idLugar from lugares order by idLugar DESC LIMIT 1";
                                    $IdL = $Base->query($Consulta);
                                    $totalL = $IdL->num_rows; 
                                    if($IdL)
                                    {
                                        if($totalL!=0)
                                        {
                                            $Id = $Lugares -> Id($IdL->fetch_assoc());
                                        }
                                        else 
                                        {
                                            $Id =1;
                                            echo $Id;
                                        }
                                        $Insert = "INSERT INTO lugares (idLugar, NombreLugar, DirecccionLugar)";
                                        $Insert .= "VALUES ('" . $Id. "', '" . $nameL . "', '" .$DirL . "')";

                                        $Resultado = $Base->query($Insert);
                                        if($Resultado)
                                        {
                                        
                                        echo "<h2>¡Proceso Realizado con Éxito!</h2>";
                                        echo "<p>El Lugar: '$nameL' se guardo con éxito en la Base de Datos.</p>";
                                        echo "<ul class='actions special'><form id='back' name='back'><li>
                                        <a href='AgregarL.php'><input type='button' class='button special style5 large' value='Agregar otro Lugar'></a>
                                        <a href='EditarLugar.php'><input type='button' class='button special style5 large' value='Regresar a la seccion de Lugar'></a>
                                        </li></form></ul>";
                                        }
                                        else
                                        {
                                            echo "<h2>¡Error, al ingresar los datos a la base de datos!</h2>";
                                            echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                            echo "<ul class='actions special'><form id='back' name='back'><li>
                                            <a href='AgregarL.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                            </li></form></ul>";

                                        }
                                    
                                        
                                    }


                                }

                            }
                            else if(isset($_POST['modificarL']))
                            {
                                $nameL = isset($_POST['nombreL']) ? trim($_POST['nombreL']):-1;
                                $DirL = isset($_POST['DirecL']) ? trim($_POST['DirecL']):-1;
                                $idLugares = isset($_POST['idLugar']) ? trim($_POST['idLugar']):-1;
                                    if($nameL!=-1 && $DirL!=-1)
                                    {

                                        $Compa = "Select NombreLugar, DirecccionLugar from lugares where idLugar=$idLugares";
                                        $Comparacion = $Base->query($Compa);
                                        
                                        if($Comparacion)
                                        {
                                           $fila = $Comparacion->fetch_assoc();
                                           if($fila['NombreLugar'] == $nameL && $fila['DirecccionLugar']==$DirL)
                                           {
                                            echo "<h2>No se realizó ningún cambio</h2>";
                                            echo "<p>Usted no realizó ningún cambio en los campos.</p>";
                                            echo "<ul class='actions special'><form id='back' name='back'><li>
                                            <a href='ActualizarLugar.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                            </li></form></ul>";
                                           }
                                           else 
                                           {
                                                $UpdateE = "UPDATE lugares SET NombreLugar='$nameL', DirecccionLugar='$DirL' where idLugar='$idLugares'";
                                                $EjecutarActu = $Base->query($UpdateE);
                                                $Exito = $Base->affected_rows;
                                                if ($Exito!=-1) 
                                                {
                                                     echo "<h2>¡Lugar Actualizado con Éxito!</h2>";
                                                            echo "<p>El Evento '$nameL' fue actualizado con Éxito</p>";
                                                            echo "<ul class='actions special'><form id='back' name='back'>
                                                            <a href='ActualizarLugar.php'><input type='button' class='button special style5 large' value='Actualizar Otro Lugar'></a>
                                                            <li>
                                                            <a href='EditarLugar.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de lugares'></a>
                                                            </li></form></ul>";
                                                }
                                                else 
                                                {
                                                echo "<h2>¡Error, al ingresar las modificaciones a la base de datos!</h2>";
                                                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                                echo "<ul class='actions special'><form id='back' name='back'><li>
                                                <a href='ActualizarLugar.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                                </li></form></ul>";
                                                }
                                                           
                                            }
                                    
                                        }
                                    }
                                    
                            }

                        
                            else if(isset($_POST['EliminarL']))
                            {
                                $deleteID= isset($_POST['idLugar']) ? trim($_POST['idLugar']):-1;
                                $nombreL = isset($_POST['nombreL']) ? trim($_POST['nombreL']):-1;
                                $Delete = "DELETE FROM lugares where idLugar='".$deleteID."'";
                                $EjecutarD = $Base->query($Delete);
                                $Exito = $Base->affected_rows;
                                if($Exito!=-1)
                                {
                                    echo "<h2>¡Lugar Eliminado con Éxito!</h2>";
                                    echo "<p>El Lugar '$nombreL' fue eliminado con Éxito</p>";
                                    echo "<ul class='actions special'><form id='back' name='back'>
                                    <a href='EliminarL.php'><input type='button' class='button special style5 large' value='Eliminar Otro Lugar'></a>
                                    <li>
                                    <a href='EditarLugar.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Lugares'></a>
                                    </li></form></ul>";
                                }
                                else 
                                {
                                    echo "<h2>¡Error, al eliminar el Lugar de la base de datos!</h2>";
                                    echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                    echo "<ul class='actions special'><form id='back' name='back'><li>
                                    <a href='EliminarL.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                    </li></form></ul>";
                                }
                            }
                            ?>
                        </header>
                        <section>

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


</body>

</html>