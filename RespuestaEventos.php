<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <?php
    session_start();
    ?>

</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="indexAdmin.php">WINE & CHAMPAGNE<br>EVENTOS</a></h1>
                <p>¡B I E N V E N I D O S!</p>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="indexAdmin.html">INICIO</a></li>
                    <li>
                        <a href="ServiciosAd.php">NUESTROS SERVICIOS</a>
                        <ul>
                            <li><a href="EditarHeader.php">Editar Header</a></li>
                            <li>
                                <a>Editar Servicios</a>
                                <ul>
                                    <li><a href="AgregarServicios.php">Agregar Servicio</a></li>
                                    <li><a href="ActualizarServicios.php">Actualizar Servicio</a></li>
                                    <li><a href="EliminarServicios.php">Eliminar Servicio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="BaseEventos.html">EVENTOS</a></li>
                    <li><a href="Base.html">QUIENES SOMOS</a></li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Agregar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <?php
                            $Base = new mysqli('localhost','root','','mydb',3307);
                            $Base -> set_charset("utf8");
                            require 'class/Events.php';
                            $Eventos = new MetodosEventos();
                            if(isset($_POST['guardarE']))
                            {
                                $nameE = isset($_POST['nombreE']) ? trim($_POST['nombreE']):-1;
                                $CliE = isset($_POST['CliE']) ? trim($_POST['CliE']):-1;
                                $descripE = isset($_POST['descripE']) ? trim($_POST['descripE']):-1;
                                $LugarE = isset($_POST['LugarE']) ? trim($_POST['LugarE']):-1;
                                $TipoE = isset($_POST['TipoE']) ? trim($_POST['TipoE']):-1;
                                $fechaE = isset($_POST['FechaE']) ? trim($_POST['FechaE']):-1;
                                $fechaE = date("Y-m-d",strtotime($fechaE));
                                $Usuario = isset($_SESSION['IdUsuario']) ? trim($_SESSION['IdUsuario']):-1;
                                $Empresa = isset($_SESSION['IdEmpresa']) ? trim($_SESSION['IdEmpresa']):-1;
                                
                                if($nameE!=-1 && $CliE!=-1 && $descripE!=-1 && $LugarE!=-1 && $TipoE!=-1 && $fechaE!=-1)
                                {
                                    $Id= $Eventos->IDEvento();
                                    $Resultado = $Eventos->InsertarEvento($Id,$TipoE,$Empresa,$Usuario,$nameE,$fechaE,$LugarE,$CliE,$descripE);
                                    if($Resultado>0) //Si devuelve 1 es exito, falla si devuelve 0 o -1
                                    {
                                        $Eventos->Exitos(1,$nameE);
                                        if(isset($_FILES['ImagenesE']))
                                        {
                                            $num_archivos = count($_FILES['ImagenesE']['name']);
                                            if($num_archivos!=0)
                                            {
                                                for ($i=0; $i <=$num_archivos; $i++) 
                                                { 
                                                    if(!empty($_FILES['ImagenesE']['name'][$i]))
                                                    {
                                                        $address = "ImagenesSubidas/".$_FILES['ImagenesE']['name'][$i];
                                                        if(file_exists($address))
                                                        {
                                                            echo "<p>El archivo: ".$_FILES['ImagenesE']['name'][$i]." ya existe en el servidor<br>Archivo:</p><br>";
                                                            #$Direcciones[$i]=$address;
                                                        }
                                                        else 
                                                        {
                                                            $temporal = $_FILES['ImagenesE']['tmp_name'][$i];
                                                            move_uploaded_file($temporal,$address);
                                                            $Direcciones[$i]=$address;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        $Eventos->GuardarImagenesBase($Direcciones,$Id);
                                        }
                                        else 
                                        {
                                            $Eventos->Errores(2);
                                        }     
                                    }
                                    else 
                                    {
                                        $Eventos->Errores(1);
                                    }
                                }
                                else if(isset($_POST['modificarE']))
                                {
                                    $idEvento = isset($_POST['idEventos']) ? trim($_POST['idEventos']):-1;
                                    $nameE = isset($_POST['nombreE']) ? trim($_POST['nombreE']):-1;
                                    $CliE = isset($_POST['CliE']) ? trim($_POST['CliE']):-1;
                                    $descripE = isset($_POST['descripE']) ? trim($_POST['descripE']):-1;
                                    $LugarE = isset($_POST['LugarE']) ? trim($_POST['LugarE']):-1;
                                    $TipoE = isset($_POST['TipoE']) ? trim($_POST['TipoE']):-1;
                                    $fechaE = isset($_POST['FechaE']) ? trim($_POST['FechaE']):-1;
                                    $fechaE = date("Y-m-d",strtotime($fechaE));
                                    $numFotos = isset($_POST['numeroFotos']) ? trim($_POST['numeroFotos']):-1;
                                    $Usuario = isset($_SESSION['IdUsuario']) ? trim($_SESSION['IdUsuario']):-1;
                                    $Empresa = isset($_SESSION['IdEmpresa']) ? trim($_SESSION['IdEmpresa']):-1;
                                    $idEliminadas=null;
                                    if($numFotos!=0 && $numFotos!=-1)
                                    {
                                    $eli = false;
                                    $numero =1;
                                    for ($i=1; $i <= $numFotos; $i++) 
                                    { 
                                        
                                        $nom = "eliminado".$i;
                                        $id= isset($_POST[$nom]) ? trim($_POST[$nom]):-1;
                                        if($id!=-1)
                                        {
                                            $idEliminadas[$numero]=$id;
                                            $eli =true;
                                            $numero++;
                                        }
                                        else {
                                        }
                                    }
                                    if(isset($_FILES['ImagenesE']))
                                        {
                                            $num_archivos = $_FILES['ImagenesE']['name'][0];
                                            if(strlen($num_archivos)!=0)
                                            {
                                                for ($i=0; $i <=count($_FILES['ImagenesE']['name']); $i++) 
                                                { 
                                                    if(!empty($_FILES['ImagenesE']['name'][$i]))
                                                    {
                                                        $address = "ImagenesSubidas/".$_FILES['ImagenesE']['name'][$i];
                                                        if(file_exists($address))
                                                        {
                                                            #$Direcciones[$i]=$address;
                                                        }
                                                        else 
                                                        {
                                                            $temporal = $_FILES['ImagenesE']['tmp_name'][$i];
                                                            move_uploaded_file($temporal,$address);
                                                            $Direcciones[$i]=$address;
                                                            print_r($Direcciones);
                                                            
                                                        }
                                                    }
                                                }
                                        }
                                        else
                                        {
                                            $Direcciones = "ninguna";
                                        }
                                        }
                                }
                                if($nameE!=-1 && $CliE!=-1 && $descripE!=-1 && $LugarE!=-1 && $TipoE!=-1 && $fechaE!=-1)
                                {
                                    $Compa = "Select Nombre,Descripcion,IdTipoEvento,fecha,idLugar,idCliente,Descripcion from Eventos where idEventos=$idEvento";
                                    $Comparacion = $Base->query($Compa);
                                    if($Comparacion->num_rows!=0)
                                    {
                                        if($Comparacion)
                                    {
                                    $fila = $Comparacion->fetch_assoc();
                                    if($fila['Nombre'] == $nameE && $fila['Descripcion']==$descripE && $fila['IdTipoEvento']==$TipoE && $fila['fecha']==$fechaE && $fila['idLugar']==$LugarE && $fila['idCliente']==$CliE && strlen($num_archivos)==0 && $eli==false)
                                    {
                                        $Eventos->Errores(3);
                                    }
                                    else 
                                    {
                                        $Exito = $Eventos->ModificarEvento($nameE,$descripE,$TipoE,$fechaE,$LugarE,$CliE,$idEvento);
                                            
                                            if($Direcciones!='ninguna')
                                            {
                                                $Subida = $Eventos->GuardarImagenesBase($Direcciones,$idEvento);
                                                if(($Subida->affected_rows)!=0 && ($Subida->affected_rows)!=-1)
                                                {
                                                    $Eventos->Exitos(2,$nameE);
                                                }
                                                else 
                                                {
                                                        $Eventos->Errores(4);
                                                    
                                                }
                                            }
                                            else 
                                            {
                                                $Eventos->Exitos(2,$nameE);
                                            }
                                            if($idEliminadas!=null)
                                            {
                                                $Eventos->EliminarFotosByS($idEliminadas);
                                            }
                                       }   
                                    }
                                }
                            }    
                        }
                            else if(isset($_POST['EliminarE']))
                            {
                                $deleteID= isset($_POST['idEventos']) ? trim($_POST['idEventos']):-1;
                                $nameE = isset($_POST['nameE']) ? trim($_POST['nameE']):-1;
                                $Traer = "SELECT IdFotos from FotosEventos where idEventos= '".$deleteID."'";
                                $Cons = $Base->query($Traer);
                                if($Cons->num_rows!=0)
                                {
                                    $j=1;
                                    while($row = $Cons->fetch_assoc())
                                    {
                                        $idEliminadas[$j]=$row['IdFotos'];
                                        $j++;
                                    }
                                }
                                if($idEliminadas!=null)
                                {
                                    $Eventos->EliminarFotosByS($idEliminadas);
                                }
                                $Exito = $Eventos->EliminarEvento($deleteID);
                                if($Exito!=-1)
                                {
                                    $Eventos->Exitos(3,$nameE);
                                }
                                else 
                                {
                                    $Eventos->Errores(5);
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

        <!-- Footer -->
        <section id="footer" class="wrapper">
            <div class="title">CONTACTANOS</div>
            <div class="container">
                <header class="style1">
                    <h2>Ipsum sapien elementum portitor?</h2>
                    <p>
                        Sed turpis tortor, tincidunt sed ornare in metus porttitor mollis nunc in aliquet.<br />
                        Nam pharetra laoreet imperdiet volutpat etiam feugiat.
                    </p>
                </header>
                <div class="row">
                    <div class="col-6 col-12-medium">

                        <!-- Contact Form -->
                        <section>
                            <form method="post" action="#">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <input type="text" name="name" id="contact-name"
                                            placeholder="Nombre Completo" />
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <input type="text" name="email" id="contact-email"
                                            placeholder="Correo Electronico" />
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" id="contact-message" placeholder="Mensaje"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style1" value="Enviar" /></li>
                                            <li><input type="reset" class="style2" value="Limpiar" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>

                    </div>
                    <div class="col-6 col-12-medium">

                        <!-- Contact -->
                        <section class="feature-list small">
                            <div class="row">
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-home">Mailing Address</h3>
                                        <p>
                                            Untitled Corp<br />
                                            1234 Somewhere Rd<br />
                                            Nashville, TN 00000
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-comment">Social</h3>
                                        <p>
                                            <a href="#">@untitled-corp</a><br />
                                            <a href="#">linkedin.com/untitled</a><br />
                                            <a href="#">facebook.com/untitled</a>
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-envelope">Email</h3>
                                        <p>
                                            <a href="#">info@untitled.tld</a>
                                        </p>
                                    </section>
                                </div>
                                <div class="col-6 col-12-small">
                                    <section>
                                        <h3 class="icon solid fa-phone">Phone</h3>
                                        <p>
                                            (000) 555-0000
                                        </p>
                                    </section>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div id="copyright">
                    <ul>
                        <li>&copy; Untitled.</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>
            </div>
        </section>

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