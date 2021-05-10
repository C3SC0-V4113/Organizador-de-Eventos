<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'mydb';
$port=3307;

if(!$conn = mysqli_connect($server,$username,$password,$database,$port)){
  die("fallo al conectar.");
}
    $conn->set_charset('utf8');
    $user = $_SESSION['Usuario'];
    $pass = $_SESSION['password'];
    $cod = md5($pass);
    $Nom = $_POST['Nombre'];
    $Tef = $_POST['Telefono'];
    $Em = $_POST['Correo'];
    $reg = "INSERT INTO usuario (Usuario, Id_tipo_usuario ,contraseña) values ('$user', '2' , '$cod')";
    mysqli_query($conn,$reg);
    $id = "SELECT idUsuario FROM usuario WHERE Usuario = '$user'";
    $result = mysqli_query($conn, $id);
    $result = $result -> fetch_assoc();
    $intId = implode("|",$result);
    $reg2 = "INSERT INTO cliente (idUsuario, NombreCliente, Telefono, Correo) values ('$intId','$Nom','$Tef','$Em')";
    mysqli_query($conn,$reg2);

    echo "<script language='javascript'> window.alert('Se ha registrado exitosamente.'); window.location.href='../Login.php' </script>";
  session_destroy();
?>
