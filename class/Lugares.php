<?php
class MetodosLugares
{
    private $NombreL;
    private $DireccionL;
    private $idLugar;

    public function setNombreL($name)
    {
        $this->NombreL = $name;
    }
    public function setDireccionL($lug)
    {
        $this->DireccionL = $lug;
    }
    public function setID($id)
    {
        $this->idLugar = $id;
    }
    
public function Id($fila)
{
    if ($fila!=NULL) {
        $num = $fila['idLugar'];
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

public function ExtraerBaseL($fila)
    {
        if ($fila!=NULL) {
            $this-> setNombreL($fila['NombreLugar']);
		    $this-> setDireccionL($fila['DirecccionLugar']);
            $this-> setID($fila['idLugar']);       
        }
        else {}
    }
public function GenerarLugar()
{
    echo '<div class="col-4 col-12-medium">
    <section class="highlight">
        <h3><a href="#">'.$this->NombreL.'</a></h3>
        <p class="descrip">'.$this->DireccionL.'...</p>
    </section>
</div>';
}
public function ExtraerLugar($fila)
    {
        $this-> setTipo($fila['NombreLugar']);
    }
}
?>