<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Cirugia.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'listarPorPaciente':

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setIdExpediente($idExpediente);
  echo $cirugia->listarPorPaciente($conexion);
break;

case 'agregarCirugia':

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoCirugia']) && $_POST['idTipoCirugia']!=''){
    $idTipoCirugia= $_POST['idTipoCirugia'];
  }else{
    $idTipoCirugia='null';
    $res['mensaje']='Se necesita campo: idTipoCirugia';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idIngreso']) && $_POST['idIngreso']!=''){
    $idIngreso= $_POST['idIngreso'];
  }else{
    $idIngreso='null';
    $res['mensaje']='Se necesita campo: idIngreso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setFechaHora($fechaHora);
  $cirugia->setIdTipoCirugia($idTipoCirugia);
  $cirugia->setIdIngreso($idIngreso);
  $cirugia->setIdMedico($idMedico);
  echo $cirugia->agregarCirugia($conexion);
break;

case 'listarPorHoy':
  $cirugia=new Cirugia();
  echo $cirugia->listarPorHoy($conexion);
break;

case 'listarTipoCirugia':
  $cirugia=new Cirugia();
  echo $cirugia->listarTipoCirugia($conexion);
break;

case 'listarPorCentroFecha':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setIdCentroMedico($idCentroMedico);
  $cirugia->setFechaHora($fechaHora);
  echo $cirugia->listarPorCentroFecha($conexion);
break;

case 'actualizarTipoCirugia':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPiso']) && $_POST['idPiso']!=''){
    $idPiso= $_POST['idPiso'];
  }else{
    $idPiso='null';
    $res['mensaje']='Se necesita campo: idPiso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setDescripcion($descripcion);
  $cirugia->setIdPiso($idPiso);
  echo $cirugia->actualizarTipoCirugia($conexion);
break;

case 'listarPorMedico':

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setIdMedico($idMedico);
  echo $cirugia->listarPorMedico($conexion);
break;

case 'listarPorMedicoFecha':

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setFechaHora($fechaHora);
  $cirugia->setIdMedico($idMedico);
  echo $cirugia->listarPorMedicoFecha($conexion);
break;

case 'listarPorCentroMedico':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setIdCentroMedico($idCentroMedico);
  echo $cirugia->listarPorCentroMedico($conexion);
break;

case 'agregarTipoCirugia':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $cirugia=new Cirugia();
  $cirugia->setDescripcion($descripcion);
  echo $cirugia->agregarTipoCirugia($conexion);
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