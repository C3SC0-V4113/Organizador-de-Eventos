<?php

$mysqli=new mysqli('localhost', 'root', '', 'mydb', 3307);

if(isset($_POST['guardarRedes'])){
    $name=$_POST['nombreredes'];
    $url=$_POST['urlred'];
    $insercion="INSERT INTO `enlaces`(`Nombre`, `Enlace`) VALUES ('$name','$url')";
    $mysqli->query($insercion) or die($mysqli->error);
}