<?php
 session_start();
 unset($_SESSION['IdUsuario']);
 unset($_SESSION['NombreUsuario']);
 unset($_SESSION['IdEmpresa']);
 $_SESSION = array();
 session_destroy();
 header('Location: ../InicioCliente.php')
?>