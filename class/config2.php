<?php
  session_start();
  //conexion, cambiar por el include
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'mydb';
  $port=3307;

  if(!$conn = mysqli_connect($server,$username,$password,$database,$port)){
    die("fallo al conectar.");
  }
    $conn -> set_charset("utf8");
    $user = $_POST['Usuario1'];
    $pass = $_POST['contraseña1'];
    $Cpass = $_POST['contraseña2'];
    if ($pass != $Cpass) {
      echo "<script language='javascript'> window.alert('Las contraseñas no coinciden.'); window.location.href='../index.php' </script>";
    }else {
      $s = "SELECT * FROM usuario WHERE Usuario = '$user'";

      $result = mysqli_query($conn, $s);//cambiar conn por la variable de conxión de la bd

      $num = mysqli_num_rows($result);

      if ($num == 1) {
        echo "<script language='javascript'> window.alert('El nombre de usuario ya fue registrado.'); window.location.href='../index.php' </script>";
      }else {
        $cod = md5($pass);
        $reg = "INSERT INTO `usuario` (Usuario, Id_tipo_usuario ,contraseña) values ('$user', '2' , '$cod')";
        mysqli_query($conn,$reg); //cambiar conn por la variable de conxión de la bd
        echo "<script language='javascript'> window.alert('Su usuario fue registrado exitosamente.'); window.location.href='../index.php' </script>";
      }
    }



 ?>
