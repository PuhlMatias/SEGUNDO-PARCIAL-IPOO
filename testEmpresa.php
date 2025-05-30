<?php
include_once 'claseCliente.php';
include_once 'claseContrato.php';
include_once 'claseContratoWeb.php';
include_once 'claseEmpresaCable.php';
include_once 'claseCanales.php';
include_once 'clasePlanes.php';


$empresa = new EmpresaCable();

$canal1 = new Canal("Musical", 150000, true);
$canal2 = new Canal("Deportivo", 20000, false);
$canal3 = new Canal("Educativo", 25000, true);

$colCanales = [$canal1, $canal2, $canal3];

$plan1 = new Planes(111, $colCanales, 500, true, 300);
$plan2 = new Planes(222, [$canal1, $canal3], 400, false,500);

$cliente = new Cliente("DNI",46257237,"Matias", "Puhl");

$contratoEmpresa = new Contrato("10/05/2022","10/05/2023", $plan1,true,"al dia",true, $cliente,111);
$contratoWeb1 = new ContratoWeb("10/05/2022","10/05/2023", $plan2,true,"moroso",true, $cliente,222); 
$contratoWeb2 = new ContratoWeb("17/09/2021","1/7/2022", $plan1,false,"al dia",true, $cliente,333);   

$con1 = $contratoEmpresa->calcularImporte() . "\n";
$con2 = $contratoWeb1->calcularImporte() . "\n";
$con3 = $contratoWeb2->calcularImporte() . "\n";

echo $con1 . "\n";
echo $con2 . "\n";
echo $con3 . "\n";

$empresa->incorporarPlan($plan1);
$empresa->incorporarPlan($plan2);

$hoy = date("Y-m-d");
$vencimiento = date("Y-m-d", strtotime("+30 days"));
$empresa->incorporarContrato($plan1, $cliente, $hoy, $vencimiento, false);
$empresa->incorporarContrato($plan2, $cliente, $hoy, $vencimiento, true);

$empresa->pagarContrato(111);
$empresa->pagarContrato(222);

$empresa->retornarPromImporteContratos(111);