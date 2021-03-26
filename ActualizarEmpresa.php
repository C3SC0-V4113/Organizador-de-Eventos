<!DOCTYPE HTML>
<html>
<head>
    <title>ORGANIZADORA DE EVENTOS</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time() . ".0"; ?>" />

    <!-- picker-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="dist/css/fontawesome-iconpicker.min.css?<?php echo time() . ".0"; ?>" rel="stylesheet">
</head>

<?php session_start(); ?>

<body class="no-sidebar is-preload">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <select name="opciones" id="opciones">
            <option>Admin</option>
            <option>Cliente</option>
        </select>
        <input type="submit" name="enviar" id="enviar" value="Cambiar Rol">
    </form>
    <?php
    $admin = true;
    $permiso;
    if (isset($_POST['enviar'])) {
        $permiso = (isset($_POST['opciones'])) ? $_POST['opciones'] : '';
        if ($permiso == 'Admin') {
            $admin = true;
        } else {
            $admin = false;
        }
    }
    echo "<p>El permiso es : $permiso</p>";
    echo "<p>permiso de admin:" . (bool)$admin . "</p>";

    /*function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        if (file_exists($filePath)) {
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;
    }*/

    //Llenando la clase
    require 'class/empresa.class.php';
    //Conexion
    $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
    $Base->set_charset("utf8");
    //Peticion
    $Peticion = 'SELECT * FROM `empresa`';
    $Retorno = $Base->query($Peticion);
    $fila = $Retorno->fetch_assoc();
    //Llenando la clase
    $empresa = new empresa(
        $fila['idEmpresa'],
        $fila['Nombre'],
        $fila['TituloDescripcion'],
        $fila['LogoDesc'],
        $fila['Descripcion'],
        $fila['EventosTitle'],
        $fila['EventosDesc'],
        $fila['UbicTitle'],
        $fila['UbicDesc'],
        $fila['ContactTitle'],
        $fila['ContactDesc'],
        $fila['Slogan'],
        $fila['Telefono'],
        $fila['Direccion'],
        $fila['Email'],
        $fila['Logo_Url']
    );
    ?>
    <div id="page-wrapper">
        <?php
        require './assets/php/header.php';
        //includeWithVariables('./assets/php/header.php', array('admin' => $admin, 'empresa' => $empresa));
        ?>
        <!-- Main -->
        <div id="main" class="wrapper style2">
            <div class="title">Informacion de la Empresa</div>
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <div class="feature-list">
                            <div class="row">
                                <div class="col-xs-12">
                                    <section>
                                        <form class="empresa" id="Updtempresasgen" name="Updtempresasgen" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                            <div class="row gtr-50">
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="nombreEmp">Nombre de la Empresa</label>
                                                    <input class="empresa" value="<?php $empresa->ShowNombre() ?>" type="text" name="nombreEmp" id="nombreEmp" maxlength="45" placeholder="Ingrese el Nombre de la Empresa" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="sloganEmp">Slogan de Empresa</label>
                                                    <input class="empresa" type="text" value="<?php $empresa->ShowSlogan() ?>" name="sloganEmp" id="sloganEmp" maxlength="100" placeholder="Ingrese el slogan de la Empresa" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="DescIcon">Icono de Descripcion</label>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class=" form-group">
                                                                <div class="input-group">
                                                                    <input type="text" id="DescIcon" value="<?php $empresa->Showlogodesc() ?>" name="DescIcon" data-placement="bottomRight" class="form-control icp icp-auto" value="fas fa-archive" readonly style="cursor:default;" />
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
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="DescTitle">Titulo Descripcion</label>
                                                    <input class="empresa" type="text" value="<?php $empresa->Showtitulodesc() ?>" name="DescTitle" id="DescTitle" maxlength="25" placeholder="Ingrese el Titulo de la Descripcion" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-xs-12">
                                                    <label for="DescEmp">Descripción de Empresa</label>
                                                    <textarea class="empresa" name="DescEmp" id="DescEmp" placeholder="Ingrese la historia de la empresa" rows="4" onchange="cancel = true;"><?php $empresa->ShowDescripcion() ?></textarea>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="telefono">Telefono</label>
                                                    <input class="empresa" value="<?php $empresa->ShowTelefono() ?>" type="text" name="telefono" id="nombreEmp" maxlength="8" placeholder="Ingrese el Número telefonico" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="direccion">Dirección</label>
                                                    <input class="empresa" type="text" value="<?php $empresa->ShowDireccion() ?>" name="direccion" id="direccion" maxlength="100" placeholder="Ingrese el slogan de la Empresa" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="email">Email</label>
                                                    <input class="empresa" type="text" value="<?php $empresa->ShowEmail() ?>" name="email" id="email" maxlength="100" placeholder="Ingrese el slogan de la Empresa" onchange="cancel = true;" />
                                                </div>
                                                <!--Contacto-->
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="TitleContact">Titulo Contactos</label>
                                                    <input class="empresa" type="text" value="<?php $empresa->Showcontacttitle() ?>" name="TitleContact" id="TitleContact" maxlength="25" placeholder="Ingrese el Titulo de los Contactos" onchange="cancel = true;" />
                                                </div>
                                                <div class="col-xs-12">
                                                    <label for="DescContact">Descripción de Contactos</label>
                                                    <textarea class="empresa" name="DescContact" id="DescContact" placeholder="Ingrese la descripcion de los Contactos" rows="4" onchange="cancel = true;"><?php $empresa->Showcontactdesc() ?></textarea>
                                                </div>
                                                <!--Botones-->
                                                <div class="col-xs-12">
                                                    <ul class="actions">
                                                        <li><input type="submit" id='guardarGen' name="guardarGen" class="style5" value="Guardar Cambios" onclick="cancel = false;" /></li>
                                                        <li><input type="reset" class="style2" value="Limpiar Campos" onclick="Limpiar()" /></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['guardarGen'])) {
                                            $nombre = (isset($_POST['nombreEmp'])) ? $_POST['nombreEmp'] : $empresa->ShowNombre();
                                            $slogan = (isset($_POST['sloganEmp'])) ? $_POST['sloganEmp'] : $empresa->ShowSlogan();
                                            $icono = (isset($_POST['DescIcon'])) ? $_POST['DescIcon'] : $empresa->Showlogodesc();
                                            $DescTitle = (isset($_POST['DescTitle'])) ? $_POST['DescTitle'] : $empresa->Showtitulodesc();
                                            $DescEmp = (isset($_POST['DescEmp'])) ? $_POST['DescEmp'] : $empresa->ShowDescripcion();
                                            $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : $empresa->ShowTelefono();
                                            $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : $empresa->ShowDireccion();
                                            $email = (isset($_POST['email'])) ? $_POST['email'] : $empresa->ShowEmail();
                                            $titleContact = (isset($_POST['TitleContact'])) ? $_POST['TitleContact'] : $empresa->Showcontacttitle();
                                            $DescContact = (isset($_POST['DescContact'])) ? $_POST['DescContact'] : $empresa->Showcontactdesc();
                                            $actualizacion = $empresa->ActualizarGen($nombre, $slogan, $icono, $DescTitle, $DescEmp, $telefono, $direccion, $email, $titleContact, $DescContact);

                                            if ($Base->query($actualizacion) === TRUE) {
                                                echo '<div class="alert alert-success" role="alert">Actualizado Correctamente</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">Ha ocurrido un Error al actualizar: ' . $Base->error . '</div>';
                                            }
                                        }
                                        ?>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
            <header class="style1">
                <h1>Control de Redes</h1>
            </header>
            <!--Redes Sociales-->
            <div class="container">
                <!-- Content -->
                <div id="content">
                    <article class="box post">
                        <div class="feature-list">
                            <div class="row">
                                <section>
                                    <div class="col-xs-12">
                                        <?php require 'class/enlace.class.php'; ?>
                                        <form action="class/enlace.class.php" method="post">
                                            <div class="row gtr-50">
                                            <input type="hidden" name="idss" id="idss" value="<?php echo $id ?>">
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="nombreredes">Ingrese el nombre de la red</label>
                                                    <input type="text" class="redes" value="<?php echo $nombre; ?>" name="nombreredes" id="nombreredes">
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label for="urlred">Ingrese la dirección</label>
                                                    <input type="text" class="redes" value="<?php echo $urls; ?>" name="urlred" id="urlred">
                                                </div>
                                                <div class="col-xs-12" id="tabla">
                                                    <?php
                                                    function pre_r($array)
                                                    {
                                                        echo '<pre>';
                                                        print_r($array);
                                                        echo '</pre>';
                                                    }

                                                    $mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);
                                                    $inner = "SELECT enlaces.IDEnlaces, enlaces.Nombre,enlaces.Enlace
                                                    FROM enlaces
                                                    INNER JOIN detalle_empresa_enlaces
                                                    ON enlaces.IDEnlaces=detalle_empresa_enlaces.IDEnlaces
                                                    INNER JOIN empresa
                                                    ON detalle_empresa_enlaces.IDEmpresa=empresa.idEmpresa";
                                                    $resultado = $mysqli->query($inner);
                                                    //pre_r($resultado->fetch_assoc());
                                                    ?>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Enlace</th>
                                                                <th colspan="2">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($selector = $resultado->fetch_assoc()) :
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $selector['Nombre'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $selector['Enlace'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="ActualizarEmpresa.php?edit=<?php echo $selector['IDEnlaces']; ?>" class="btn btn-info">Editar</a>
                                                                        <a href="ActualizarEmpresa.php?delete=<?php echo $selector['IDEnlaces']; ?>" class="btn btn-danger">Eliminar</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <ul class="actions">
                                                        <?php
                                                        if ($update == true) :
                                                        ?>
                                                            <li><input type="submit" id='actualizarRedes' name="actualizarRedes" class="style5" value="Actualizar Datos" onclick="cancel = false;" /></li>
                                                        <?php else : ?>
                                                            <li><input type="submit" id='guardarRedes' name="guardarRedes" class="style5" value="Guardar Cambios" onclick="cancel = false;" /></li>
                                                        <?php endif; ?>
                                                        <li><input type="reset" class="style2" value="Limpiar Campos" onclick="Limpiar()" /></li>
                                                    </ul>
                                                </div>
                                                <?php
                                                if (isset($_SESSION['mensaje'])) :
                                                ?>
                                                    <div class="alert col-xs-12 alert-<?php echo $_SESSION['msg_type'] ?>">
                                                        <?php
                                                        echo $_SESSION['mensaje'];
                                                        unset($_SESSION['mensaje']);
                                                        ?>
                                                    </div>
                                                <?Php endif; ?>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
        <!-- Highlights -->
        <section id="highlights" class="wrapper style3">
            <div class="title">Presentación</div>
            <div class="container">
                <article class="box post">
                    <div class="feature-list">
                        <form class="empresa" id="Updtempresashigh" name="Updtempresashigh" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="row gtr-50">
                                <div class="col-xs-12 col-md-6">
                                    <label for="titleEvent">
                                        <p class="descrip">Titulo de Eventos</p>
                                    </label>
                                    <input class="empresa" value="<?php $empresa->Showeventostitle() ?>" type="text" name="titleEvent" id="titleEvent" maxlength="25" placeholder="Ingrese el Titulo" onchange="cancel = true;" />
                                </div>
                                <div class="col-xs-12">
                                    <label for="descEvent">
                                        <p class="descrip">Descripción de Empresa</p>
                                    </label>
                                    <textarea class="empresa" name="descEvent" id="descEvent" placeholder="Ingrese la descripción" rows="4" onchange="cancel = true;"><?php $empresa->Showeventosdesc() ?></textarea>
                                </div>
                                <div class="col-xs-12">
                                    <ul class="actions">
                                        <li><input type="submit" id='guardarEvent' name="guardarEvent" class="style5" value="Guardar Cambios" onclick="cancel = false;" /></li>
                                        <li><input type="reset" class="style2" value="Limpiar Campos" style="color: #B1B4B9;" onclick="Limpiar()" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['guardarEvent'])) {
                            $titulo = (isset($_POST['titleEvent'])) ? $_POST['titleEvent'] : $empresa->Showeventostitle();
                            $desc = (isset($_POST['descEvent'])) ? $_POST['descEvent'] : $empresa->Showeventosdesc();

                            $actualizacion = $empresa->ActualizarHighlights($titulo, $desc);

                            if ($Base->query($actualizacion) === TRUE) {
                                echo '<div class="alert alert-success" role="alert">Actualizado Correctamente</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Ha ocurrido un Error al actualizar: ' . $Base->error . '</div>';
                            }
                        }
                        ?>
                    </div>
                </article>
            </div>
        </section>
        <!--Ubicacion-->
        <section id="highlights" class="wrapper style4">
            <div class="title">Ubicacion</div>
            <div class="container">
                <article class="box post">
                    <div class="feature-list">
                        <form class="empresa" id="UpdtempresasUbic" name="UpdtempresasUbic" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="row gtr-50">
                                <div class="col-xs-12 col-md-6">
                                    <label for="titleContact">
                                        <p class="descrip">Titulo de Ubicación</p>
                                    </label>
                                    <input class="empresa" value="<?php $empresa->Showubictitle() ?>" type="text" name="titleUbic" id="titleUbic" maxlength="25" placeholder="Ingrese el Titulo" onchange="cancel = true;" />
                                </div>
                                <div class="col-xs-12">
                                    <label for="descUbi">
                                        <p class="descrip">Descripción de Ubicación</p>
                                    </label>
                                    <textarea class="empresa" name="descUbi" id="descUbi" placeholder="Ingrese la descripción" rows="4" onchange="cancel = true;"><?php $empresa->Showubicdesc() ?></textarea>
                                </div>
                                <div class="col-xs-12">
                                    <ul class="actions">
                                        <li><input type="submit" id='guardarUbic' name="guardarUbic" class="style5" value="Guardar Cambios" onclick="cancel = false;" /></li>
                                        <li><input type="reset" class="style2" value="Limpiar Campos" style="color: #B1B4B9;" onclick="Limpiar()" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['guardarUbic'])) {
                            $tituloU = (isset($_POST['titleUbic'])) ? $_POST['titleUbic'] : $empresa->Showubictitle();
                            $descU = (isset($_POST['descUbi'])) ? $_POST['descUbi'] : $empresa->Showubicdesc();

                            $actualizacionU = $empresa->ActualizarUbicacion($tituloU, $descU);

                            if ($Base->query($actualizacionU) === TRUE) {
                                echo '<div class="alert alert-success" role="alert">Actualizado Correctamente</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Ha ocurrido un Error al actualizar: ' . $Base->error . '</div>';
                            }
                        }
                        ?>
                    </div>
                </article>
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
    <script src="assets/js/ConfirmarSalir.js"></script>
    <script src="assets/js/RellenarInputs.js?<?php echo time() . ".0"; ?>"></script>

    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/fontawesome-iconpicker.js?<?php echo time() . ".0"; ?>"></script>

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