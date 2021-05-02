<?php
class MetodosEventos
{
    private $nombreE;
    private $descripcionE;
    private $fecha;
    private $lugar;
    private $cliente;
    private $tipo;
    private $urlfoto;
    private $idEvento;

    public function setNombreE($name)
    {
        $this->nombreE = $name;
    }
    public function setDescripcionE($des)
    {
        $this->descripcionE = $des;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setLugar($Lugar)
    {
        $this->lugar = $Lugar;
    }
    public function setCliente($client)
    {
        $this->cliente = $client;
    }
    public function setTipo($tip)
    {
        $this->tipo = $tip;
    }
    public function setUrlFoto($url)
    {
        $this->urlfoto = $url;
    }
    public function setID($id)
    {
        $this->idEvento = $id;
    }
    


    function ConsultarTipos()
{
    $Base = new mysqli('localhost','root','','mydb',3307);
    $Base -> set_charset("utf8");
    $Consulta = "SELECT idTipoEvento, Nombre from tipoevento";
    $Respuesta = $Base->query($Consulta);
    $totalRows = $Respuesta->num_rows; 
    $Base->close();
    if($Respuesta)
    {
        if($totalRows!=0)
        {
            $i=1;
            while ($fila = $Respuesta->fetch_assoc())
            {
                $Datos[$i] = $fila;
                $i++;
            }
            return $Datos;
        }
        else 
        {
            
        }
    }
}

function ConsultarLugares()
{
    $Base = new mysqli('localhost','root','','mydb',3307);
    $Base -> set_charset("utf8");
    $Consulta = "SELECT idLugar, NombreLugar from lugares";
    $Respuesta = $Base->query($Consulta);
    $totalRows = $Respuesta->num_rows;
    $Base->close(); 
    if($Respuesta)
    {
        if($totalRows!=0)
        {
            $i=1;
            while ($fila = $Respuesta->fetch_assoc())
            {
                $Datos[$i] = $fila;
                $i++;
            }
            return $Datos;
        }
        else 
        {
            
        }
    }
}
function ConsultarClientes()
{
    $Base = new mysqli('localhost','root','','mydb',3307);
    $Base -> set_charset("utf8");
    $Consulta = "SELECT idCliente, NombreCliente from cliente";
    $Respuesta = $Base->query($Consulta);
    $totalRows = $Respuesta->num_rows;
    $Base->close(); 
    if($Respuesta)
    {
        if($totalRows!=0)
        {
            $i=1;
            while ($fila = $Respuesta->fetch_assoc())
            {
                $Datos[$i] = $fila;
                $i++;
            }
            return $Datos;
        }
        else 
        {
            
        }
    }
}

    function ImprimirTipos($Matriz)
    {
        $options = '';
        $i=1;
        if ($Matriz!=NULL) 
        {
        while ($i <= sizeof($Matriz))
        {
            $options .= "<option value ='".$Matriz[$i]['idTipoEvento']."'>".$Matriz[$i]['Nombre']."</option>";
            $i++;
        }
        return $options;
    }
        else {}
}

function ImprimirLugares($Matriz)
    {
        $options = '';
        $i=1;
        if ($Matriz!=NULL) 
        {
        while ($i <= sizeof($Matriz))
        {
            $options .= "<option value ='".$Matriz[$i]['idLugar']."'>".$Matriz[$i]['NombreLugar']."</option>";
            $i++;
        }
        return $options;
    }
        else {}
}

function ImprimirClientes($Matriz)
    {
        $options = '';
        $i=1;
        if ($Matriz!=NULL) 
        {
        while ($i <= sizeof($Matriz))
        {
            $options .= "<option value ='".$Matriz[$i]['idCliente']."'>".$Matriz[$i]['NombreCliente']."</option>";
            $i++;
        }
        return $options;
    }
        else {}
}

public function Id($fila)
{
    if ($fila!=NULL) {
        $num = $fila['idEventos'];
        $num++;
        return $num;
    }
    else {}
}

public function GenerarHeaderEventos($titulo_header,$descrip_header)
    {
        echo "<header class='style1'>
        <h2>$titulo_header</h2>
        <p>$descrip_header</p>
        </header>";
    }

public function GenerarMiniEventos()
{
    $fecha = substr($this->fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    $espanol =  $numeroDia." de ".$nombreMes." de ".$anio;
    echo '<div class="col-4 col-12-medium">
    <section class="highlight">
        <a href="MostrarEvento.php?id='.$this->idEvento.'&tipo='.$this->tipo.'" class="image featured"><img src="'.$this->urlfoto.'" alt="'.$this->nombreE.'" /></a>
        <h3><a href="MostrarEvento.php?id='.$this->idEvento.'&tipo='.$this->tipo.'">'.$this->nombreE.'<br><i class="minitext icon fas fa-map-marker-alt"></i><a class="minit"> '.$this->lugar.' / '.$this->tipo.'</a><br><i class="minitext icon fas fa-calendar-alt"></i><a class="minit"> '.$espanol.'</a></a></h3>
        <ul class="actions">
            <li><a href="MostrarEvento.php?id='.$this->idEvento.'&tipo='.$this->tipo.'" class="button style4">Leer Más</a></li>
        </ul>
    </section>
</div>';
}

public function ExtraerBaseE($fila)
    {
        if ($fila!=NULL) {
            $this-> setNombreE($fila['Nombre']);
		    $this-> setDescripcionE($fila['Descripcion']);
		    $this-> setCliente($fila['NombreCliente']);
            $this-> setFecha($fila['fecha']);
            $this-> setID($fila['idEventos']);
            $this->setLugar($fila['NombreLugar']);
            
        }
        else {}
    }

    public function ExtraerTipo($fila)
    {
        $this-> setTipo($fila['Tipo']);
    }

    public function ExtraerImg($fila)
    {
        if($fila!=NULL)
        {
            $this-> setUrlFoto($fila['UrlFoto']);
        }
        else {
            
        }
        
    }

    public function Busqueda($palabra,$opc)
    {
        switch ($opc) {
            case 1:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where eventos.Nombre like '$palabra%' order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 2:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where NombreLugar  = '$palabra' order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 3:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente where tipoevento.Nombre  = '$palabra' order by fecha DESC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            case 4:
                $Base = new mysqli('localhost','root','','mydb',3307);
                $Base -> set_charset("utf8");
                $Busqueda = "Select idEventos,tipoevento.Nombre as Tipo,eventos.Nombre,fecha,NombreLugar,NombreCliente,substring(Descripcion,1,95) as Descripcion from Eventos INNER JOIN lugares ON eventos.idLugar = lugares.idLugar INNER JOIN tipoevento ON eventos.IdTipoEvento = tipoevento.idTipoEvento INNER JOIN cliente ON eventos.idCliente=cliente.idCliente order by fecha ASC";
                $Ejecucion = $Base->query($Busqueda);
                $Base->close();
                break;
            default:
                # code...
                break;
        }
        return $Ejecucion;
    }

    public function ScriptBusqueda($idfiltro,$opfiltro,$word)
    {
        echo '<script type="text/javascript">
        document.getElementById("filtro").value = "'.$opfiltro.'";
        OpcFiltros("'.$opfiltro.'",Lugares,Tipos);
        document.getElementById("'.$idfiltro.'").value = "'.$word.'";
        document.getElementById("'.$idfiltro.'").focus();
        Busqueda();
        </script>';
    }

    public function MostrarEvento($Nombre,$Lugar,$Tipo,$Descripcion,$Imagenes,$Cliente,$fechita)
    {
        $fecha = substr($fechita, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        $espanol =  $numeroDia." de ".$nombreMes." de ".$anio;
        echo '<header class="style1">
        <h2>'.$Nombre.'</h2><hr>
        <p id="arriba" style="text-align:left;"><i class="mostrar icon fas fa-map-marker-alt"></i><b> &nbsp;&nbsp;Lugar del Evento:</b> '.$Lugar.'
        &nbsp|&nbsp <i class="mostrar icon fas fa-user"></i><b>&nbsp;&nbsp; Cliente:</b> '.$Cliente.'
        &nbsp|&nbsp <i class="mostrar icon fas fa-calendar-alt"></i><b>&nbsp;&nbsp; Fecha del Evento:</b> '.$espanol.'
        &nbsp|&nbsp&nbsp;<i class="mostrar icon fas fa-caret-right"></i><b>&nbsp;&nbsp;<b> Tipo de Evento:</b> '.$Tipo.'</p>
        </header>
        <section>
        <div class="row">';
        
        echo '<!-- Slideshow container -->
        <div class="slideshow-container">
        
          <!-- Full-width images with number and caption text -->
          ';
          for ($i=0; $i < sizeof($Imagenes); $i++) { 
            echo '<div class="mySlides fade">
            <div class="numbertext">'.($i+1).'< / '.(sizeof($Imagenes)+1).'</div>
            <img src="'.$Imagenes[$i]['UrlFoto'].'" style="width:100%">
          </div>';
        }  
          
        
         
        
         echo' <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>';
       echo ' </div>
       <hr><p><h3>DESCRIPCIÓN DEL EVENTO:</h3>
        <p>'.$Descripcion.'</p></p>
        
        <ul class="actions">
            <li><a href="javascript:history.go(-1);" class="button style4">Volver Atrás</a></li>
        </ul>
        </section>';
    }

    public function IDEvento()
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Consulta = "Select idEventos from Eventos order by idEventos DESC LIMIT 1";
        $IdC = $Base->query($Consulta);
        $totalR = $IdC->num_rows; 
        $Base->close();
        if($IdC)
        {
            if($totalR!=0)
            {
                $Id = $this -> Id($IdC->fetch_assoc());
            }
            else 
            {
                $Id =1;
            }
        }
        return $Id;
    }

    public function InsertarEvento($Id,$TipoE,$Empresa,$Usuario,$Nombre,$Fecha,$Lugar,$Cliente,$Descripcion)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Insert = "INSERT INTO eventos (idEventos, IdTipoEvento, IdEmpresa, Id_Usuario, Nombre, fecha,idLugar,idCliente,Descripcion)";
        $Insert .= " VALUES (?,?,?,?,?,?,?,?,?)";
        $Resultado = $Base->prepare($Insert);
        $Resultado->bind_param("iiiissiis",$Id,$TipoE,$Empresa,$Usuario,$Nombre,$Fecha,$Lugar,$Cliente,$Descripcion);
        $Devolver=$Resultado->execute();
        $Base->close();
        return $Devolver;
    }

    public function ModificarEvento($nameE,$descripE,$TipoE,$fechaE,$LugarE,$CliE,$idEvento)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $UpdateE = "UPDATE Eventos SET Nombre='$nameE', Descripcion='$descripE',IdTipoEvento='$TipoE',fecha='$fechaE',idLugar='$LugarE',idCliente='$CliE' where idEventos='$idEvento'";
        $EjecutarActu = $Base->query($UpdateE);
        $Exito = $Base->affected_rows;
        $Base->close();
        return $Exito;
    }
    public function EliminarEvento($deleteID)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Delete = "DELETE FROM Eventos where idEventos='".$deleteID."'";
        $EjecutarD = $Base->query($Delete);
        $Exito = $Base->affected_rows;
        $Base->close();
        return $Exito;
    }

    public function Exitos($op,$nameE)
    {
        switch ($op) {
            case 1:
                echo "<h2>¡Proceso Realizado con Éxito!</h2>";
                echo "<p>El Evento: '$nameE' se guardo con éxito en la Base de Datos.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarEvento.php'><input type='button' class='button special style5 large' value='Agregar otro Evento'></a>
                <a href='EventosAd.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Evento Actualizado con Éxito!</h2>";
                echo "<p>El Evento '$nameE' fue actualizado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='ActualizarEvento.php'><input type='button' class='button special style5 large' value='Actualizar Otro Evento'></a>
                <li>
                <a href='EventosAd.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Eventos'></a>
                </li></form></ul>";
                break;
            case 3:
                echo "<h2>¡Evento Eliminado con Éxito!</h2>";
                echo "<p>El Evento '$nameE' fue eliminado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='EliminarEventos.php'><input type='button' class='button special style5 large' value='Eliminar Otro Evento'></a>
                <li>
                <a href='EventosAd.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Evento'></a>
                </li></form></ul>";
                break;
            default:
                # code...
                break;
        }
    }
    public function Errores($op)
    {
        switch ($op) {
            case 1:
                echo "<h2>¡Error, faltan argumentos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, esta vez ingrese todos los argumentos solicitados</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Error, al ingresar los datos a la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarEvento.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
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
    public function GuardarImagenesBase($Direcciones,$Id)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $k=0;
        while($k<sizeof($Direcciones))
        {
            $IFotos = "INSERT INTO FotosEventos (idEventos,UrlFoto) values(?,?)";
            $Subida = $Base -> prepare($IFotos);
            $Subida ->bind_param("is",$Id,$Direcciones[$k]);
            $Subida->execute();
            $k++;
            if(($Subida->affected_rows)!=0 && ($Subida->affected_rows)!=-1)
            {
                $exito = true;
            }
            else
            {
                $exito = false;
            }
        }
        $Base->close();
        return $Subida;
    }
    public function EliminarFotosByS($idEliminadas=array())
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        for ($i=1; $i <=sizeof($idEliminadas); $i++) 
        { 
            $Traer = "SELECT UrlFoto from FotosEventos where idFotos= '".$idEliminadas[$i]."'";
            $Cons = $Base->query($Traer);
            $Dir = $Cons->fetch_assoc();
            $u='';
            $u="/".$Dir['UrlFoto'];
            @unlink("./$u");
            $DeleteImages = "DELETE FROM FotosEventos where idFotos = '".$idEliminadas[$i]."'";
            $EjecutarI = $Base->query($DeleteImages);
            $imagenes = $Base->affected_rows;
        }
        $Base->close();
    }
}





?>