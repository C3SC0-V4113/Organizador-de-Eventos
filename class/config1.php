<?php

  session_start();
  //conexion, cambiar por el include
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'mydb';
  $port=3307;

  try {
    $conn = new PDO("mysql:host=$server;dbname=$database;port=$port;",$username,$password);
  } catch (PDOEcception $e) {
    die('connection failed: '.$e -> getMessage());
  }
 // codigo
 $conn->exec("set names utf8");
 if(!empty($_POST['Usuario']) && !empty($_POST['contraseña'])){
   $records = $conn->prepare('SELECT * FROM Usuario WHERE Usuario =:Usuario');
   $records -> bindParam(':Usuario',$_POST['Usuario']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);
   $Pass = md5($_POST['contraseña']);
   $message = '';

   if ($_POST['Usuario'] != '' && $_POST['contraseña'] != '' && $Pass == $results['contraseña'] && $_POST['Usuario'] == $results['Usuario']) {
     $_SESSION['idUsuario'] = $results['idUsuario'];
     if ($results['Id_tipo_usuario'] == 1) {
       header('Location: ../InicioAdmin.php');
     }elseif ($results['Id_tipo_usuario'] == 2) {
       header('Location: ../inicioCliente.php');
     }

   }else{
     echo "<script language='javascript'> window.alert('Usuario y/o contraseña incorrecta.'); window.location.href='../Login.php' </script>";
   }
 }else {
   echo "<script language='javascript'> window.alert('Usuario y/o contraseña incorrecta.'); window.location.href='../Login.php' </script>";
 }

?>
