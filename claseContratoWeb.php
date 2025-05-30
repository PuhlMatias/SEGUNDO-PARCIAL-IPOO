<?php
include_once 'claseContrato.php';
class ContratoWeb extends Contrato{
    //Atributos
    private $porcentajeDescuento;


    //Metodo constuctor 
    public function __construct($fechaIncicio,$fechaVencimiento,$tipoPlan,$estado,$costo,$renovacion,$refCliente)
    {
        $this->porcentajeDescuento=10;
        parent::__construct($fechaIncicio,$fechaVencimiento,$tipoPlan,$estado,$costo,$renovacion,$refCliente);
    }

    //Metodos de acceso
    //Getters
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    //Setters
    public function setPorcentajeDescuento($porcentajeDescuento){
        $this->porcentajeDescuento=$porcentajeDescuento;
    }

    //Metodo toString
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "\nPorcentaje de descuento: " . $this->getPorcentajeDescuento() . "%";
        return $cadena;
    }

    //Metodo que redefinido de calcular el importe final
    public function calcularImporte(){
        $importeBase = parent::calcularImporte();
        $importeConDescuento = $importeBase - ($importeBase*($this->getPorcentajeDescuento()/100));

        return $importeConDescuento;
    }
}