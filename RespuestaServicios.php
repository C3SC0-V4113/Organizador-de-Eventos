<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <?php
    session_start();
    ?>
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
                                $Usuario = isset($_SESSION['IdUsuario']) ? trim($_SESSION['IdUsuario']):-1;
                                $Empresa = isset($_SESSION['IdEmpresa']) ? trim($_SESSION['IdEmpresa']):-1;
                                
                                if($nameS!=-1 && $descripS!=-1 && $iconoS!=-1 && $Usuario!=-1 && $Empresa!=-1)
                                {
                                    $Id=$Servicios->ConsultaNumId();
                                    $Exito = $Servicios ->InsertarServicio($Id,$nameS,$descripS,$iconoS,$Usuario,$Empresa);
                                    if(($Exito)!=0 && ($Exito)!=-1)
                                    {
                                        $Servicios->Exito($nameS,1);
                                    }
                                    else 
                                    {
                                        $Servicios->Errores(1);
                                    }
                                }
                                else 
                                {
                                    $Servicios->Errores(2);
                                }

                            }
                            else if(isset($_POST['actualizarH']))
                            {

                                $tituloH = isset($_POST['tituloH']) ? trim($_POST['tituloH']):-1;
                                $descripH = isset($_POST['descripH']) ? trim($_POST['descripH']):-1;
                                $Empresa = isset($_SESSION['IdEmpresa']) ? trim($_SESSION['IdEmpresa']):-1;
                                $Consulta = "SELECT * FROM InfoServicios";
                                $Resultados = $Base->query($Consulta);
                                if($Resultados->num_rows!=0)
                                {
                                    $Exito = $Servicios->ActualizarHeader($tituloH,$descripH,$Empresa,2);
                                }
                                else 
                                {
                                    $Exito = $Servicios->ActualizarHeader($tituloH,$descripH,$Empresa,1);
                                }
                                $Exito = $Base->affected_rows;
                                if($Exito!=-1)
                                {
                                    $Servicios->Exito('',2);
                                }
                                else 
                                {
                                   $Servicios->Errores(3);
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
                                           $Servicios->Errores('',4);
                                       }
                                       else 
                                       {
                                            $Exito = $Servicios->ActualizarServicio($nameS,$descripS,$iconoS,$ID);
                                            if($Exito!=-1)
                                            {
                                                $Servicios->Exito($nameS,3);
                                            }
                                            else 
                                            {
                                                $Servicios->Errores(5);
                                            }
                                       }
                                        
                                    }  
                                }
                            }
                            else if(isset($_POST['eliminarS']))
                            {
                                $deleteID= isset($_POST['IdServicios']) ? trim($_POST['IdServicios']):-1;
                                $nameS = isset($_POST['name']) ? trim($_POST['name']):-1;
                                $Exito = $Servicios->EliminarServicio($deleteID);
                                if($Exito!=-1)
                                {
                                    $Servicios->Exito($nameS,4);
                                }
                                else 
                                {
                                    $Servicios->Errores(6);
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