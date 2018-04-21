<?php
# public function ... ($conexion) {...
# Llamada a PL_CrearCentroMedico
include_once("./class/Conexion.php");
include_once('./class/Ambulancia.php');
include_once('./class/AtencionPreHospitalaria.php');
include_once('./class/CentroMedico.php');

$conexion=new Conexion();

$a = new CentroMedico();
$a->setIdTipoCentro(1);
// $a->setDescripcion('Clinica');
echo $a->listarPorTipo($conexion);

?>