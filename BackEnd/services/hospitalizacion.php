<?php
include_once('../class/Conexion.php');
include_once('../class/Hospitalizacion.php');
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

  if(isset($_POST['fechaHoraIngreso'])){
    $fechaHoraIngreso= $_POST['fechaHoraIngreso'];
  }else{
    $fechaHoraIngreso=null;
    $res['mensaje']='Se necesita campo: fechaHoraIngreso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHoraAlta'])){
    $fechaHoraAlta= $_POST['fechaHoraAlta'];
  }else{
    $fechaHoraAlta=null;
    $res['mensaje']='Se necesita campo: fechaHoraAlta';
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

  if(isset($_POST['cama'])){
    $cama= $_POST['cama'];
  }else{
    $cama=null;
    $res['mensaje']='Se necesita campo: cama';
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

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setObservacion($observacion);
  $hospitalizacion->setFechaHoraIngreso($fechaHoraIngreso);
  $hospitalizacion->setFechaHoraAlta($fechaHoraAlta);
  $hospitalizacion->setIdPiso($idPiso);
  $hospitalizacion->setCama($cama);
  $hospitalizacion->setIdMedico($idMedico);
  $hospitalizacion->setIdExpediente($idExpediente);
  echo $hospitalizacion->crear($conexion);
break;

case 'listarPorPiso':

  if(isset($_POST['idPiso']) && $_POST['idPiso']!=''){
    $idPiso= $_POST['idPiso'];
  }else{
    $idPiso='null';
    $res['mensaje']='Se necesita campo: idPiso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setIdPiso($idPiso);
  echo $hospitalizacion->listarPorPiso($conexion);
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
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setIdExpediente($idExpediente);
  echo $hospitalizacion->listarPorPaciente($conexion);
break;

case 'listarPorMedico':

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
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setIdCentroMedico($idCentroMedico);
  $hospitalizacion->setIdMedico($idMedico);
  echo $hospitalizacion->listarPorMedico($conexion);
break;

case 'actualizar':
  $hospitalizacion=new Hospitalizacion();
  echo $hospitalizacion->actualizar($conexion);
break;

case 'listarPorFecha':

  if(isset($_POST['fechaHoraIngreso'])){
    $fechaHoraIngreso= $_POST['fechaHoraIngreso'];
  }else{
    $fechaHoraIngreso=null;
    $res['mensaje']='Se necesita campo: fechaHoraIngreso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setFechaHoraIngreso($fechaHoraIngreso);
  echo $hospitalizacion->listarPorFecha($conexion);
break;

case 'darAlta':

  if(isset($_POST['idIngreso']) && $_POST['idIngreso']!=''){
    $idIngreso= $_POST['idIngreso'];
  }else{
    $idIngreso='null';
    $res['mensaje']='Se necesita campo: idIngreso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHoraAlta'])){
    $fechaHoraAlta= $_POST['fechaHoraAlta'];
  }else{
    $fechaHoraAlta=null;
    $res['mensaje']='Se necesita campo: fechaHoraAlta';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setIdIngreso($idIngreso);
  $hospitalizacion->setFechaHoraAlta($fechaHoraAlta);
  echo $hospitalizacion->darAlta($conexion);
break;

case 'listarPorCentro':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hospitalizacion=new Hospitalizacion();
  $hospitalizacion->setIdCentroMedico($idCentroMedico);
  echo $hospitalizacion->listarPorCentro($conexion);
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