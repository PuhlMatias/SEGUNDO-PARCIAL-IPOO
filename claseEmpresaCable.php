<?php
class EmpresaCable {
    //Atributos 
    private $colPlanes;
    private $colCanales;
    private $colClientes;
    private  $colContratos;

    //Metodo constructor
    public function __construct() {
        $this->colPlanes = [];
        $this->colCanales = [];
        $this->colClientes = [];
        $this->colContratos = [];
    }

    //Metodos de acceso
    //Getters
    public function getColPlanes() {
        return $this->colPlanes;
    }

    public function getColCanales() {
        return $this->colCanales;
    }

    public function getColClientes() {
        return $this->colClientes;
    }

    public function getColContratos() {
        return $this->colContratos;
    }

    //Setters
    public function setColPlanes($colPlanes) {
        $this->colPlanes = $colPlanes;
    }

    public function setColCanales($colCanales) {
        $this->colCanales = $colCanales;
    }

    public function setColClientes($colClientes) {
        $this->colClientes = $colClientes;
    }

    public function setColContratos($colContratos) {
        $this->colContratos = $colContratos;
    }


    //Metodo incorporar plan
    public function incorporarPlan($nuevoPlan){
        $colecPlanes = $this->getColPlanes();
        $encontrado = false;
        $cantPlanes = count($colecPlanes);
        $i = 0;

        $canales2 = $nuevoPlan->getCanales();
        $mg2 = $nuevoPlan->getTotalMg();
        while($i < $cantPlanes && !$encontrado){
            $canales = $colecPlanes[$i]->getCanales();
            $mg = $colecPlanes[$i]->getTotalMg();

            if($canales == $canales2[$i] && $mg == $mg2){
                $encontrado = true;
            }
            $i++;
        }
        if(!$encontrado){
            array_push($colecPlanes,$nuevoPlan);
            $this->setColPlanes($colecPlanes);
        }
        return $colecPlanes;
    }

    //Metodo que busca un contrato
    public function buscarContrato($tipoDoc, $nroDoc) {
        $contratos = $this->getColContratos();
        $i = 0;
        $encontrado = false;
        $contratoEncontrado = null;
        $cantContratos = count($contratos);
        while ($i < $cantContratos && !$encontrado) {
            $cliente = $contratos[$i]->getRefCliente();
            if ($cliente->getTipoDoc() == $tipoDoc && $cliente->getNroDoc() == $nroDoc) {
                $contratoEncontrado = $contratos[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $contratoEncontrado;
    }


    //Metodo que calcula el promedio
    public function retornarPromImporteContratos($codigoPlan) {
        $contratos = $this->getColContratos();
        $sumaImportes = 0;
        $cantidad = 0;
        foreach ($contratos as $contrato) {
            $plan = $contrato->getTipoPlan();
            if ($plan->getCodigo() == $codigoPlan) {
                $sumaImportes += $contrato->calcularImporte();
                $cantidad++;
            }
        }
        if($cantidad > 0){
            $prom = $sumaImportes / $cantidad;
        } 
        return $prom;
    }


    //Metodo para pagar el contrato
    public function pagarContrato($codigoContrato){
        $contratos = $this->getColContratos();
        $i = 0;
        $encontrado = false;
        $cantContratos = count($contratos);
        while($i < $cantContratos && !$encontrado){
            $codigo = $contratos[$i]->getCodigo();
            if($codigo == $codigoContrato){
                $encontrado = true;
                $contrato = $contratos[$i];
                $estado = $contrato->getEstado();
                $importeBase = $contrato->calcularImporte();
            }
            $i++;
        }
        if($encontrado){
            if ($estado == "al día") {
                $importeFinal = $importeBase;
            }elseif ($estado == "moroso" || $estado == "suspendido"){
                $diasVencido = diasContratoVencido($contrato);
                $multa = $importeBase * 0.10 * $diasVencido;
                $importeFinal = $importeBase + $multa;
            }
        }
        return $importeFinal;
    }
}