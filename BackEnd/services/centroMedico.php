<?php
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/CentroMedico.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['nombre'])){
    $nombre= $_POST['nombre'];
  }else{
    $nombre=null;
    $res['mensaje']='Se necesita campo: nombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoCentro']) && $_POST['idTipoCentro']!=''){
    $idTipoCentro= $_POST['idTipoCentro'];
  }else{
    $idTipoCentro='null';
    $res['mensaje']='Se necesita campo: idTipoCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['direccion'])){
    $direccion= $_POST['direccion'];
  }else{
    $direccion=null;
    $res['mensaje']='Se necesita campo: direccion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $centromedico=new CentroMedico();
  $centromedico->setNombre($nombre);
  $centromedico->setIdTipoCentro($idTipoCentro);
  $centromedico->setDireccion($direccion);
  echo $centromedico->crear($conexion);
break;

case 'listarTipos':
  $centromedico=new CentroMedico();
  echo $centromedico->listarTipos($conexion);
break;

case 'listarTodos':
  $centromedico=new CentroMedico();
  echo $centromedico->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['pnombre'])){
    $pnombre= $_POST['pnombre'];
  }else{
    $pnombre=null;
    $res['mensaje']='Se necesita campo: pnombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoCentro']) && $_POST['idTipoCentro']!=''){
    $idTipoCentro= $_POST['idTipoCentro'];
  }else{
    $idTipoCentro='null';
    $res['mensaje']='Se necesita campo: idTipoCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['pdireccion'])){
    $pdireccion= $_POST['pdireccion'];
  }else{
    $pdireccion=null;
    $res['mensaje']='Se necesita campo: pdireccion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $centromedico=new CentroMedico();
  $centromedico->setPnombre($pnombre);
  $centromedico->setIdTipoCentro($idTipoCentro);
  $centromedico->setIdCentroMedico($idCentroMedico);
  $centromedico->setPdireccion($pdireccion);
  echo $centromedico->actualizar($conexion);
break;

case 'listarPorTipo':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoCentro']) && $_POST['idTipoCentro']!=''){
    $idTipoCentro= $_POST['idTipoCentro'];
  }else{
    $idTipoCentro='null';
    $res['mensaje']='Se necesita campo: idTipoCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $centromedico=new CentroMedico();
  $centromedico->setDescripcion($descripcion);
  $centromedico->setIdTipoCentro($idTipoCentro);
  echo $centromedico->listarPorTipo($conexion);
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