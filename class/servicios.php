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
        <h3 class='icon ".$this->url_icono."'>".$this->nombre."</h3>
        <p>".$this->descripcion."</p>
        </section>
        </div>
        ";
    }

    public function ModuloServicios($pestaña,$titulo_header,$descrip_header)
    {
        echo "<div id='main' class='wrapper style2'>
        <div class='title'>$pestaña</div>
        <div class='container'>
        <div id='content'>
        <article class='box post'>
        <header class='style1'>
        <h2>$titulo_header</h2>
        <p>$descrip_header</p>
        </header>
        <div class='feature-list'>
        <div class='row'>";
        echo "<div class='col-6 col-12-medium'>
        <section>
        <h3 class='icon ".$this->url_icono."'>".strtoupper($this->nombre)."</h3>
        <p>".$this->descripcion."</p>
        </section>
        </div>
        ";
        echo "</div>
        </div>
        <ul class='actions special'>
		<li><a href='#' class='button style1 large'>Organiza tu Reunión</a></li>
		<li><a href='#' class='button style2 large'>Más Información</a></li>
		</ul>
        </article>
        </div>
        </div>
        </div>
        ";
    }
}
