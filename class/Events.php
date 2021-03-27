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
    echo '<div class="col-4 col-12-medium">
    <section class="highlight">
        <a href="#" class="image featured"><img src="'.$this->urlfoto.'" alt="'.$this->nombreE.'" /></a>
        <h3><a href="#">'.$this->nombreE.'</a></h3>
        <p class="descrip">'.$this->descripcionE.'...</p>
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
		    $this-> setCliente($fila['Cliente']);
            $this-> setFecha($fila['fecha']);
            $this-> setID($fila['idEventos']);
            
            
        }
        else {}
    }

    public function ExtraerTipo($fila)
    {
        $this-> setTipo($fila['Nombre']);
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

    public function MostrarEvento($Nombre,$Lugar,$Tipo,$Descripcion,$Imagenes,$Cliente)
    {
        
        echo '<header class="style1">
        <h2>'.$Nombre.'</h2><hr>
        <p id="arriba" style="text-align:left;"><i class="mostrar icon fas fa-map-marker-alt"></i><b> &nbsp;&nbsp;Lugar del Evento:</b> '.$Lugar.'
        <br><i class="mostrar icon fas fa-user"></i><b>&nbsp;&nbsp; Cliente:</b> '.$Cliente.'
        <br><b>Tipo de Evento:</b> '.$Tipo.'</p>
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
}



?>