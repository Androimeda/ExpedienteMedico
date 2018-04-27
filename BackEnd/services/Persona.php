<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Persona.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'listarOcupacion':
  $persona=new Persona();
  echo $persona->listarOcupacion($conexion);
break;

case 'listarAscendencia':
  $persona=new Persona();
  echo $persona->listarAscendencia($conexion);
break;

case 'listarEstadoCivil':
  $persona=new Persona();
  echo $persona->listarEstadoCivil($conexion);
break;

case 'listarPais':
  $persona=new Persona();
  echo $persona->listarPais($conexion);
break;

case 'listarTipoSangre':
  $persona=new Persona();
  echo $persona->listarTipoSangre($conexion);
break;

case 'listarEscolaridad':
  $persona=new Persona();
  echo $persona->listarEscolaridad($conexion);
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