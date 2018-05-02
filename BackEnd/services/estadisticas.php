<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Estadisticas.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'medicos':
  $estadisticas=new Estadisticas();
  echo $estadisticas->medicos($conexion);
break;

case 'centros':
  $estadisticas=new Estadisticas();
  echo $estadisticas->centros($conexion);
break;

case 'pacienteMax':
  $estadisticas=new Estadisticas();
  echo $estadisticas->pacienteMax($conexion);
break;

default:
    $res['mensaje']='Accion no reconocida';
    $res['resultado']=false;
    echo json_encode($res);
break;

}
$conexion->close();
}else{
  $res['mensaje']='Accion no especificada';
  $res['resultado']=false;
  echo json_encode($res);
}
?>