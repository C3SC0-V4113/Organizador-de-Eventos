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
            <div class="title">Agregar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <?php
                            require 'class/servicios.php';
                            $Servicios = new Servicio();
                            $Base = new mysqli('localhost','root','','mydb',3307);
                            $Base -> set_charset("utf8");
                            if(isset($_POST['guardarS']))
                            {
                                $nameS = isset($_POST['nombreS']) ? trim($_POST['nombreS']):-1;
                                $descripS = isset($_POST['descripS']) ? trim($_POST['descripS']):-1;
                                $iconoS = isset($_POST['Icono']) ? trim($_POST['Icono']):-1;
                                
                                if($nameS!=-1 && $descripS!=-1 && $iconoS!=-1)
                                {
                                    $Consulta = "Select idServicios from Servicios order by idServicios DESC LIMIT 1";
                                    $IdC = $Base->query($Consulta);
                                    $totalR = $IdC->num_rows; 
                                    if($IdC)
                                    {
                                        if($totalR!=0)
                                        {
                                            $Id = $Servicios -> Id($IdC->fetch_assoc());
                                        }
                                        else 
                                        {
                                            $Id =1;
                                            echo $Id;
                                        }
                                        $Insert = "INSERT INTO Servicios (idServicios, Nombre, Descripcion, urlIMG, IdEmpresa, Id_Usuario)";
                                        $Insert .= "VALUES (?,?,?,?,?,?)";
                                        $AnU =1;
                                        $Resultado = $Base->prepare($Insert);
                                        $Resultado->bind_param("isssii",$Id,$nameS,$descripS,$iconoS,$AnU,$AnU);
                                        $Resultado->execute();
                                        if(($Resultado->affected_rows)!=0 && ($Resultado->affected_rows)!=-1)
                                        {
                                            echo "<h2>¡Proceso Realizado con Éxito!</h2>";
                                            echo "<p>El Servicio: $nameS se guardo con éxito en la Base de Datos.</p>";
                                            echo "<ul class='actions special'><form id='back' name='back'><li>
                                            <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Agregar otro Servicio'></a>
                                            <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                                            </li></form></ul>";
                                        }
                                        else 
                                        {
                                            echo "<h2>¡Error, al ingresar los datos a la base de datos!</h2>";
                                            echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                            echo "<ul class='actions special'><form id='back' name='back'><li>
                                            <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                            </li></form></ul>";
                                        }
                                    }
                                }
                                else 
                                {
                                    echo "<h2>¡Error, faltan argumentos!</h2>";
                                    echo "<p>Vuelva a intentarlo otra vez, esta vez ingrese todos los argumentos solicitados</p>";
                                    echo "<ul class='actions special'><form id='back' name='back'><li>
                                    <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                    </li></form></ul>";
                                }

                            }
                            else if(isset($_POST['actualizarH']))
                            {

                                $tituloH = isset($_POST['tituloH']) ? trim($_POST['tituloH']):-1;
                                $descripH = isset($_POST['descripH']) ? trim($_POST['descripH']):-1;
                                $Consulta = "SELECT * FROM InfoServicios";
                                $Resultados = $Base->query($Consulta);
                                if($Resultados->num_rows!=0)
                                {
                                    $Update = "UPDATE InfoServicios SET HeaderTitulo='$tituloH', DescripcionHeader='$descripH' where idEmpresa=1";
                                    $Actualizacion = $Base->query($Update);
                                }
                                else 
                                {
                                    $PrimerI = "INSERT INTO InfoServicios(idEmpresa,HeaderTitulo,DescripcionHeader) VALUES(?,?,?)";
                                    $In = $Base->prepare($PrimerI);
                                    $IdEmpresa =1;
                                    $In -> bind_param("iss",$IdEmpresa,$tituloH,$descripH);
                                    $In->execute();
                                }
                                    $Exito = $Base->affected_rows;
                                    if($Exito!=-1)
                                    {
                                        echo "<h2>¡Datos Actualizados con Éxito!</h2>";
                                            echo "<p>La información del Header de 'Nuestros Servicios' ha sido actualizada con Éxito.</p>";
                                            echo "<ul class='actions special'><form id='back' name='back'><li>
                                            <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar a la seccion de Servicios'></a>
                                            </li></form></ul>";
                                    }
                                    else 
                                    {
                                        echo "<h2>¡Error, al actualizar los datos en la base de datos!</h2>";
                                        echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                        echo "<ul class='actions special'><form id='back' name='back'><li>
                                        <a href='EditarHeader.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                        </li></form></ul>";
                                    }
                                

                            }
                            else if(isset($_POST['modificarS']))
                            {
                                $nameS = isset($_POST['nombreS']) ? trim($_POST['nombreS']):-1;
                                $descripS = isset($_POST['descripS']) ? trim($_POST['descripS']):-1;
                                $iconoS = isset($_POST['Icono']) ? trim($_POST['Icono']):-1;
                                $ID = isset($_POST['IdServicios']) ? trim($_POST['IdServicios']):-1;
                                $Compa = "Select Nombre,Descripcion,urlIMG from Servicios where idServicios=$ID";
                                $Comparacion = $Base->query($Compa);
                                if($Comparacion->num_rows!=0)
                                {
                                    if($Comparacion)
                                    {
                                       $fila = $Comparacion->fetch_assoc();
                                       if($fila['Nombre'] == $nameS && $fila['Descripcion']==$descripS && $fila['urlIMG']==$iconoS)
                                       {
                                        echo "<h2>No se realizó ningún cambio</h2>";
                                        echo "<p>Usted no realizó ningún cambio en los campos.</p>";
                                        echo "<ul class='actions special'><form id='back' name='back'><li>
                                        <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                        </li></form></ul>";
                                       }
                                       else 
                                       {
                                            $UpdateSer = "UPDATE Servicios SET Nombre='$nameS', Descripcion='$descripS',urlIMG='$iconoS' where idServicios=$ID";
                                            $EjecutarA = $Base->query($UpdateSer);
                                            $Exito = $Base->affected_rows;
                                            if($Exito!=-1)
                                            {
                                                echo "<h2>¡Servicio Actualizado con Éxito!</h2>";
                                                echo "<p>El Servicio '$nameS' fue actualizado con Éxito</p>";
                                                echo "<ul class='actions special'><form id='back' name='back'>
                                                <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Actualizar Otro Servicio'></a>
                                                <li>
                                                <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                                                </li></form></ul>";
                                            }
                                            else 
                                            {
                                                echo "<h2>¡Error, al actualizar el servicio en la base de datos!</h2>";
                                                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                                echo "<ul class='actions special'><form id='back' name='back'><li>
                                                <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                                </li></form></ul>";
                                            }
                                       }
                                        
                                    }  
                                }
                            }
                            else if(isset($_POST['eliminarS']))
                            {
                                $deleteID= isset($_POST['IdServicios']) ? trim($_POST['IdServicios']):-1;
                                $nameS = isset($_POST['name']) ? trim($_POST['name']):-1;
                                $Delete = "DELETE FROM Servicios where idServicios='$deleteID'";
                                $EjecutarD = $Base->query($Delete);
                                $Exito = $Base->affected_rows;
                                if($Exito!=-1)
                                {
                                    echo "<h2>¡Servicio Eliminado con Éxito!</h2>";
                                    echo "<p>El Servicio '$nameS' fue eliminado con Éxito</p>";
                                    echo "<ul class='actions special'><form id='back' name='back'>
                                    <a href='EliminarServicios.php'><input type='button' class='button special style5 large' value='Eliminar Otro Servicio'></a>
                                    <li>
                                    <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                                    </li></form></ul>";
                                }
                                else 
                                {
                                    echo "<h2>¡Error, al eliminar el servicio de la base de datos!</h2>";
                                    echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                                    echo "<ul class='actions special'><form id='back' name='back'><li>
                                    <a href='EliminarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                                    </li></form></ul>";
                                }
                            }
                            $Base ->close();
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