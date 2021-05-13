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
        if ($Base->multi_query($Insert)) {
            $Base->close();
            return 1;
        } else {
            $Base->close();
            return 0;
        }
    }

    public function TablaReservas($idCliente)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $consulta = "SELECT eventos.idEventos,eventos.Nombre,reservas.FechaReservada FROM reservas INNER JOIN eventos ON reservas.IDEvento=eventos.idEventos where eventos.idCliente =$idCliente";
        $resultado = $Base->query($consulta);
        $tabla = "";
        while ($selector = $resultado->fetch_assoc()) {
            $tabla .= "<tr>";
            $tabla .= "<td>" . $selector['Nombre'] . "</td>";
            $tabla .= "<td>" . $selector['FechaReservada'] . "</td>";
            $tabla .= "<td>";
            $tabla .= "<a href='ActualizarRef.php?editRes=" . $selector['idEventos'] . "' class='btn btn-info'>Editar</a>";
            $tabla .= "<a href='ReservacionesCliente.php?delete=" . $selector['idEventos'] . "' class='btn btn-danger'>Eliminar</a>";
            $tabla .= "</td>";
            $tabla .= "</tr>";
        }
        return $tabla;
    }

    public function LlamarEventID($id)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $consulta = "SELECT * FROM eventos WHERE IdEventos=$id";
        $result = $Base->query($consulta);
        if ($result == TRUE) {
            $selector = $result->fetch_array();
        }
        $Base->close();
        return $selector;
    }

    public function LlamarServiciosReserva($id)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $Arreglo = array();
        $consulta = "SELECT serviciosdeeventos.idServicio FROM serviciosdeeventos INNER JOIN reservas ON serviciosdeeventos.idReserva=reservas.idReserva WHERE reservas.IDEvento=$id";
        $result = $Base->query($consulta);
        if ($result == TRUE) {
            while ($fila = mysqli_fetch_assoc($result)) {
                array_push($Arreglo, $fila['idServicio']);
            }
            //$selector = $result->fetch_array();
        }
        $Base->close();
        return $Arreglo;
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

    public function ReservaEvento($idEvento)
    {
        $id = 0;
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $consulta = "SELECT idReserva FROM reservas WHERE IDEvento =$idEvento";
        $result = $Base->query($consulta);
        if ($result == TRUE) {
            $selector = $result->fetch_array();
            $id = $selector['idReserva'];
        }
        return $id;
    }

    public function ActualizarEvento($idEvento, $nombre, $descripcion, $tipo, $Lugar, $fecha)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $UpdateE = "UPDATE `eventos` SET `IdTipoEvento`=$tipo,`Nombre`='$nombre',`fecha`='$fecha',`idLugar`=$Lugar,`Descripcion`='$descripcion' WHERE `idEventos`=$idEvento";
        $Base->query($UpdateE);
        $Exito = $Base->affected_rows;
        $Base->close();
        return $Exito;
    }

    public function ActualizarReserva($idRes, $fecha)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $UpdateE = "UPDATE `reservas` SET `FechaReservada`='$fecha' WHERE `idReserva`=$idRes";
        $Base->query($UpdateE);
        $Exito = $Base->affected_rows;
        $Base->close();
        return $Exito;
    }

    public function BorrarDetalle($idRes)
    {
        $Base = new mysqli('localhost', 'root', '', 'mydb', 3307);
        $Base->set_charset("utf8");
        $borrarDetalleSer = "DELETE FROM `serviciosdeeventos` WHERE `idReserva`=$idRes";
        $Base->query($borrarDetalleSer);
    }

    public function GenerarMiniReservas()
    {
        $fecha = substr($this->fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        $espanol =  $numeroDia . " de " . $nombreMes . " de " . $anio;
        echo '<div class="col-4 col-12-medium">
    <section class="highlight">
        <a href="MostrarReserva.php?id=' . $this->idEvento . '&tipo=' . $this->tipo . '" class="image featured"><img src="images/pic02.jpg" alt="' . $this->nombreE . '" /></a>
        <h3><a href="MostrarReserva.php?id=' . $this->idEvento . '&tipo=' . $this->tipo . '">' . $this->nombreE . '<br><i class="minitext icon fas fa-map-marker-alt"></i><a class="minit"> ' . $this->lugar . ' / ' . $this->tipo . '</a><br><i class="minitext icon fas fa-calendar-alt"></i><a class="minit"> ' . $espanol . '</a></a></h3>
        <ul class="actions">
            <li><a href="MostrarReserva.php?id=' . $this->idEvento . '&tipo=' . $this->tipo . '" class="button style4">Leer Más</a></li>
        </ul>
    </section>
</div>';
    }

    public function MostrarReserva($Nombre, $Lugar, $Tipo, $Descripcion, $Cliente, $fechita)
    {
        $fecha = substr($fechita, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        $espanol =  $numeroDia . " de " . $nombreMes . " de " . $anio;
        echo '<header class="style1">
    <h2>' . $Nombre . '</h2><hr>
    <p id="arriba" style="text-align:left;"><i class="mostrar icon fas fa-map-marker-alt"></i><b> &nbsp;&nbsp;Lugar del Evento:</b> ' . $Lugar . '
    &nbsp|&nbsp <i class="mostrar icon fas fa-user"></i><b>&nbsp;&nbsp; Cliente:</b> ' . $Cliente . '
    &nbsp|&nbsp <i class="mostrar icon fas fa-calendar-alt"></i><b>&nbsp;&nbsp; Fecha del Evento:</b> ' . $espanol . '
    &nbsp|&nbsp&nbsp;<i class="mostrar icon fas fa-caret-right"></i><b>&nbsp;&nbsp;<b> Tipo de Evento:</b> ' . $Tipo . '</p>
    </header>
    <section>
   <hr><p><h3>DESCRIPCIÓN DEL EVENTO:</h3>
    <p>' . $Descripcion . '</p></p>
    
    <ul class="actions">
        <li><a href="javascript:history.go(-1);" class="button style4">Volver Atrás</a></li>
    </ul>
    </section>';
    }

    public function BusquedaR($palabra,$opc)
    {
        switch ($opc) {
            case 1:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where eventos.Nombre like '$palabra%' AND eventos.Visibilidad=1 order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 2:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where NombreLugar  = '$palabra' AND eventos.Visibilidad=1  order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 3:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where tipoevento.Nombre  = '$palabra' AND eventos.Visibilidad=1 order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 4:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente WHERE eventos.Visibilidad=1 order by fecha ASC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            default:
                # code...
                break;
        }
        return $Ejecucion;
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
                echo "<h2>¡Reservación Actualizado con Éxito!</h2>";
                echo "<p>La reservación '$nameE' fue actualizado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='ReservacionesCliente.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Reservaciones'></a>
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
                echo "<h2>¡Error, faltan argumentos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, esta vez ingrese todos los argumentos solicitados</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarReservacion.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 4:
                echo "<h2>¡Error, al actualizar el evento en la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarReservacion.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            default:
                # code...
                break;
        }
    }
}

