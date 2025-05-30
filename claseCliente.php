<?php
class Cliente {
    //Atributos
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombre;
    private $apellido;

    //Metodo constructor
    public function __construct($tipoDocumento,$numeroDocumento,$nombre,$apellido) {
        $this->tipoDocumento=$tipoDocumento;
        $this->numeroDocumento=$numeroDocumento;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

    //Metrodos de acceso
    //Getters
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    //Setters
    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function __toString() {
        return "Tipo Documento: " . $this->getTipoDocumento() . 
        "Numero documento: " . $this->getNumeroDocumento() . 
        "Nombre: " . $this->getNombre() . 
        "Apellido: " . $this->getApellido();
    }
}