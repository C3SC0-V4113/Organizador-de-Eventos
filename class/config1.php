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
    $conn->exec("set names utf8");
  } catch (PDOException $e) {
    die('connection failed: '.$e -> getMessage());
  }
 // codigo
  if(!empty($_POST['Usuario']) && !empty($_POST['contraseña'])){
    $records = $conn->prepare("SELECT * FROM usuario WHERE Usuario =:Usuario"); //cambiar conn por la variable de conxión
    $records -> bindParam(':Usuario',$_POST['Usuario'],PDO::PARAM_STR);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $Pass = md5($_POST['contraseña']);    
    $message = '';

    if ($_POST['Usuario'] != '' && $_POST['contraseña'] != '' && $Pass == $results['contraseña'] && $_POST['Usuario'] == $results['Usuario']) {
      $_SESSION['idUsuario'] = $results['idUsuario'];
      if ($results['Id_tipo_usuario'] == 1) {
        $_SESSION['IdUsuario']=$results['idUsuario'];
        $_SESSION['IdEmpresa']=1;
        header('Location: ../InicioAdmin.php');
        
      }elseif ($results['Id_tipo_usuario'] == 2) {
        header('Location: ../InicioCliente.php');
      }

    }else{
      echo "<script language='javascript'> window.alert('Usuario y/o contraseña incorrecta.');window.location.href='../index.php';</script>";
    }
  }else {
    echo "<script language='javascript'> window.alert('Usuario y/o contraseña incorrecta.');window.location.href='../index.php';</script>";
  }

?>
