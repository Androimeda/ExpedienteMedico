<?php
include_once('../class/Conexion.php');
include_once('../class/Referencia.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
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

  if(isset($_POST['idCentroMedicoRemite']) && $_POST['idCentroMedicoRemite']!=''){
    $idCentroMedicoRemite= $_POST['idCentroMedicoRemite'];
  }else{
    $idCentroMedicoRemite='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRemite';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idCentroMedicoRecibe']) && $_POST['idCentroMedicoRecibe']!=''){
    $idCentroMedicoRecibe= $_POST['idCentroMedicoRecibe'];
  }else{
    $idCentroMedicoRecibe='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRecibe';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setDescripcion($descripcion);
  $referencia->setIdMedico($idMedico);
  $referencia->setIdExpediente($idExpediente);
  $referencia->setIdCentroMedicoRemite($idCentroMedicoRemite);
  $referencia->setIdCentroMedicoRecibe($idCentroMedicoRecibe);
  echo $referencia->crear($conexion);
break;

case 'listarPorPaciente':

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setIdPaciente($idPaciente);
  echo $referencia->listarPorPaciente($conexion);
break;

case 'listarRecibidas':

  if(isset($_POST['idCentroMedicoRecibe']) && $_POST['idCentroMedicoRecibe']!=''){
    $idCentroMedicoRecibe= $_POST['idCentroMedicoRecibe'];
  }else{
    $idCentroMedicoRecibe='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRecibe';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setIdCentroMedicoRecibe($idCentroMedicoRecibe);
  echo $referencia->listarRecibidas($conexion);
break;

case 'listarPorCentroRemite':

  if(isset($_POST['idCentroMedicoRemite']) && $_POST['idCentroMedicoRemite']!=''){
    $idCentroMedicoRemite= $_POST['idCentroMedicoRemite'];
  }else{
    $idCentroMedicoRemite='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRemite';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setIdCentroMedicoRemite($idCentroMedicoRemite);
  echo $referencia->listarPorCentroRemite($conexion);
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

  if(isset($_POST['idCentroMedicoRemite']) && $_POST['idCentroMedicoRemite']!=''){
    $idCentroMedicoRemite= $_POST['idCentroMedicoRemite'];
  }else{
    $idCentroMedicoRemite='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRemite';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setIdMedico($idMedico);
  $referencia->setIdCentroMedicoRemite($idCentroMedicoRemite);
  echo $referencia->listarPorMedico($conexion);
break;

case 'listarTodos':
  $referencia=new Referencia();
  echo $referencia->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['idReferencia']) && $_POST['idReferencia']!=''){
    $idReferencia= $_POST['idReferencia'];
  }else{
    $idReferencia='null';
    $res['mensaje']='Se necesita campo: idReferencia';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
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

  if(isset($_POST['idCentroMedicoRemite']) && $_POST['idCentroMedicoRemite']!=''){
    $idCentroMedicoRemite= $_POST['idCentroMedicoRemite'];
  }else{
    $idCentroMedicoRemite='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRemite';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idCentroMedicoRecibe']) && $_POST['idCentroMedicoRecibe']!=''){
    $idCentroMedicoRecibe= $_POST['idCentroMedicoRecibe'];
  }else{
    $idCentroMedicoRecibe='null';
    $res['mensaje']='Se necesita campo: idCentroMedicoRecibe';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $referencia=new Referencia();
  $referencia->setIdReferencia($idReferencia);
  $referencia->setDescripcion($descripcion);
  $referencia->setIdMedico($idMedico);
  $referencia->setIdExpediente($idExpediente);
  $referencia->setIdCentroMedicoRemite($idCentroMedicoRemite);
  $referencia->setIdCentroMedicoRecibe($idCentroMedicoRecibe);
  echo $referencia->actualizar($conexion);
break;

case 'eliminar':
  $referencia=new Referencia();
  echo $referencia->eliminar($conexion);
break;

case 'listar':
  $referencia=new Referencia();
  echo $referencia->listar($conexion);
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