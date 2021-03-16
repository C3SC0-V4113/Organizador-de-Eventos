<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />

    <!-- picker-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time().".0"; ?>" rel="stylesheet">
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
                    <li><a href="indexAdmin.php">INICIO</a></li>
                    <li>
                        <a href="ServiciosAd.php">NUESTROS SERVICIOS</a>
                        <ul>
                            <li><a href="EditarHeader.php">Editar Header</a></li>
                            <li>
                                <a href="">Editar Servicios</a>
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
                        $matrizBD = array(
                            '1'=> array(
                                'name'=>'Servicio chingon 1',
                                'descrip'=>'descrip chingona 1',
                                'icono' => 'fas fa-bicycle'),
                            '2'=> array(
                                'name'=>'Servicio chido 2',
                                'descrip'=>'descrip chingona 2',
                                'icono' => 'fas fa-coffe'),
                            '3'=> array(
                                'name'=>'Servicio genial 3',
                                'descrip'=>'descrip chingona 3',
                                'icono' => 'fas fa-utensils'),
                            '4'=> array(
                                'name'=>'Servicio sabroson 4',
                                'descrip'=>'descrip chingona 4',
                                'icono' => 'fas fa-bath'),
                            '5'=> array(
                                'name'=>'Servicio chingon 5',
                                'descrip'=>'descrip chingona 5',
                                'icono' => 'fas fa-money-bill-alt'),
                            '6'=> array(
                                'name'=>'Servicio chido 6',
                                'descrip'=>'descrip chingona 6',
                                'icono' => 'fas fa-user'),
                            '7'=> array(
                                'name'=>'Servicio genial 7',
                                'descrip'=>'descrip chingona 7',
                                'icono' => 'fas fa-users'),
                            '8'=> array(
                                'name'=>'Servicio cool 8',
                                'descrip'=>'descrip chingona 8',
                                'icono' => 'fas fa-glass-martini'),
                            '9'=> array(
                                'name'=>'Servicio chingon 9',
                                'descrip'=>'descrip chingona 9',
                                'icono' => 'far fa-calendar-alt'));
                        ?>

                        <script type="text/javascript">
                        var arrayJS = <?php echo json_encode($matrizBD);?>;
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>

                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="8"
                                onchange="RellenarS(arrayJS[this.value]['name'],arrayJS[this.value]['descrip'],arrayJS[this.value]['icono'])">
                                <?php 
                            for ($i=1; $i <= sizeof($matrizBD) ; $i++) 
                            { 
                              echo "<option value='".$i."'>".$matrizBD[$i]['name']."</option>";
                            }
                            ?>
                            </select>
                        </form>
                        <hr>
                        <section>
                            <header class="style2">
                                <h2>Modifique el Servicio:</h2>
                            </header>
                            <form class="service" id="AddServices" name="AddServices" method="post"
                                action="./Guardar en Base" enctype="multipart/form-data">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <label for="nombreS">Nombre del Servicio</label>
                                        <input class="service" type="text" name="nombreS" id="nombreS"
                                            placeholder="Ingrese el Nombre del Servicio" onchange="cancel = true;" />
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <label for="urlIcon">Icono del Servicio</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" form-group">
                                                    <div class="input-group">
                                                        <input data-placement="bottomRight" id="urlIcon" name="urlIcon"
                                                            class="form-control icp icp-auto" value="fas fa-archive"
                                                            type="text" readonly style="cursor:default;"/>
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
                                    <div class="col-12 col-12-small">
                                        <label for="descripS">Descripción del Servicio</label>
                                        <textarea class="service" name="descripS" id="descripS"
                                            placeholder="Ingrese la Descripción del Servicio" rows="4"
                                            onchange="cancel = true;"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style5" value="Guardar Cambios" /></li>
                                            <li><input type="submit" class="style2" value="Cancelar"
                                                    onclick="cancel = true; document.AddServices.action = 'ServiciosAd.php';" />
                                            </li>
                                            <li><input type="reset" class="style2" value="Limpiar Campos"
                                                    onclick="Limpiar()" /></li>
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