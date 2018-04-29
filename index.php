<?php 
include_once("./BackEnd/class/Conexion.php");

$conexion =new Conexion();
$resultado = $conexion->query("SELECT * FROM AMBULANCIA");
$registros = $conexion->filas($resultado);
var_dump($registros);

 ?>