<?php
class Servicio
{
    private $nombre;
    private $descripcion;
    private $url_icono;

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
}
