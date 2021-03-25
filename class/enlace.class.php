<?php

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
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $borrarDetalle="DELETE FROM `detalle_empresa_enlaces` WHERE IDEnlaces=$id";
    $borrarBase="DELETE FROM `enlaces` WHERE IDEnlaces=$id";
    $mysqli->query($borrarDetalle) or die($mysqli->error);
    $mysqli->query($borrarBase) or die($mysqli->error);
}