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

    <?php
		require './assets/php/header.php';
		?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Agregar Eventos</div>
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
                                    $eli = false;
                                    if($numFotos!=-1)
                                    {
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
                                            print_r($_FILES['ImagenesE']['name'][0]);
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
                        else if(isset($_POST['PublicarR']))
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
                                    if($numFotos!=-1)
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
                                        $Exito = $Eventos->PublicarReservacion($nameE,$descripE,$TipoE,$fechaE,$LugarE,$CliE,$idEvento);
                                            
                                            if($Direcciones!='ninguna')
                                            {
                                                $Subida = $Eventos->GuardarImagenesBase($Direcciones,$idEvento);
                                                if(($Subida->affected_rows)!=0 && ($Subida->affected_rows)!=-1)
                                                {
                                                    $Eventos->Exitos(4,$nameE);
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