<?php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'mydb';
  $port=3307;

  if(!$conn = mysqli_connect($server,$username,$password,$database,$port)){
    die("fallo al conectar.");
  }
  $conn->set_charset('utf8');
  if($_POST['password1'] == $_POST['password2']){
     $user = $_POST['Usuario1'];
     $pass = $_POST['password1'];
    $s = "SELECT * FROM usuario WHERE Usuario = '$user'";

    $result = mysqli_query($conn, $s);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
      echo "<script language='javascript'> window.alert('El nombre de usuario ya fue registrado.'); window.location.href='../Login.php' </script>";
    }else {
      session_start();
      $_SESSION['Usuario'] = $_POST['Usuario1'];
      $_SESSION['password'] = $_POST['password1'];
      $_SESSION['password2'] = $_POST['password2'];
      header("Location: ../ClientData.php");

    }
  }else {
    echo "<script language='javascript'> window.alert('Las contraseñas no coinciden.'); window.location.href='../Login.php' </script>";
  }


?>
