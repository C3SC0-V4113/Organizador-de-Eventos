<!DOCTYPE HTML>
<html>

<head>
    <title>Servicios - Wine & Champagne Eventos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time().".0"; ?>" media="all" />
    <link rel="stylesheet" href="assets/css/Login.css?<?php echo time().".0"; ?>" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time().".0"; ?>" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


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
                    <li>
                      <a href="EventAd.php">EVENTOS</a>
                    </li>
                    <li>
                      <a href="Base.html">QUIENES SOMOS</a>
                    </li>
                    <li class="current"><a href="Base.html">CONTACTANOS</a></li>
                </ul>
            </nav>

        </section>

        <!-- Main -->
          <div id="main" class="wrapper style3">
            <div class="title">Información de Usuario</div>
           <!--Sep-->
           <div class="container">
             <div id="content">
               <?php
               session_start();
               if(isset($_SESSION['Usuario'])){
                 $user = $_SESSION['Usuario'];
                 $pass = $_SESSION['password'];
                 echo "<form class='' action='class/Client.php' method='post'>
                   <div class=\"row gtr-50\">
                     <div class=\"col-md-4\">
                     </div>
                      <div class=\"col-md-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Usuario</label>
                        <input type='text' class=\"form-control\" name='Usuario' id='Usuario' value='$user' readonly><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Contraseña</label>
                        <input type=\"password\" class=\"form-control\" value='$pass' id='password' readonly><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Confirmar Contraseña</label>
                        <input type=\"password\" class=\"form-control\" name='password2' value='$pass' id='password2' readonly><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Nombre</label>
                        <input type='text' class=\"form-control\" name='Nombre' value='' id='Nombre'><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Telefono</label>
                        <input type='text' class=\"form-control\" name='Telefono' value='' id='Telefono' title='Ejemplo: 1234-5678'  pattern=\"[0-9]{4}-[0-9]{4}\"><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4 col-12-small text-center\">
                        <label for='' style='color:white;'>Correo</label>
                        <input type='email' class=\"form-control\" name='Correo' value='' id='Correo'  pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$\"><br>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                      <div class=\"col-md-4 text-center\">
                        <button type=\"submit\" class=\"style4 \" style='padding: 0px 30px; ' name='button' value='Enviar'>Seguir</button>
                      </div>
                      <div class=\"col-md-4\">
                      </div>
                   </div>


                 </form>";
               }else {
                 echo "Sin session";
               }

               ?>
             </div>
           </div>
          </div>
         <!--Sep-->
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
    <script src="assets/js/inputs.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time().".0"; ?>"></script>

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time().".0"; ?>"></script>




</body>

</html>
