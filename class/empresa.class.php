<?php
class empresa{
    private $id;
    private $nombre;
    private $titulodesc;
    private $logodesc;
    private $descripcion;
    private $eventostitle;
    private $eventosdesc;
    private $ubictitle;
    private $ubicdesc;
    private $contacttitle;
    private $contactdesc;
    private $slogan;
    private $telefono;
    private $direccion;
    private $email;
    private $logURL;

    function __construct($id,$nombre,$titulodesc,$logodesc,$descripcion,$eventostitle,$eventosdesc,$ubictitle,$ubicdesc,$contacttitle,$contactdesc,$slogan,$telefono,$direccion,$email,$logURL) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->titulodesc=$titulodesc;
        $this->logodesc=$logodesc;
        $this->descripcion=$descripcion;
        $this->eventostitle=$eventostitle;
        $this->eventosdesc=$eventosdesc;
        $this->ubictitle=$ubictitle;
        $this->ubicdesc=$ubicdesc;
        $this->contacttitle=$contacttitle;
        $this->contactdesc=$contactdesc;
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
    public function Showtitulodesc(){
        echo $this->titulodesc;
    }
    public function Showlogodesc(){
        echo $this->logodesc;
    }
    public function ShowDescripcion(){
        echo $this->descripcion;
    }
    public function Showeventostitle(){
        echo $this->eventostitle;
    }
    public function Showeventosdesc(){
        echo $this->eventosdesc;
    }
    public function Showubictitle(){
        echo $this->ubictitle;
    }
    public function Showubicdesc(){
        echo $this->ubicdesc;
    }
    public function Showcontacttitle(){
        echo $this->contacttitle;
    }
    public function Showcontactdesc(){
        echo $this->contactdesc;
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