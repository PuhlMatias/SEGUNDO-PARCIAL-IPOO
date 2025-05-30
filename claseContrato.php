<?php
class Contrato{
    //Atributos
    private $fechaInicio;
    private $fechaVencimiento;
    private $tipoPlan;
    private $estado;
    private $costo;
    private $renovacion;
    private $refCliente;
    private $codigoContrato;

    //Metodo constructor
    public function __construct($fechaInicio,$fechaVencimiento,$tipoPlan,$estado,$costo,$renovacion,$refCliente,$codigoContrato)
    {
        $this->fechaInicio=$fechaInicio;
        $this->fechaVencimiento=$fechaVencimiento;
        $this->tipoPlan=$tipoPlan;
        $this->estado=$estado;
        $this->costo=$costo;
        $this->renovacion=$renovacion;
        $this->refCliente=$refCliente;
        $this->codigoContrato=$codigoContrato;
    }

    //Metodos de acceso
    //Getters
    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    public function getTipoPlan() {
        return $this->tipoPlan;
    }

     public function getEstado() {
        return $this->estado;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getRenovacion() {
        return $this->renovacion;
    }

    public function getRefCliente() {
        return $this->refCliente;
    }

    public function getCodigoContrato(){
        return $this->codigoContrato;
    }

    //Setters
    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
     }

    public function setFechaVencimiento($fechaVencimiento) {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setTipoPlan($tipoPlan) {
        $this->tipoPlan = $tipoPlan;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }   

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function setRenovacion($renovacion) {
        $this->renovacion = $renovacion;
    }

    public function setRefCliente($refCliente) {
        $this->refCliente = $refCliente;
    }

    public function setCodigoContrato($codigoContrato){
        $this->codigoContrato=$codigoContrato;
    }

    //Metodo toString 
    public function __toString() {
        return "\nCONTRATO: " .
        "\nFecha de inicio: " . $this->getFechaInicio() . 
        "\nFecha de vencimiento: " . $this->getFechaVencimiento() . 
        "\nTipo de plan: " . $this->getTipoPlan() . 
        "\nEstado: " . $this->getEstado() . 
        "\nCosto: $" . $this->getCosto() . 
        "\nRenovacion: " . ($this->getRenovacion() ? "Si" : "No") . 
        "\nCliente: " . $this->getRefCliente();
    }


    //Metodo para actualizar el contrato
    public function actualizarEstadoContrato($contrato){
        $estadoContrato = $this->getEstado();
        $diasVencido = diasContratoVencido($contrato);
        if($diasVencido > 10){
            $this->setEstado("suspendido");
        }elseif($diasVencido > 0) {
            $this->setEstado("moroso");
        }else{
            $this->setEstado("al día");
        }
        return $estadoContrato;
    }

    //Metodo que calculaa el importe final
    public function calcularImporte(){
        $plan = $this->getTipoPlan();
        $canales = $plan->getCanales();

        $importeCanales = 0;
        foreach($canales as $canal) {
            $importeCanales += $canal->getImporte();
        }
        $importeFinal = $importeCanales + $this->getCosto();
        return $importeFinal;
    }
}