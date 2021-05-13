<?php
class Servicio
{
    private $nombre;
    private $descripcion;
    private $url_icono;
    private $precio;

    public function setNombre($name)
    {
        $this->nombre = $name;
    }

    public function setDescripcion($descrp)
    {
        $this->descripcion = $descrp;
    }

    public function setURL_Icono($url)
    {
        $this->url_icono = $url;
    }

    public function setPrecio($price)
    {
        $this->precio = $price;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function GenerarServicio()
    {
        echo "<div class='col-6 col-12-medium'>
        <section>
        <h3 class='icon solid ".$this->url_icono."'>".$this->nombre."</h3>
        <p>".$this->descripcion."</p>
        <p>".$this->precio."</p>
        </section>
        </div>
        ";
    }

    public function GenerarHeaderServicios($titulo_header,$descrip_header)
    {
        echo "<header class='style1'>
        <h2>$titulo_header</h2>
        <p>$descrip_header</p>
        </header>";
    }
    
    public function ExtraerBase($fila)
    {
        if ($fila!=NULL) {
            $this-> setNombre($fila['Nombre']);
		    $this-> setDescripcion($fila['Descripcion']);
		    $this-> setURL_Icono($fila['urlIMG']);
            $this-> setPrecio($fila['Precio']);
        }
        else {}
    }

    public function Id($fila)
    {
        if ($fila!=NULL) {
            $num = $fila['idServicios'];
            $num++;
            return $num;
        }
        else {}
    }

    public function ConsultaNumId()
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Consulta = "Select idServicios from Servicios order by idServicios DESC LIMIT 1";
        $IdC = $Base->query($Consulta);
        $totalR = $IdC->num_rows;
        if($IdC)
        {
            if($totalR!=0)
            {
                $Id = $this-> Id($IdC->fetch_assoc());
            }
            else 
            {
                $Id =1;
            }
        }
        $Base ->close();
        return $Id;
    }

    public function InsertarServicio($Id,$NombreS,$DescripcionS,$IconoS,$Precio)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Insert = "INSERT INTO Servicios (idServicios, Nombre, Descripcion, urlIMG, Precio)";
        $Insert .= "VALUES (?,?,?,?,?)";
        $Resultado = $Base->prepare($Insert);
        $Resultado->bind_param("issss",$Id,$NombreS,$DescripcionS,$IconoS,$Precio);
        $Resultado->execute();
        $Base ->close();
        return $Resultado->affected_rows;
    }

    public function ActualizarHeader($Titulo, $DescripcionT, $Empresa,$op)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        if($op==2)
        {
            $Update = "UPDATE InfoServicios SET HeaderTitulo='$Titulo', DescripcionHeader='$DescripcionT' where idEmpresa=$Empresa";
            $Actualizacion = $Base->query($Update);
            $Exito = $Base->affected_rows;
            $Base ->close();
        }
        else 
        {
            $PrimerI = "INSERT INTO InfoServicios(idEmpresa,HeaderTitulo,DescripcionHeader) VALUES(?,?,?)";
            $In = $Base->prepare($PrimerI);
            $In -> bind_param("iss",$Empresa,$Titulo,$DescripcionT);
            $In->execute();
            $Exito = $Base->affected_rows;
            $Base ->close();
        }
        return $Exito;
    }
    public function ActualizarServicio($NombreS,$DescripS,$IconoS,$PrecioS,$ID)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $UpdateSer = "UPDATE Servicios SET Nombre='$NombreS', Descripcion='$DescripS',urlIMG='$IconoS', Precio='$PrecioS' where idServicios=$ID";
        $EjecutarA = $Base->query($UpdateSer);
        $Exito = $Base->affected_rows;
        $Base ->close();
        return $Exito;
    }
    public function EliminarServicio($deleteID)
    {
        $Base = new mysqli('localhost','root','','mydb',3307);
        $Base -> set_charset("utf8");
        $Delete = "DELETE FROM Servicios where idServicios='$deleteID'";
        $EjecutarD = $Base->query($Delete);
        $Exito = $Base->affected_rows;
        $Base ->close();
        return $Exito;
    }

    public function Exito($NameS,$op)
    {
        switch($op)
        {
            case 1:
                echo "<h2>¡Proceso Realizado con Éxito!</h2>";
                echo "<p>El Servicio: \"$NameS\" se guardo con éxito en la Base de Datos.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Agregar otro Servicio'></a>
                <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Datos Actualizados con Éxito!</h2>";
                echo "<p>La información del Header de \"Nuestros Servicios\" ha sido actualizada con Éxito.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar a la seccion de Servicios'></a>
                </li></form></ul>";
                break;
            case 3:
                echo "<h2>¡Servicio Actualizado con Éxito!</h2>";
                echo "<p>El Servicio \"$NameS\" fue actualizado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Actualizar Otro Servicio'></a>
                <li>
                <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                </li></form></ul>";
                break;
            case 4:
                echo "<h2>¡Servicio Eliminado con Éxito!</h2>";
                echo "<p>El Servicio \"$NameS\" fue eliminado con Éxito</p>";
                echo "<ul class='actions special'><form id='back' name='back'>
                <a href='EliminarServicios.php'><input type='button' class='button special style5 large' value='Eliminar Otro Servicio'></a>
                <li>
                <a href='ServiciosAdmin.php'><input type='button' class='button special style5 large' value='Regresar al la seccion de Servicios'></a>
                </li></form></ul>";
                break;
            default:
                echo'';
                break;
        }
        
    }
    public function Errores($op)
    {
        switch($op)
        {
            case 1:
                echo "<h2>¡Error, al ingresar los datos a la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 2:
                echo "<h2>¡Error, faltan argumentos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, esta vez ingrese todos los argumentos solicitados</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='AgregarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 3:   
                echo "<h2>¡Error, al actualizar los datos en la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='EditarHeader.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 4:
                echo "<h2>No se realizó ningún cambio</h2>";
                echo "<p>Usted no realizó ningún cambio en los campos.</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 5:
                echo "<h2>¡Error, al actualizar el servicio en la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='ActualizarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            case 6:
                echo "<h2>¡Error, al eliminar el servicio de la base de datos!</h2>";
                echo "<p>Vuelva a intentarlo otra vez, porfavor</p>";
                echo "<ul class='actions special'><form id='back' name='back'><li>
                <a href='EliminarServicios.php'><input type='button' class='button special style5 large' value='Intentarlo de Nuevo'></a>
                </li></form></ul>";
                break;
            default:
                echo'';
                break;    
        }
        
    }

}
