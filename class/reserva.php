<?php
require("Events.php");
class Reserva extends MetodosEventos
{
    private $servicios = array();

    private $IdReserva;

    public function setServices($service)
    {
        $this->servicios = $service;
    }

    public function setIdReserva($idreser)
    {
        $this->IdReserva;
    }

    public function InsertarReservaE($Id, $TipoE, $Empresa, $Usuario, $Nombre, $Fecha, $Lugar, $Cliente, $Descripcion)
    {
        $visibilidad = 1;
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $Insert = "INSERT INTO eventos (idEventos, IdTipoEvento, IdEmpresa, Id_Usuario, Nombre, fecha,idLugar,idCliente,Descripcion,Visibilidad)";
        $Insert .= " VALUES (?,?,?,?,?,?,?,?,?,?)";
        $Resultado = $Base->prepare($Insert);
        $Resultado->bind_param("iiiissiiss", $Id, $TipoE, $Empresa, $Usuario, $Nombre, $Fecha, $Lugar, $Cliente, $Descripcion, $visibilidad);
        $Devolver = $Resultado->execute();
        $Base->close();
        return $Devolver;
    }

    public function InsertarReservaR($Id, $Fecha)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $Insert = "INSERT INTO `reservas`(`IDEvento`, `FechaReservada`)";
        $Insert .= " VALUES (?,?)";
        $Resultado = $Base->prepare($Insert);
        $Resultado->bind_param("is", $Id, $Fecha);
        $Devolver = $Resultado->execute();
        $Base->close();
        return $Devolver;
    }

    public function InsertarServicios($Id, $servicios)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $Insert = "";
        foreach ($servicios as $key => $value) {
            $Insert .= "INSERT INTO `serviciosdeeventos`(`idReserva`, `idServicio`)";
            $Insert .= " VALUES ($Id,$value); ";
        }
        echo "<h1>$Insert</h1>";
        if ($Base->multi_query($Insert)) {
            $Base->close();
            return 1;
        } else {
            $Base->close();
            return 0;
        }
    }

    public function UltimoID()
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $consulta = "SELECT `idReserva` FROM `reservas` ORDER BY `idReserva` DESC LIMIT 1";
        $result = $Base->query($consulta);
        if ($result == TRUE) {
            $selector = $result->fetch_array();
            $id = $selector['idReserva'];
        }
        return $id;
    }


    public function ExitosR($op, $nameE)
    {
        switch ($op) {
            case 1:
                echo "<h2>¡Proceso Realizado con Éxito!</h2>";
                echo "<p>La reservación: '$nameE' se guardo con éxito en la Base de Datos.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarReservacion.php'><input type='button' class='button special style5 large' value='Agregar otra Reservación'></a>
                <a href='ReservacionesCliente.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Reservaciones'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Evento Actualizado con Éxito!</h2>";
                echo "<p>La reservación '$nameE' fue actualizado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='ActualizarEvento.php'><input type='button' class='button special style5 large' value='Actualizar Otro Evento'></a>
                <li>
                <a href='ReservacionesCliente.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Eventos'></a>
                </li></form></ul>";
                break;
            case 3:
                echo "<h2>¡Evento Eliminado con Éxito!</h2>";
                echo "<p>El Evento '$nameE' fue eliminado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='EliminarEventos.php'><input type='button' class='button special style5 large' value='Eliminar Otro Evento'></a>
                <li>
                <a href='ReservacionesCliente.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Evento'></a>
                </li></form></ul>";
                break;
            default:
                # code...
                break;
        }
    }

    public function ErroresR($op)
    {
        switch ($op) {
            case 1:
                echo "<h2>¡Error, faltan argumentos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, esta vez ingrese todos los argumentos solicitados</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarReservacion.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Error, al ingresar los datos a la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarReservacion.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 3:
                echo "<h2>No se realizó ningún cambio</h2>";
                echo "<p>Usted no realizó ningún cambio en los campos.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='ActualizarEvento.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 4:
                echo "<h2>¡Error, al actualizar el evento en la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='ActualizarEvento.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 5:
                echo "<h2>¡Error, al eliminar el evento de la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='EliminarEventos.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            default:
                # code...
                break;
        }
    }
}
