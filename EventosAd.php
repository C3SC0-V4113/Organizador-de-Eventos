<!DOCTYPE HTML>
<html>

<head>
    <title>Eventos - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <link rel="stylesheet" href="assets/css/main2.css">
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

    <?php
		require './assets/php/header.php';
		?>

        <!-- EVENTOS -->
        <?php       
			
		?>
        <section id="highlights" class="wrapper style2">
					<div class="title">NUESTROS EVENTOS</div>
					<div class="container">
                        <div class="box post">
                    <header class="style2">
                    <h2>EDITAR EVENTOS</h2>
                </header>
                <ul class="actions special">
                    <form id="servicesbtn" name="servicesbtn">
                        <a href="./AgregarEvento.php">
                        <li><input type="button" class="button special style5 large " value="Agregar Eventos"
                                 />
                        </li></a>
                        <a href="./ActualizarEvento.php">
                        <li><input type="button" class="button special style5 large" value="Actualizar Eventos"
                                 />
                        </li></a>
                        <a href="./EliminarEventos.php">
                        <li><input type="button" class="button special style5 large" value="Eliminar Eventos"
                                />
                        </li></a>


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
                        <?php 
                                $Consulta = "Select idEventos,IdTipoEvento,Nombre,fecha,Lugar,Cliente,substring(Descripcion,1,95) as Descripcion from Eventos order by idEventos desc";
                                $Ejecucion = $Base->query($Consulta);
                                $Consulta2 = "Select * from tipoevento";
                                $Ejecucion2 = $Base->query($Consulta2);
                                
                                if($Ejecucion2->num_rows!=0)
                                {
                                    while($tipos = $Ejecucion2->fetch_assoc())
                                    {
                                        $todostipos[$tipos['idTipoEvento']]=$tipos;
                                    }
                                }
                                if($Ejecucion->num_rows!=0)
                                {
                                    if($Ejecucion)
                                    {
                                        while ($fila = $Ejecucion->fetch_assoc())
                                        {
                                            $Consulta3 = "Select * from FotosEventos where idEventos='".$fila['idEventos']."' order by idFotos asc LIMIT 1";
                                            $Ejecucion3 = $Base->query($Consulta3);
                                            $EventosM -> ExtraerBaseE($fila);
                                            $EventosM -> ExtraerTipo($todostipos[$fila['IdTipoEvento']]);
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
                                
                                $Base -> close();          
		                        ?>
						</div>
					</div>
				</section>

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
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>

</body>

</html>