<?php
public class Canal{
    //Atributos
    private $tipoCanal;
    private $importe;
    private $hd;

    //Metodo constructor
    public function __construct($tipoCanal,$importe,$hd)
    {
        $this->tipoCanal=$tipoCanal;
        $this->importe=$importe;
        $this->hd=$hd;
    }

    //Metodos de acceso
    //Getters
    public function getTipoCanal(){
        return  $this->tipoCanal;
    }
    public function getImporte(){
        return  $this->importe;
    }
    public function getHd(){
        return $this->hd;
    }

    //Setters
    public function setTipoCanal($tipoCanal){
        $this->tipoCanal=$tipoCanal;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }
    public function setHd($hd){
        $this->hd=$hd;
    }

    //Metodo toString
    public function __toString()
    {
        return  "\nTipo de canal: " . $this->getTipoCanal() .
        "Importe: " . $this->getImporte() . 
        "Es HD: " . ($this->getHd() ? "Si" : "No");
    }
}  