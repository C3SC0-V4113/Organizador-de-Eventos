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
            <div class="title">Eliminar Servicios</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <header class="style1">
                            <h2>Eliminar Servicios de la Web</h2>
                            <p>Seleccione el Servicio que desea eliminar:</p>
                        </header>
                        <?php 
                        $matrizBD = array(
                            '1'=> array(
                                'name'=>'Servicio chingon 1',
                                'descrip'=>'descrip chingona 1',
                                'url' => 'images/pic01.jpg'),
                            '2'=> array(
                                'name'=>'Servicio chido 2',
                                'descrip'=>'descrip chingona 2',
                                'url' => 'images/pic02.jpg'),
                            '3'=> array(
                                'name'=>'Servicio genial 3',
                                'descrip'=>'descrip chingona 3',
                                'url' => 'images/pic03.jpg'),
                            '4'=> array(
                                'name'=>'Servicio sabroson 4',
                                'descrip'=>'descrip chingona 4',
                                'url' => 'images/pic04.jpg'),
                            '5'=> array(
                                'name'=>'Servicio chingon 5',
                                'descrip'=>'descrip chingona 5',
                                'url' => 'images/pic05.jpg'),
                            '6'=> array(
                                'name'=>'Servicio chido 6',
                                'descrip'=>'descrip chingona 6',
                                'url' => 'images/pic06.jpg'),
                            '7'=> array(
                                'name'=>'Servicio genial 7',
                                'descrip'=>'descrip chingona 7',
                                'url' => 'images/pic07.jpg'),
                            '8'=> array(
                                'name'=>'Servicio cool 8',
                                'descrip'=>'descrip chingona 8',
                                'url' => 'images/pic08.jpg'),
                            '9'=> array(
                                'name'=>'Servicio chingon 9',
                                'descrip'=>'descrip chingona 9',
                                'url' => 'images/pic09.jpg'));

                        ?>
                        <script type="text/javascript">
                        // obtenemos el array de valores mediante la conversion a json del
                        // array de php
                        var arrayJS = <?php echo json_encode($matrizBD);?>;

                        // Mostramos los valores del array
                        for (var i = 0; i < arrayJS.length; i++) {
                            console.log("<br>" + arrayJS[i]);
                        }
                        </script>

                        <form name="PantallaSer" id="PantallaSer">
                            <select name="Pantalla" id="Pantalla" size="8"
                                onchange="Rellenar(arrayJS[this.value]['name'],arrayJS[this.value]['descrip'],arrayJS[this.value]['url'])">
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
                            <form class="service" id="AddServices" name="AddServices" method="post"
                                action="./Guardar en Base" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="style6" value="Eliminar Servicio" /></li>
                                            <li><input type="submit" class="style2" value="Cancelar"
                                                    onclick="document.AddServices.action = 'ServiciosAd.php';" />
                                            </li>
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

</body>

</html>