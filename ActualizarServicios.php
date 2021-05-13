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
    <!-- picker-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time().".0"; ?>" rel="stylesheet">
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
		<?php
		require './assets/php/header.php';
		?>

        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Actualizar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Actualizar Servicios de la Web</h2>
                            <p>Seleccione el Servicio que desea modificar:</p>
                        </header>
                        <?php 
                        require 'class/servicios.php';
                        $Servicios = new Servicio();
                        $Base = new mysqli('localhost','root','','mydb',3307);
                        $Base -> set_charset("utf8");
                        $Consulta = "Select * from Servicios order by Nombre asc";
                        $Ejecucion = $Base->query($Consulta);
                        if($Ejecucion->num_rows!=0)
                        {
                            if($Ejecucion)
                            {
                                $i=1;
                                while ($fila = $Ejecucion->fetch_assoc())
                                {
                                    $Datos[$i] = $fila;
                                    $i++;
                                }
                            }  
                        }
                        else 
                        {
                            $Datos[1] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[2] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[3] = array('idServicios' => '','Nombre' => 'Oops!','Descripcion' => '','urlIMG' =>'none');
                            $Datos[4] = array('idServicios' => '','Nombre' => 'Aún no hay servicios registrados en la Base de Datos','Descripcion' => '','urlIMG' =>'none');
                            $Datos[5] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                            $Datos[6] = array('idServicios' => '','Nombre' => '','Descripcion' => '','urlIMG' =>'none');
                        }
                        ?>
                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($Datos);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>

                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="7"
                                onchange="RellenarS(arrayJS[this.value]['Nombre'],arrayJS[this.value]['Descripcion'],arrayJS[this.value]['urlIMG'],arrayJS[this.value]['Precio'],arrayJS[this.value]['idServicios'])">
                                <?php 
                            for ($i=1; $i <= sizeof($Datos) ; $i++) 
                            { 
                              echo "<option value='".$i."'>";
                              if($Datos[$i]['urlIMG']!="none"){echo "Servicio $i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                              else{}
                              echo $Datos[$i]['Nombre']."</option>";
                            }
                            ?>
                            </select>
                        </form>
                        <section>
                            <header class="style2">
                                <h2>Modifique el Servicio:</h2>
                            </header>
                            <form class="service" id="AddServices" name="AddServices" method="post"
                                action="RespuestaServicios.php" enctype="multipart/form-data">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <label for="nombreS">Nombre del Servicio</label>
                                        <input class="service" type="text" name="nombreS" id="nombreS" disabled
                                            placeholder="Ingrese el Nombre del Servicio" onchange="cancel = true;" maxlength ="45"
                                            required />
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <label for="urlIcon">Icono del Servicio</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" form-group">
                                                    <div class="input-group">
                                                        <input data-placement="bottomRight" id="Icono" name="Icono"
                                                            class="form-control icp icp-auto" value="fas fa-archive"
                                                            type="text" readonly style="cursor:default;" required />
                                                        <span class="input-group-addon" style="cursor:pointer;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer" style="display:none">
                                            <button style="display:none" class="btn btn-default action-create">Create
                                                instances</button>
                                        </div>
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <label for="PresioS">Precio ($)</label>
                                        <input class="service" type="number" name="PresioS" id="PresioS" maxlength="45"
                                            placeholder="Precio del Servicio" onchange="cancel = true;"
                                            required />
                                    </div>
                                    <div class="col-12 col-12-small">
                                        <label for="descripS">Descripción del Servicio</label>
                                        <textarea class="service" name="descripS" id="descripS" maxlength ="300"
                                            placeholder="Ingrese la Descripción del Servicio" rows="4"
                                            onchange="cancel = true;" disabled required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input id="modificarS" name="modificarS" type="submit" class="style5"
                                                    value="Guardar Cambios" onclick="cancel=false;" disabled /></li>
                                            <li><input type="submit" class="style2" value="Cancelar"
                                                    onclick="cancel = true; document.AddServices.action = 'ServiciosAdmin.php';" />
                                            </li>
                                            <li><input type="reset" class="style2" value="Limpiar Campos"
                                                    onclick="Limpiar()" /></li>
                                            <input type="hidden" id="IdServicios" name="IdServicios" value="-1" readonly required>
                                        </ul>
                                    </div>

                                </div>
                            </form>
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
    <!--picker-->
    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>

    <script>
    $(function() {
        $('.action-destroy').on('click', function() {
            $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
        });
        // Live binding of buttons
        $(document).on('click', '.action-placement', function(e) {
            $('.action-placement').removeClass('active');
            $(this).addClass('active');
            $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
            e.preventDefault();
            return false;
        });
        $('.action-create').on('click', function() {
            $('.icp-auto').iconpicker();

            $('.icp-dd').iconpicker({
                //title: 'Dropdown with picker',
                //component:'.btn > i'
            });
            $('.icp-opts').iconpicker({
                title: 'With custom options',
                icons: [{
                        title: "fab fa-github",
                        searchTerms: ['repository', 'code']
                    },
                    {
                        title: "fas fa-heart",
                        searchTerms: ['love']
                    },
                    {
                        title: "fab fa-html5",
                        searchTerms: ['web']
                    },
                    {
                        title: "fab fa-css3",
                        searchTerms: ['style']
                    }
                ],
                selectedCustomClass: 'label label-success',
                mustAccept: true,
                placement: 'bottomRight',
                showFooter: true,
                // note that this is ignored cause we have an accept button:
                hideOnSelect: true,
                // fontAwesome5: true,
                templates: {
                    footer: '<div class="popover-footer">' +
                        '<div style="text-align:left; font-size:12px;">Placements: \n\
    <a href="#" class=" action-placement">inline</a>\n\
    <a href="#" class=" action-placement">topLeftCorner</a>\n\
    <a href="#" class=" action-placement">topLeft</a>\n\
    <a href="#" class=" action-placement">top</a>\n\
    <a href="#" class=" action-placement">topRight</a>\n\
    <a href="#" class=" action-placement">topRightCorner</a>\n\
    <a href="#" class=" action-placement">rightTop</a>\n\
    <a href="#" class=" action-placement">right</a>\n\
    <a href="#" class=" action-placement">rightBottom</a>\n\
    <a href="#" class=" action-placement">bottomRightCorner</a>\n\
    <a href="#" class=" active action-placement">bottomRight</a>\n\
    <a href="#" class=" action-placement">bottom</a>\n\
    <a href="#" class=" action-placement">bottomLeft</a>\n\
    <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
    <a href="#" class=" action-placement">leftBottom</a>\n\
    <a href="#" class=" action-placement">left</a>\n\
    <a href="#" class=" action-placement">leftTop</a>\n\
    </div><hr></div>'
                }
            }).data('iconpicker').show();
        }).trigger('click');


        // Events sample:
        // This event is only triggered when the actual input value is changed
        // by user interaction
        $('.icp').on('iconpickerSelected', function(e) {
            $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                e.iconpickerInstance.options.iconBaseClass + ' ' +
                e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
        });
    });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-85082661-5"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-85082661-5');
    </script>

</body>

</html>