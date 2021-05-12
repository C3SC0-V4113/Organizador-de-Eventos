<?php
session_start();
if(isset($_POST['actualizarcliente']))
{
    $nameC = isset($_POST['nombreC']) ? $_POST['nombreC']:-1;
    $correo = isset($_POST['correoC']) ? $_POST['correoC']:-1;
    $tel = isset($_POST['telC']) ? $_POST['telC']:-1;

    if($nameC!=-1 && $correo!=-1 && $nameC!=-1)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $consulta = "UPDATE Cliente SET NombreCliente = '$nameC', Correo = '$correo', Telefono = '$tel' where idUsuario = '".$_SESSION['IdUsuario']."'";
        $Eje =$Base->query($consulta);
        $Exito = $Base->affected_rows;
        if($Exito!=0)
        {
            $_SESSION['NombreUsuario']=$nameC;
            header('Location: ../InfoCliente.php?exito=1');
        }
        else
        {
            header('Location: ../InfoCliente.php?exito=0');
        }
    }
    else {
        header('Location: ../InfoCliente.php?exito=0');
    }
    $Base->close();
}
else if(isset($_POST['newcontra']))
{
    $actual =isset($_POST['ContraActual']) ? $_POST['ContraActual']:-1;
    $new1 =isset($_POST['Nueva1']) ? $_POST['Nueva1']:-1;
    $new2 =isset($_POST['Nueva2']) ? $_POST['Nueva2']:-1;
    if($actual!=-1 && $new1!=-1 && $new2!=-1)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $consulta = "SELECT contraseña from Usuario where idUsuario = '".$_SESSION['IdUsuario']."'";
        $Eje = $Base->query($consulta);
        $Datos = $Eje->fetch_assoc();
        print_r($Datos);
        if($Datos['contraseña']==md5($actual))
        {
            if($new1==$new2)
            {
                $new2 = md5($new1);
                $c = "UPDATE usuario SET contraseña = '$new2' where idUsuario = '".$_SESSION['IdUsuario']."'";
                $Guardar =$Base->query($c);
                $Exito = $Base->affected_rows;
                if($Exito!=0)
                {
                    header('Location: ../CambioContra.php?exito=1');
                }
                else
                {
                    header('Location: ../CambioContra.php?exito=0');
                }
            }
            else {
                header('Location: ../CambioContra.php?exito=-2');
            }
        }
        else {
            header('Location: ../CambioContra.php?exito=-1');
        }
    }
}
?>