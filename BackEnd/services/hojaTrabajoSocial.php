<?php
include_once('../class/Conexion.php');
include_once('../class/HojaTrabajoSocial.php');
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

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
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
  $hojatrabajosocial=new HojaTrabajoSocial();
  $hojatrabajosocial->setDescripcion($descripcion);
  $hojatrabajosocial->setIdExpediente($idExpediente);
  $hojatrabajosocial->setIdCentroMedico($idCentroMedico);
  echo $hojatrabajosocial->crear($conexion);
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
  $hojatrabajosocial=new HojaTrabajoSocial();
  $hojatrabajosocial->setIdExpediente($idExpediente);
  echo $hojatrabajosocial->listarPorPaciente($conexion);
break;

case 'listarTodos':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $hojatrabajosocial=new HojaTrabajoSocial();
  $hojatrabajosocial->setIdCentroMedico($idCentroMedico);
  echo $hojatrabajosocial->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['idTS']) && $_POST['idTS']!=''){
    $idTS= $_POST['idTS'];
  }else{
    $idTS='null';
    $res['mensaje']='Se necesita campo: idTS';
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

  if(isset($_POST['idExpediente']) && $_POST['idExpediente']!=''){
    $idExpediente= $_POST['idExpediente'];
  }else{
    $idExpediente='null';
    $res['mensaje']='Se necesita campo: idExpediente';
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
  $hojatrabajosocial=new HojaTrabajoSocial();
  $hojatrabajosocial->setIdTS($idTS);
  $hojatrabajosocial->setDescripcion($descripcion);
  $hojatrabajosocial->setIdExpediente($idExpediente);
  $hojatrabajosocial->setIdCentroMedico($idCentroMedico);
  echo $hojatrabajosocial->actualizar($conexion);
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