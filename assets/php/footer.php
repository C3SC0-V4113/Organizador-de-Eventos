<?php require 'class/enlace.class.php'; ?>
<?php
require_once 'class/empresa.class.php';
$mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307)  or die($mysqli->error);
?>
<!-- Footer -->
<section id="footer" class="wrapper">
    <div class="title">CONTACTANOS</div>
    <div class="container">
        <header class="style1">
            <h2><?php
                $contacttitle = "SELECT `ContactTitle` FROM `empresa` WHERE 1";
                $peticion = $mysqli->query($contacttitle);
                $filaemprcontact = $peticion->fetch_assoc();
                echo $filaemprcontact['ContactTitle'];
                ?></h2>
            <p><?php
                $ContactDesc = "SELECT `ContactDesc` FROM `empresa` WHERE 1";
                $peticion = $mysqli->query($ContactDesc);
                $filaemprcontact = $peticion->fetch_assoc();
                echo $filaemprcontact['ContactDesc'];
                ?></p>
        </header>
        <div class="row">
            <div class="col-6 col-12-medium">
                <!-- Contact Form -->
                <section>
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <input type="text" name="name" id="contact-name" placeholder="Nombre Completo" />
                            </div>
                            <div class="col-6 col-12-small">
                                <input type="text" name="email" id="contact-email" placeholder="Correo Electronico" />
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="contact-message" placeholder="Mensaje" rows="4"></textarea>
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
                                <h3 class="icon solid fa-home">Dirección</h3>
                                <p>
                                    <?php
                                    $Direccion = "SELECT `Direccion` FROM `empresa` WHERE 1";
                                    $peticion = $mysqli->query($Direccion);
                                    $filaemprcontact = $peticion->fetch_assoc();
                                    echo $filaemprcontact['Direccion'];
                                    ?>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-comment">Redes Sociales</h3>
                                <p>
                                    <?php
                                    $inner = "SELECT enlaces.IDEnlaces, enlaces.Nombre,enlaces.Enlace FROM enlaces INNER JOIN detalle_empresa_enlaces ON enlaces.IDEnlaces=detalle_empresa_enlaces.IDEnlaces INNER JOIN empresa ON detalle_empresa_enlaces.IDEmpresa=empresa.idEmpresa";
                                    $resultado = $mysqli->query($inner);
                                    //pre_r($resultado->fetch_assoc());
                                    while ($selector = $resultado->fetch_assoc()) :
                                    ?>
                                        <a href="<?php echo $selector['Enlace'] ?>"><?php echo $selector['Nombre'] ?></a><br />
                                    <?php endwhile; ?>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-envelope">Correo Electronico</h3>
                                <p>
                                    <a href="#">
                                        <?php
                                        $Email = "SELECT `Email` FROM `empresa` WHERE 1";
                                        $peticion = $mysqli->query($Email);
                                        $filaemprcontact = $peticion->fetch_assoc();
                                        echo $filaemprcontact['Email'];

                                        ?>
                                    </a>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-phone">Telefono</h3>
                                <p>
                                    <?php
                                    $Telefono = "SELECT `Telefono` FROM `empresa` WHERE 1";
                                    $peticion = $mysqli->query($Telefono);
                                    $filaemprcontact = $peticion->fetch_assoc();
                                    echo implode('-', str_split($filaemprcontact['Telefono'], 4));

                                    ?>
                                </p>
                            </section>
                        </div>
                    </div>
                </section>
                <ul class="actions special">
                    <form id="servicesbtn" name="servicesbtn">
                        <li>
                            <a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
        <div id="copyright">
            <ul>
                <li>&copy; Universidad Don Bosco.</li>
                <li>Maquetado: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>
</section>