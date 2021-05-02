<?php
require_once("atuload.php");
class TipoEvento extends conexion
{
    private $tipo;
    private $descripcion;
    private $TipoEvento;
    private $conexion;

    function __construct()
    {
        $this->conexion = new conexion;

    }

    public function setTipo()
    {
       
        $SQLStatement = $this->conexion->prepare("INSERT INTO TipoEvento (nombre) VALUES (:nom)")
        $SQLStatement->bindParam(":nom");
        $SQLStatement->execute();
        $idTipoEvento = $this->conexion->lastInsertId();
        return $idTipoEvento;
    }

    public function setDescripcion()
    {
        $SQLStatement = $this->conexion->prepare("INSERT INTO TipoEvento (Descripcion) VALUES (:des)")
        $SQLStatement->bindParam(":des");
        $SQLStatement->execute();
    }

                                              
    public function viewTipo()
    {
        $SQLStatement = $this->TipoEvento->prepare("SELECT idTipoEvento,Nombre FROM TipoEvento ");
        $SQLStatement->execute();
        while ($valores = $SQLStatement->fetch(PDO::FETCH_ASSOC)) 
      {
        echo '<option value="'.$valores['idTipoEvento'].'">'.$valores['Nombre'].'</option>';
      }
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function GenerarHeaderEventos($titulo_header,$descrip_header)
    {
        echo "<header class='style1'>
        <h2>$titulo_header</h2>
        <p>$descrip_header</p>
        </header>";
    }
    
    public function ExtraerBase($Row)
    {
        if ($Row !=NULL) {
            setTipo($SelectVector['Tipo']);
            setDescripcion($Row['Descripcion']);
        }
        else {}
    }
}
