<?php
//session_start();


$nombre="";
$urls="";
$id=0;
$update=false;

$mysqli=new mysqli('localhost', 'root', '', 'mydb', 3307);

if(isset($_POST['guardarRedes'])){
    $name=$_POST['nombreredes'];
    $url=$_POST['urlred'];

    $insercion="INSERT INTO `enlaces`(`Nombre`, `Enlace`) VALUES ('$name','$url')";
    $mysqli->query($insercion) or die($mysqli->error);
    $id="SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'mydb' AND TABLE_NAME = 'enlaces'";
    $no=$mysqli->query($id) or die($mysqli->error);
    $fila=$no->fetch_assoc();
    print_r($fila);
    $trueID=intval($fila['AUTO_INCREMENT'])-1;
    echo "<h1>$trueID</h1>";
    $segundaI="INSERT INTO `detalle_empresa_enlaces`(`IDEnlaces`, `IDEmpresa`) VALUES ($trueID,1)";
    $mysqli->query($segundaI) or die($mysqli->error);

    $_SESSION['mensaje']="Se ha guardardo correctamente";
    $_SESSION['msg_type']="success";

    header("location: ../ActualizarEmpresa.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $borrarDetalle="DELETE FROM `detalle_empresa_enlaces` WHERE IDEnlaces=$id";
    $borrarBase="DELETE FROM `enlaces` WHERE IDEnlaces=$id";
    $mysqli->query($borrarDetalle) or die($mysqli->error);
    $mysqli->query($borrarBase) or die($mysqli->error);

    $_SESSION['mensaje']="Se ha eliminado correctamente";
    $_SESSION['msg_type']="danger";

    header("location: ../ActualizarEmpresa.php");
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $peticionEntrada="SELECT * FROM `enlaces` WHERE IDEnlaces=$id ";
    $result=$mysqli->query($peticionEntrada) or die($mysqli->error);
    if($result==TRUE){
        $selector=$result->fetch_array();
        $nombre=$selector['Nombre'];
        $urls=$selector["Enlace"];
    }
}

if(isset($_POST['actualizarRedes'])){
    $id=$_POST['idss'];
    $name=$_POST['nombreredes'];
    $url=$_POST['urlred'];

    $actualizacion="UPDATE `enlaces` SET `Nombre`= '$name',`Enlace`='$url' WHERE `IDEnlaces`=$id";
    $mysqli->query($actualizacion) or die($mysqli->error);

    $_SESSION['mensaje']="Se ha actualizado correctamente";
    $_SESSION['msg_type']="warning";

    header("location: ../ActualizarEmpresa.php");
}