<?php
require_once("atuload.php");
class Eventos extends Conexion
{
	private $Conexion;

	public function __construct()
	{
		$this->Conexion = new Conexion();
	}
	public function setTipo()
    {
       
        $SQLStatement = $this->TipoEvento->prepare("SELECT idTipoEvento,Nombre FROM TipoEvento ");
        $SQLStatement->execute();
        $idEvento = $this->conexion->lastInsertId();
        return $idEvento;
    }
    public function setFecha()
    {
    	$SQLStatement = $this->conexion->prepare("INSERT INTO Eventos (Fecha) VALUES (:date)")
        $SQLStatement->bindParam(":date");
        $SQLStatement->execute();
    }
    public function setCliente()
    {
    	$SQLStatement = $this->conexion->prepare("INSERT INTO Eventos (Cliente) VALUES (:cli)")
        $SQLStatement->bindParam(":clie");
        $SQLStatement->execute();
    }
    public function setLugar()
    {
    	$SQLStatement = $this->conexion->prepare("INSERT INTO Eventos (Lugar) VALUES (:lug)")
        $SQLStatement->bindParam(":lug");
        $SQLStatement->execute();
    }
}
?>