<!DOCTYPE HTML>
<html>

<head>
    <title>Iniciar Sesión - Wine & Champagne Eventos</title>
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

        <!-- Main -->
        <div id="main" class="wrapper style2">
         <!--Sep-->
         <div class="login-wrap">
        	<div class="login-html">
        		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="color:#fff;">Iniciar sesión</label>
        		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" style="color:#fff;">Registrarse</label>
            <form method="post" action="class/config1.php" class="login-form">
              <div class="sign-in-htm">
        				<div class="group">
                  <br>
        					<label for="user" class="label">Usuario</label>
        					<input id="user" type="text" class="input" name="Usuario">
        				</div>
        				<div class="group">
                  <br>
        					<label for="pass" class="label">Contraseña</label>
        					<input id="pass" type="password" class="input" data-type="password" name="contraseña">
        				</div>
                <br>
        				<div class="group">
        					<input type="submit" class="button" value="Iniciar sesión" style=" padding: 0px 30px;" formaction="class/config1.php">
        				</div>
        				<div class="hr"></div>
        				<div class="foot-lnk">
        					<a href="#forgot" style="color:#69a0ff">¿Olvidaste la contraseña?</a>
        				</div>
        			</div>
        			<div class="sign-up-htm">
        				<div class="group">
                  <br>
        					<label for="user" class="label">Usuario</label>
        					<input id="user" type="text" class="input" name="Usuario1">
        				</div>
        				<div class="group">
                  <br>
        					<label for="pass" class="label">Contraseña</label>
        					<input id="pass" type="password" class="input" data-type="password" name="contraseña1">
        				</div>
        				<div class="group">
                  <br>
        					<label for="pass" class="label">Confirmar Contraseña</label>
        					<input id="pass" type="password" class="input" data-type="password" name="contraseña2">
        				</div>
        				<div class="group">
                  <br>
        					<input type="submit" class="button" value="Registrarse" style=" padding: 0px 30px;" formaction="class/config2.php">
        				</div>
        			</div>
            </div>
        	</div>
        </div>
         <!--Sep-->
        <!-- Highlights -->
        <!-- Footer -->


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
