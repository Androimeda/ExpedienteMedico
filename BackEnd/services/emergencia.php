<?php
include_once('../class/Conexion.php');
include_once('../class/Emergencia.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['observacion'])){
    $observacion= $_POST['observacion'];
  }else{
    $observacion=null;
    $res['mensaje']='Se necesita campo: observacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHoraAtencion'])){
    $fechaHoraAtencion= $_POST['fechaHoraAtencion'];
  }else{
    $fechaHoraAtencion=null;
    $res['mensaje']='Se necesita campo: fechaHoraAtencion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idAtencion']) && $_POST['idAtencion']!=''){
    $idAtencion= $_POST['idAtencion'];
  }else{
    $idAtencion='null';
    $res['mensaje']='Se necesita campo: idAtencion';
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

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $emergencia=new Emergencia();
  $emergencia->setObservacion($observacion);
  $emergencia->setFechaHoraAtencion($fechaHoraAtencion);
  $emergencia->setIdExpediente($idExpediente);
  $emergencia->setIdAtencion($idAtencion);
  $emergencia->setIdCentroMedico($idCentroMedico);
  $emergencia->setIdMedico($idMedico);
  echo $emergencia->crear($conexion);
break;

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
  $emergencia=new Emergencia();
  $emergencia->setIdExpediente($idExpediente);
  echo $emergencia->listarPorPaciente($conexion);
break;

case 'listarPorHoy':
  $emergencia=new Emergencia();
  echo $emergencia->listarPorHoy($conexion);
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

  if(isset($_POST['fechaHoraAtencion'])){
    $fechaHoraAtencion= $_POST['fechaHoraAtencion'];
  }else{
    $fechaHoraAtencion=null;
    $res['mensaje']='Se necesita campo: fechaHoraAtencion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $emergencia=new Emergencia();
  $emergencia->setIdCentroMedico($idCentroMedico);
  $emergencia->setFechaHoraAtencion($fechaHoraAtencion);
  echo $emergencia->listarPorCentroFecha($conexion);
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
  $emergencia=new Emergencia();
  $emergencia->setIdMedico($idMedico);
  echo $emergencia->listarPorMedico($conexion);
break;

case 'actualizar':

  if(isset($_POST['idIngreso']) && $_POST['idIngreso']!=''){
    $idIngreso= $_POST['idIngreso'];
  }else{
    $idIngreso='null';
    $res['mensaje']='Se necesita campo: idIngreso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['observacion'])){
    $observacion= $_POST['observacion'];
  }else{
    $observacion=null;
    $res['mensaje']='Se necesita campo: observacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHoraAtencion'])){
    $fechaHoraAtencion= $_POST['fechaHoraAtencion'];
  }else{
    $fechaHoraAtencion=null;
    $res['mensaje']='Se necesita campo: fechaHoraAtencion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idAtencion']) && $_POST['idAtencion']!=''){
    $idAtencion= $_POST['idAtencion'];
  }else{
    $idAtencion='null';
    $res['mensaje']='Se necesita campo: idAtencion';
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

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $emergencia=new Emergencia();
  $emergencia->setIdIngreso($idIngreso);
  $emergencia->setObservacion($observacion);
  $emergencia->setFechaHoraAtencion($fechaHoraAtencion);
  $emergencia->setIdExpediente($idExpediente);
  $emergencia->setIdAtencion($idAtencion);
  $emergencia->setIdCentroMedico($idCentroMedico);
  $emergencia->setIdMedico($idMedico);
  echo $emergencia->actualizar($conexion);
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

  if(isset($_POST['nombreCentro'])){
    $nombreCentro= $_POST['nombreCentro'];
  }else{
    $nombreCentro=null;
    $res['mensaje']='Se necesita campo: nombreCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $emergencia=new Emergencia();
  $emergencia->setIdCentroMedico($idCentroMedico);
  $emergencia->setNombreCentro($nombreCentro);
  echo $emergencia->listarPorCentroMedico($conexion);
break;

case 'listarPorMedicoFecha':

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHoraAtencion'])){
    $fechaHoraAtencion= $_POST['fechaHoraAtencion'];
  }else{
    $fechaHoraAtencion=null;
    $res['mensaje']='Se necesita campo: fechaHoraAtencion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $emergencia=new Emergencia();
  $emergencia->setIdMedico($idMedico);
  $emergencia->setFechaHoraAtencion($fechaHoraAtencion);
  echo $emergencia->listarPorMedicoFecha($conexion);
break;

case 'eliminar':
  $emergencia=new Emergencia();
  echo $emergencia->eliminar($conexion);
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