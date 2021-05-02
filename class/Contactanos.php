<?php
if(isset($_POST['contact-message']) && isset($_POST['contact-email']) && isset($_POST['contact-name'])&&isset($_POST['url']))
{

$to = "eventoswinechampagne@gmail.com";
$correocontacto=$_POST['contact-email']?$_POST['contact-email']:'';
$name=$_POST['contact-name']?$_POST['contact-name']:'';
$subject = "Mensaje de Contacto de ".$name;
$message = $_POST['contact-message']?$_POST['contact-message']:'';
$message = 'Nombre de Contacto: '.$name.PHP_EOL .'Correo de Contacto: '.$correocontacto.PHP_EOL.'Mensaje: "'.$message.'"';
$headers = 'From: eventoswinechampagne@gmail.com';
if(mail($to, $subject, $message,$headers))
{
    $url = $_POST['url'];
    $url = explode("PROYECTO/Organizador-de-Eventos/",$url);
    echo "<script language='javascript'>window.location.href='../".$url[1]."';window.alert('¡Mensaje de Contacto enviado con éxito!');</script>";
}
else {
    $url = $_POST['url'];
    $url = explode("PROYECTO/Organizador-de-Eventos/",$url);
    echo "<script language='javascript'>window.location.href='../".$url[1]."'; window.alert('¡Error al enviar el mensaje de contacto!');</script>";
}
}
?>