if (isset($_GET['delete'])) {
    $mysqli = new mysqli('localhost', 'root', '', 'mydb', 3307);
    $mysqli->set_charset("utf8");
    $id = $_GET['delete'];
    $consulta = "SELECT `idReserva` FROM `reservas` WHERE `IDEvento`=$id ORDER BY `idReserva` DESC LIMIT 1";
    $idReserv = 0;
    $result = $Base->query($consulta);

    if ($result == TRUE) {
        $selector = $result->fetch_array();
        $idReserv = $selector['idReserva'];
    }
    echo $consulta;
    $borrarDetalleSer = "DELETE FROM `serviciosdeeventos` WHERE `idReserva`=$idReserv";
    $borrarReserva = "DELETE FROM `reservas` WHERE `IDEvento`=$id";
    $borrarEvento = "DELETE FROM `eventos` WHERE `idEventos`=$id";
    echo $borrarDetalleSer . "------" . $borrarReserva . "-----------" . $borrarEvento;
    $mysqli->query($borrarDetalleSer) or die($mysqli->error);
    //$mysqli->query($borrarEvento) or die($mysqli->error);
    $mysqli->query($borrarReserva) or die($mysqli->error);
    $mysqli->query($borrarEvento) or die($mysqli->error);

    $_SESSION['mensaje'] = "Se ha eliminado correctamente";
    $_SESSION['msg_type'] = "danger";

    header("location: ./ReservacionesCliente.php");
}
