<?php
include_once('../class/Conexion.php');
include_once('../class/Telefono.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'agregarTelefonoPersona':

  if(isset($_POST['idPersona']) && $_POST['idPersona']!=''){
    $idPersona= $_POST['idPersona'];
  }else{
    $idPersona='null';
    $res['mensaje']='Se necesita campo: idPersona';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['telefono'])){
    $telefono= $_POST['telefono'];
  }else{
    $telefono=null;
    $res['mensaje']='Se necesita campo: telefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoTelefono']) && $_POST['idTipoTelefono']!=''){
    $idTipoTelefono= $_POST['idTipoTelefono'];
  }else{
    $idTipoTelefono='null';
    $res['mensaje']='Se necesita campo: idTipoTelefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPais']) && $_POST['idPais']!=''){
    $idPais= $_POST['idPais'];
  }else{
    $idPais='null';
    $res['mensaje']='Se necesita campo: idPais';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setIdPersona($idPersona);
  $telefono->setTelefono($telefono);
  $telefono->setIdTipoTelefono($idTipoTelefono);
  $telefono->setIdPais($idPais);
  echo $telefono->agregarTelefonoPersona($conexion);
break;

case 'listarTipoTelefono':
  $telefono=new Telefono();
  echo $telefono->listarTipoTelefono($conexion);
break;

case 'buscarPorPersona':

  if(isset($_POST['noIdentidad']) && $_POST['noIdentidad']!=''){
    $noIdentidad= $_POST['noIdentidad'];
  }else{
    $noIdentidad='null';
    $res['mensaje']='Se necesita campo: noIdentidad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['pNombre'])){
    $pNombre= $_POST['pNombre'];
  }else{
    $pNombre=null;
    $res['mensaje']='Se necesita campo: pNombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['pApellido']) && $_POST['pApellido']!=''){
    $pApellido= $_POST['pApellido'];
  }else{
    $pApellido='null';
    $res['mensaje']='Se necesita campo: pApellido';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setNoIdentidad($noIdentidad);
  $telefono->setPNombre($pNombre);
  $telefono->setPApellido($pApellido);
  echo $telefono->buscarPorPersona($conexion);
break;

case 'listarPorCentroMedico':
  $telefono=new Telefono();
  echo $telefono->listarPorCentroMedico($conexion);
break;

case 'listarPorPersona':
  $telefono=new Telefono();
  echo $telefono->listarPorPersona($conexion);
break;

case 'actualizarTipoTelefono':
  $telefono=new Telefono();
  echo $telefono->actualizarTipoTelefono($conexion);
break;

case 'agregarTipoTelefono':

  if(isset($_POST['tipoTelefono'])){
    $tipoTelefono= $_POST['tipoTelefono'];
  }else{
    $tipoTelefono=null;
    $res['mensaje']='Se necesita campo: tipoTelefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setTipoTelefono($tipoTelefono);
  echo $telefono->agregarTipoTelefono($conexion);
break;

case 'agregarTelefonoCentro':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['telefono'])){
    $telefono= $_POST['telefono'];
  }else{
    $telefono=null;
    $res['mensaje']='Se necesita campo: telefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoTelefono']) && $_POST['idTipoTelefono']!=''){
    $idTipoTelefono= $_POST['idTipoTelefono'];
  }else{
    $idTipoTelefono='null';
    $res['mensaje']='Se necesita campo: idTipoTelefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPais']) && $_POST['idPais']!=''){
    $idPais= $_POST['idPais'];
  }else{
    $idPais='null';
    $res['mensaje']='Se necesita campo: idPais';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setIdCentroMedico($idCentroMedico);
  $telefono->setTelefono($telefono);
  $telefono->setIdTipoTelefono($idTipoTelefono);
  $telefono->setIdPais($idPais);
  echo $telefono->agregarTelefonoCentro($conexion);
break;

case 'eliminarDePersona':

  if(isset($_POST['idPersona']) && $_POST['idPersona']!=''){
    $idPersona= $_POST['idPersona'];
  }else{
    $idPersona='null';
    $res['mensaje']='Se necesita campo: idPersona';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTelefono']) && $_POST['idTelefono']!=''){
    $idTelefono= $_POST['idTelefono'];
  }else{
    $idTelefono='null';
    $res['mensaje']='Se necesita campo: idTelefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setIdPersona($idPersona);
  $telefono->setIdTelefono($idTelefono);
  echo $telefono->eliminarDePersona($conexion);
break;

case 'eliminarDeCentro':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTelefono']) && $_POST['idTelefono']!=''){
    $idTelefono= $_POST['idTelefono'];
  }else{
    $idTelefono='null';
    $res['mensaje']='Se necesita campo: idTelefono';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setIdCentroMedico($idCentroMedico);
  $telefono->setIdTelefono($idTelefono);
  echo $telefono->eliminarDeCentro($conexion);
break;

case 'buscarPorCentro':

  if(isset($_POST['nombreCentro'])){
    $nombreCentro= $_POST['nombreCentro'];
  }else{
    $nombreCentro=null;
    $res['mensaje']='Se necesita campo: nombreCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $telefono=new Telefono();
  $telefono->setNombreCentro($nombreCentro);
  echo $telefono->buscarPorCentro($conexion);
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