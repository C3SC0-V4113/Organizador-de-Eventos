<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <link rel="stylesheet" href="assets/css/main2.css?<?php echo time().".0"; ?>">
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
                <h1><a href="index.html">WINE & CHAMPAGNE<br>EVENTOS</a></h1>
                <p>¡B I E N V E N I D O S!</p>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="indexAdmin.html">INICIO</a></li>
                    <li>
                        <a href="ServiciosAd.php">NUESTROS SERVICIOS</a>
                    </li>
                    <li><a href="EventosAd.php">EVENTOS</a>
                        <ul>
                            <li>
                                <a href="EventosAd.php">Editar Eventos</a>
                                <ul>
                                    <li><a href="AgregarEvento.php">Agregar Eventos</a></li>
                                    <li><a href="ActualizarEvento.php">Actualizar Eventos</a></li>
                                    <li><a href="EliminarEventos.php">Eliminar Eventos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="Base.html">QUIENES SOMOS</a></li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- EVENTOS -->
        <section id="highlights" class="wrapper style2">
					<div class="title">NUESTROS EVENTOS</div>
					<div class="container">
                        <div class="box post">
                    <header class="style2">
                    <h2>EDITAR EVENTOS</h2>
                </header>
                <ul class="actions special">
                    <form id="servicesbtn" name="servicesbtn">
                        <li><input type="submit" class="button special style5 large " value="Agregar Eventos"
                                onclick="document.servicesbtn.action = 'AgregarEvento.php';" />
                        </li>
                        <li><input type="submit" class="button special style5 large" value="Actualizar Eventos"
                                onclick="document.servicesbtn.action = 'ActualizarEvento.php';" />
                        </li>
                        <li><input type="submit" class="button special style5 large" value="Eliminar Eventos"
                                onclick="document.servicesbtn.action = 'EliminarEventos.php';" />
                        </li>

                    </form>
                    <hr>
                </ul>
                </div>
                <?php 
                        require 'class/Events.php';
                        $EventosM = new MetodosEventos();
		                $EventosM -> GenerarHeaderEventos('EVENTOS EXTRAORDINARIOS','Para que tus eventos sean únicos y especiales');
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
		                ?>
                        <br>
						<div class="row aln-center">
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
                        <div class="col-4 col-12-medium" id="columna2"></div>
                        <div class="col-4 col-12-medium" id="columna3"></div>
                        </form>

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
                                            echo "<p>Oops! Parece que no hay eventos con ese nombre.</p><hr></header>";
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
                                        $Consulta = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente order by fecha DESC";
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
                                        $Consulta = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente order by fecha DESC";
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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>
   

</body>

</html>