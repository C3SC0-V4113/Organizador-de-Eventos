<?php
class empresa{
    private $id;
    private $nombre;
    private $descripcion;
    private $slogan;
    private $telefono;
    private $direccion;
    private $email;
    private $logURL;

    function __construct($id,$nombre,$descripcion,$slogan,$telefono,$direccion,$email,$logURL) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->slogan=$slogan;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
        $this->email=$email;
        $this->logURL=$logURL;
    }

    public function ShowID(){
        echo $this->id;
    }
    public function ShowNombre(){
        echo $this->nombre;
    }
    public function ShowDescripcion(){
        echo $this->descripcion;
    }
    public function ShowSlogan(){
        echo $this->slogan;
    }
    public function ShowTelefono(){
        echo $this->telefono;
    }
    public function ShowDireccion(){
        echo $this->direccion;
    }
    public function ShowEmail(){
        echo $this->email;
    }
    public function ShowlogURL($logURL){
        echo $this->logURL;
    }
}
?>