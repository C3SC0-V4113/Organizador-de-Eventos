<!-- Footer -->
<section id="footer" class="wrapper">
    <div class="title">CONTACTANOS</div>
    <div class="container">
        <header class="style1">
            <h2><?php $empresa->Showcontacttitle()?></h2>
            <p><?php $empresa->Showcontactdesc()?></p>
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
                                    <?php $empresa->ShowDireccion()?>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-comment">Redes Sociales</h3>
                                <p>
                                <?php
                                for ($i=0; $i < count($enlace) ; $i++) { 
                                    echo "<a href='".$enlace[$i]->enlace()."'>".$enlace[$i]->nombre()."</a><br />";
                                }
                                ?>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-envelope">Correo Electronico</h3>
                                <p>
                                    <a href="#"><?php $empresa->ShowEmail()?></a>
                                </p>
                            </section>
                        </div>
                        <div class="col-6 col-12-small">
                            <section>
                                <h3 class="icon solid fa-phone">Telefono</h3>
                                <p>
                                <?php $empresa->ShowTelefono()?>
                                </p>
                            </section>
                        </div>
                    </div>
                </section>
                <?php
                if ($admin) {
                ?>
                    <ul class="actions special">
                        <form id="servicesbtn" name="servicesbtn">
                            <li>
                            <a href="./ActualizarEmpresa.php"> <input type="button" class="button special style5 large" value="Editar Informacion"></a>
                            </li>
                        </form>
                    </ul>
                <?php
                }
                ?>
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