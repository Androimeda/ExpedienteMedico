<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Enfermedad.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['idTipoEnfermedad']) && $_POST['idTipoEnfermedad']!=''){
    $idTipoEnfermedad= $_POST['idTipoEnfermedad'];
  }else{
    $idTipoEnfermedad='null';
    $res['mensaje']='Se necesita campo: idTipoEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['enfermedad'])){
    $enfermedad= $_POST['enfermedad'];
  }else{
    $enfermedad=null;
    $res['mensaje']='Se necesita campo: enfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setIdTipoEnfermedad($idTipoEnfermedad);
  $enfermedad->setEnfermedad($enfermedad);
  echo $enfermedad->crear($conexion);
break;

case 'agregarTipoEnfermedad':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setDescripcion($descripcion);
  echo $enfermedad->agregarTipoEnfermedad($conexion);
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
  $enfermedad=new Enfermedad();
  $enfermedad->setIdExpediente($idExpediente);
  echo $enfermedad->listarPorPaciente($conexion);
break;

case 'listarPorTipo':

  if(isset($_POST['idTipoEnfermedad']) && $_POST['idTipoEnfermedad']!=''){
    $idTipoEnfermedad= $_POST['idTipoEnfermedad'];
  }else{
    $idTipoEnfermedad='null';
    $res['mensaje']='Se necesita campo: idTipoEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setIdTipoEnfermedad($idTipoEnfermedad);
  echo $enfermedad->listarPorTipo($conexion);
break;

case 'quitarDiagnostico':

  if(isset($_POST['idConsulta']) && $_POST['idConsulta']!=''){
    $idConsulta= $_POST['idConsulta'];
  }else{
    $idConsulta='null';
    $res['mensaje']='Se necesita campo: idConsulta';
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

  if(isset($_POST['idEnfermedad']) && $_POST['idEnfermedad']!=''){
    $idEnfermedad= $_POST['idEnfermedad'];
  }else{
    $idEnfermedad='null';
    $res['mensaje']='Se necesita campo: idEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setIdConsulta($idConsulta);
  $enfermedad->setIdExpediente($idExpediente);
  $enfermedad->setIdEnfermedad($idEnfermedad);
  echo $enfermedad->quitarDiagnostico($conexion);
break;

case 'actualizarTipoEnfermedad':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoEnfermedad']) && $_POST['idTipoEnfermedad']!=''){
    $idTipoEnfermedad= $_POST['idTipoEnfermedad'];
  }else{
    $idTipoEnfermedad='null';
    $res['mensaje']='Se necesita campo: idTipoEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setDescripcion($descripcion);
  $enfermedad->setIdTipoEnfermedad($idTipoEnfermedad);
  echo $enfermedad->actualizarTipoEnfermedad($conexion);
break;

case 'listarTodos':
  $enfermedad=new Enfermedad();
  echo $enfermedad->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['idTipoEnfermedad']) && $_POST['idTipoEnfermedad']!=''){
    $idTipoEnfermedad= $_POST['idTipoEnfermedad'];
  }else{
    $idTipoEnfermedad='null';
    $res['mensaje']='Se necesita campo: idTipoEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['penfermedad'])){
    $penfermedad= $_POST['penfermedad'];
  }else{
    $penfermedad=null;
    $res['mensaje']='Se necesita campo: penfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEnfermedad']) && $_POST['idEnfermedad']!=''){
    $idEnfermedad= $_POST['idEnfermedad'];
  }else{
    $idEnfermedad='null';
    $res['mensaje']='Se necesita campo: idEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setIdTipoEnfermedad($idTipoEnfermedad);
  $enfermedad->setPenfermedad($penfermedad);
  $enfermedad->setIdEnfermedad($idEnfermedad);
  echo $enfermedad->actualizar($conexion);
break;

case 'listarTipoEnfermedad':
  $enfermedad=new Enfermedad();
  echo $enfermedad->listarTipoEnfermedad($conexion);
break;

case 'diagnosticarEnfermedad':

  if(isset($_POST['idConsulta']) && $_POST['idConsulta']!=''){
    $idConsulta= $_POST['idConsulta'];
  }else{
    $idConsulta='null';
    $res['mensaje']='Se necesita campo: idConsulta';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEnfermedad']) && $_POST['idEnfermedad']!=''){
    $idEnfermedad= $_POST['idEnfermedad'];
  }else{
    $idEnfermedad='null';
    $res['mensaje']='Se necesita campo: idEnfermedad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $enfermedad=new Enfermedad();
  $enfermedad->setIdConsulta($idConsulta);
  $enfermedad->setIdEnfermedad($idEnfermedad);
  echo $enfermedad->diagnosticarEnfermedad($conexion);
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