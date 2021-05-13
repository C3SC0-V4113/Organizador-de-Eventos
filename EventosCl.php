<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <link rel="stylesheet" href="assets/css/main2.css?<?php echo time().".0"; ?>">
</head>

<body class="no-sidebar is-preload" >
    <div id="page-wrapper">

    <?php
		require './assets/php/headerCli.php';
		?>

        <!-- EVENTOS -->
        <?php       
			
		?>
        <section id="highlights" class="wrapper style2">
					<div class="title" id="scroll">NUESTROS EVENTOS</div>
                    
					<div class="container">
                <div class="content">
                <div class="box post">
                <?php 
                        require 'class/Events.php';
                        $EventosM = new MetodosEventos();
		                $EventosM -> GenerarHeaderEventos('EVENTOS EXTRAORDINARIOS','Para que tus eventos sean únicos y especiales');
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
		                ?>
                </div>
                </div>
                <form method="post" action="EventosCl.php" name="filtroform" id=>
                        <div class="row aln-center">
                        <div class="col-4 col-12-medium">
                                <select name="filtro" id="filtro" onchange="OpcFiltros(this.value,Lugares,Tipos)">
                                    <option disabled selected>Seleccione un filtro</option>
                                    <option value="todos">Todos los Eventos</option>
                                    <option value="nombre">Por Nombre del Evento</option>
                                    <option value="lugar">Por Lugar</option>
                                    <option value="tipo">Por Tipo de Evento</option>
                                    <option value="antiguo">Más antiguos...</option>
                                </select>
                        </div>
                        <div class="col-4 col-12-medium" id="columna2"></div>
                        <div class="col-4 col-12-medium" id="columna3"></div>
                        </form>
                        <?php
                $Consulta2 = "Select * from tipoevento";
                $Ejecucion2 = $Base->query($Consulta2);
                
                if($Ejecucion2->num_rows!=0)
                {
                    while($tipos = $Ejecucion2->fetch_assoc())
                    {
                        $todostipos[]=$tipos;
                    }
                }
                $Consulta3 = "Select * from lugares";
                                $Ejecucion3 = $Base->query($Consulta3);
                                
                                if($Ejecucion3->num_rows!=0)
                                {
                                    while($lug = $Ejecucion3->fetch_assoc())
                                    {
                                        $todoslugares[]=$lug;
                                    }
                                }
                ?>
                <script type="text/javascript">
                        var Tipos = <?php echo json_encode($todostipos);?>;
                        for (var i = 0; i < Tipos.length; i++) {
                            console.log("<br>" + Tipos[i]);
                        }
                </script>
                <script type="text/javascript">
                        var Lugares= <?php echo json_encode($todoslugares);?>;
                        for (var i = 0; i < Lugares.length; i++) {
                            console.log("<br>" + Lugares[i]);
                        }
                </script>
                        
                    </div>
						<div class="row aln-center" id="areaeventos">
                        <?php 
                        if(isset($_POST['busqueda']))
                        {
                            $word = $_POST['busqueda']?$_POST['busqueda']:'';
                            $EventosM->ScriptBusqueda('busqueda','nombre',$word);
                            $Ejec = $EventosM->Busqueda($word,1);
                            if($Ejec->num_rows!=0)
                                {
                                    if($Ejec)
                                    {
                                        while ($fila = $Ejec->fetch_assoc())
                                        {
                                            $Datos[]=$fila;
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que no hay eventos con ese nombre.</p><hr></header>";
                                }
                                echo '<script>parte = document.getElementById("scroll");
                                parte.scrollIntoView();</script>';

                        }
                        else if(isset($_POST['blugares']))
                        {
                            $word = $_POST['blugares']?$_POST['blugares']:'';
                            $EventosM->ScriptBusqueda('blugares','lugar',$word);
                            $Ejec = $EventosM->Busqueda($word,2);
                            if($Ejec->num_rows!=0)
                                {
                                    if($Ejec)
                                    {
                                        while ($fila = $Ejec->fetch_assoc())
                                        {
                                            $Datos[]=$fila;
                                            //$Consulta3='SELECT * FROM `fotoseventos` INNER JOIN eventos ON fotoseventos.idEventos=eventos.idEventos where eventos.Visibilidad=0 AND fotoseventos.idEventos='.$fila['idEventos'].' order by idFotos asc LIMIT 1';
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que no hay eventos en ese lugar.</p><hr></header>";
                                }
                                echo '<script>parte = document.getElementById("scroll");
                                parte.scrollIntoView();</script>';
                            }
                        else if(isset($_POST['btipos']))
                        {
                            $word = $_POST['btipos']?$_POST['btipos']:'';
                            $EventosM->ScriptBusqueda('btipos','tipo',$word);
                            $Ejec = $EventosM->Busqueda($word,3);
                            if($Ejec->num_rows!=0)
                                {
                                    if($Ejec)
                                    {
                                        while ($fila = $Ejec->fetch_assoc())
                                        {
                                            $Datos[]=$fila;
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que no hay eventos de ese tipo.</p><hr></header>";
                                }
                                echo '<script>parte = document.getElementById("scroll");
                                parte.scrollIntoView();</script>';
                            }
                            else if(isset($_POST['filtro']) && $_POST['filtro']=='antiguo')
                            {
                                echo '<script type="text/javascript">
                                document.getElementById("filtro").value = "antiguo";</script>';
                                $Ejec = $EventosM->Busqueda('',4);
                            if($Ejec->num_rows!=0)
                                {
                                    if($Ejec)
                                    {
                                        while ($fila = $Ejec->fetch_assoc())
                                        {
                                            $Datos[]=$fila;
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que no hay eventos con ese nombre.</p><hr></header>";
                                }
                                echo '<script>parte = document.getElementById("scroll");
                                parte.scrollIntoView();</script>';
                            }
                            else if(isset($_POST['filtro']) && $_POST['filtro']=='todos')
                            {
                                echo '<script type="text/javascript">
                                document.getElementById("filtro").value = "todos";</script>';
                                $Consulta = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente WHERE eventos.Visibilidad=0 order by fecha DESC ";
                                $Ejecucion = $Base->query($Consulta);
                                if($Ejecucion->num_rows!=0)
                                {
                                    if($Ejecucion)
                                    {
                                        while ($fila = $Ejecucion->fetch_assoc())
                                        {
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que aún no hay eventos registrados.</p><hr></header>";
                                }
                                echo '<script>parte = document.getElementById("scroll");
                                parte.scrollIntoView();</script>';
                            }
                        else{
                                $Consulta = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente WHERE eventos.Visibilidad=0 order by fecha DESC";
                                $Ejecucion = $Base->query($Consulta);
                                if($Ejecucion->num_rows!=0)
                                {
                                    if($Ejecucion)
                                    {
                                        while ($fila = $Ejecucion->fetch_assoc())
                                        {
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM->ExtraerTipo($fila);
                                            if($Ejecucion3->num_rows!=0)
                                            {
                                                while($img = $Ejecucion3->fetch_assoc())
                                                {
                                                    $EventosM->ExtraerImg($img);
                                                }
                                            }
		                            	    $EventosM -> GenerarMiniEventos();
                                        }
                                    }  
                                }
                                else 
                                {
                                    echo "<header class='col-12 style1'><br><hr>";
                                    echo "<p>Oops! Parece que aún no hay eventos registrados.</p><hr></header>";
                                }
                            }
                                
                                $Base -> close();          
		                        ?>
						</div>
					</div>
				</section>
                <?php
		require './assets/php/footerCli.php';
		?>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    

</body>

</html>