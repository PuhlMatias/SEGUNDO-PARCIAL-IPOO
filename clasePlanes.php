<?php
class Planes{
    //Atributos
    private $codigo;
    private $canales;
    private $importe;
    private $incluyeMg;
    private $totalMg;

    public function __construct($codigo,$canales,$importe,$incluyeMg,$totalMg)
    {
        $this->codigo=$codigo;
        $this->canales=$canales;
        $this->importe=$importe;
        $this->incluyeMg=$incluyeMg;
        $this->totalMg=$totalMg+100;
    }

    //Metodos de acceso
    //Getters
    public function getCodigo() {
        return $this->codigo;
    }

    public function getCanales() {
        return $this->canales;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function getIncluyeMg() {
        return $this->incluyeMg;
    }

    public function getTotalMg() {
        return $this->totalMg;
    }

    //Setters
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setCanales($canales) {
        $this->canales = $canales;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setIncluyeMg($incluyeMg) {
        $this->incluyeMg = $incluyeMg;
    }

    public function setTotalMg($totalMg) {
        return $this->totalMg=$totalMg;
    }

    //Metodo toString
    public function __toString() {
        $cadenaCanales = "";
        foreach ($this->canales as $canal) {
            $cadenaCanales .= "\n  - " . $canal->toString();
        }

        return "Codigo: " . $this->getCodigo() .
        "\nImporte: $" . $this->getImporte() .
        "\nIncluye MG: " . ($this->getIncluyeMg() ? "Si" : "No") .
        "\nMG por defecto: " . $this->getTotalMg() .
        "\nCanales:" . $cadenaCanales;
    }

}