<?php
class Reserva extends MetodosEventos
{
    private $servicios;

    public function setServices($service){
        $this->servicios=$service;
    }

    public function InsertarReserva($Id,$TipoE,$Empresa,$Usuario,$Nombre,$Fecha,$Lugar,$Cliente,$Descripcion)
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
}
?>