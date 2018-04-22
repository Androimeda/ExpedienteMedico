<?php
include_once('../class/Conexion.php');
include_once('../class/Examen.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['urlDocumento'])){
    $urlDocumento= $_POST['urlDocumento'];
  }else{
    $urlDocumento=null;
    $res['mensaje']='Se necesita campo: urlDocumento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipo']) && $_POST['idTipo']!=''){
    $idTipo= $_POST['idTipo'];
  }else{
    $idTipo='null';
    $res['mensaje']='Se necesita campo: idTipo';
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

  if(isset($_POST['observacion'])){
    $observacion= $_POST['observacion'];
  }else{
    $observacion=null;
    $res['mensaje']='Se necesita campo: observacion';
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

  if(isset($_POST['fecha'])){
    $fecha= $_POST['fecha'];
  }else{
    $fecha=null;
    $res['mensaje']='Se necesita campo: fecha';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $examen=new Examen();
  $examen->setUrlDocumento($urlDocumento);
  $examen->setIdTipo($idTipo);
  $examen->setIdCentroMedico($idCentroMedico);
  $examen->setObservacion($observacion);
  $examen->setIdExpediente($idExpediente);
  $examen->setFecha($fecha);
  echo $examen->crear($conexion);
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
  $examen=new Examen();
  $examen->setIdExpediente($idExpediente);
  echo $examen->listarPorPaciente($conexion);
break;

case 'listarPorTipo':

  if(isset($_POST['idTipo']) && $_POST['idTipo']!=''){
    $idTipo= $_POST['idTipo'];
  }else{
    $idTipo='null';
    $res['mensaje']='Se necesita campo: idTipo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $examen=new Examen();
  $examen->setIdTipo($idTipo);
  echo $examen->listarPorTipo($conexion);
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
  $examen=new Examen();
  $examen->setIdCentroMedico($idCentroMedico);
  echo $examen->listarPorCentro($conexion);
break;

case 'listarTodos':
  $examen=new Examen();
  echo $examen->listarTodos($conexion);
break;

case 'actualizarTipoExamen':
  $examen=new Examen();
  echo $examen->actualizarTipoExamen($conexion);
break;

case 'actualizar':

  if(isset($_POST['idExamen']) && $_POST['idExamen']!=''){
    $idExamen= $_POST['idExamen'];
  }else{
    $idExamen='null';
    $res['mensaje']='Se necesita campo: idExamen';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['urlDocumento'])){
    $urlDocumento= $_POST['urlDocumento'];
  }else{
    $urlDocumento=null;
    $res['mensaje']='Se necesita campo: urlDocumento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipo']) && $_POST['idTipo']!=''){
    $idTipo= $_POST['idTipo'];
  }else{
    $idTipo='null';
    $res['mensaje']='Se necesita campo: idTipo';
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

  if(isset($_POST['observacion'])){
    $observacion= $_POST['observacion'];
  }else{
    $observacion=null;
    $res['mensaje']='Se necesita campo: observacion';
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

  if(isset($_POST['fecha'])){
    $fecha= $_POST['fecha'];
  }else{
    $fecha=null;
    $res['mensaje']='Se necesita campo: fecha';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $examen=new Examen();
  $examen->setIdExamen($idExamen);
  $examen->setUrlDocumento($urlDocumento);
  $examen->setIdTipo($idTipo);
  $examen->setIdCentroMedico($idCentroMedico);
  $examen->setObservacion($observacion);
  $examen->setIdExpediente($idExpediente);
  $examen->setFecha($fecha);
  echo $examen->actualizar($conexion);
break;

case 'agregarTipoExamen':
  $examen=new Examen();
  echo $examen->agregarTipoExamen($conexion);
break;

case 'listarTipoExamen':
  $examen=new Examen();
  echo $examen->listarTipoExamen($conexion);
break;

default:
    $res['mensaje']='Accion no reconocida';
    $res['resultado']=false;
    echo json_encode($res);

}
$conexion->close();
}else{
  $res['mensaje']='Accion no especificada';
  $res['resultado']=false;
  echo json_encode($res);
}
?>