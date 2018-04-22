<?php
include_once('../class/Conexion.php');
include_once('../class/Paramedico.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['pNombre'])){
    $pNombre= $_POST['pNombre'];
  }else{
    $pNombre=null;
    $res['mensaje']='Se necesita campo: pNombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['sNombre'])){
    $sNombre= $_POST['sNombre'];
  }else{
    $sNombre=null;
    $res['mensaje']='Se necesita campo: sNombre';
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

  if(isset($_POST['sApellido']) && $_POST['sApellido']!=''){
    $sApellido= $_POST['sApellido'];
  }else{
    $sApellido='null';
    $res['mensaje']='Se necesita campo: sApellido';
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

  if(isset($_POST['sexo'])){
    $sexo= $_POST['sexo'];
  }else{
    $sexo=null;
    $res['mensaje']='Se necesita campo: sexo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['noIdentidad']) && $_POST['noIdentidad']!=''){
    $noIdentidad= $_POST['noIdentidad'];
  }else{
    $noIdentidad='null';
    $res['mensaje']='Se necesita campo: noIdentidad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['correo'])){
    $correo= $_POST['correo'];
  }else{
    $correo=null;
    $res['mensaje']='Se necesita campo: correo';
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

  if(isset($_POST['licencia'])){
    $licencia= $_POST['licencia'];
  }else{
    $licencia=null;
    $res['mensaje']='Se necesita campo: licencia';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setPNombre($pNombre);
  $paramedico->setSNombre($sNombre);
  $paramedico->setPApellido($pApellido);
  $paramedico->setSApellido($sApellido);
  $paramedico->setDireccion($direccion);
  $paramedico->setSexo($sexo);
  $paramedico->setNoIdentidad($noIdentidad);
  $paramedico->setCorreo($correo);
  $paramedico->setIdPais($idPais);
  $paramedico->setLicencia($licencia);
  echo $paramedico->crear($conexion);
break;

case 'buscarPorApellido':

  if(isset($_POST['pApellido']) && $_POST['pApellido']!=''){
    $pApellido= $_POST['pApellido'];
  }else{
    $pApellido='null';
    $res['mensaje']='Se necesita campo: pApellido';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['sApellido']) && $_POST['sApellido']!=''){
    $sApellido= $_POST['sApellido'];
  }else{
    $sApellido='null';
    $res['mensaje']='Se necesita campo: sApellido';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setPApellido($pApellido);
  $paramedico->setSApellido($sApellido);
  echo $paramedico->buscarPorApellido($conexion);
break;

case 'buscarPorNoIdentidad':

  if(isset($_POST['noIdentidad']) && $_POST['noIdentidad']!=''){
    $noIdentidad= $_POST['noIdentidad'];
  }else{
    $noIdentidad='null';
    $res['mensaje']='Se necesita campo: noIdentidad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setNoIdentidad($noIdentidad);
  echo $paramedico->buscarPorNoIdentidad($conexion);
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
  $paramedico=new Paramedico();
  $paramedico->setIdCentroMedico($idCentroMedico);
  echo $paramedico->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['idParamedico']) && $_POST['idParamedico']!=''){
    $idParamedico= $_POST['idParamedico'];
  }else{
    $idParamedico='null';
    $res['mensaje']='Se necesita campo: idParamedico';
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

  if(isset($_POST['correo'])){
    $correo= $_POST['correo'];
  }else{
    $correo=null;
    $res['mensaje']='Se necesita campo: correo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['licencia'])){
    $licencia= $_POST['licencia'];
  }else{
    $licencia=null;
    $res['mensaje']='Se necesita campo: licencia';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setIdParamedico($idParamedico);
  $paramedico->setDireccion($direccion);
  $paramedico->setCorreo($correo);
  $paramedico->setLicencia($licencia);
  echo $paramedico->actualizar($conexion);
break;

case 'buscarPorNombre':

  if(isset($_POST['pNombre'])){
    $pNombre= $_POST['pNombre'];
  }else{
    $pNombre=null;
    $res['mensaje']='Se necesita campo: pNombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['sNombre'])){
    $sNombre= $_POST['sNombre'];
  }else{
    $sNombre=null;
    $res['mensaje']='Se necesita campo: sNombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setPNombre($pNombre);
  $paramedico->setSNombre($sNombre);
  echo $paramedico->buscarPorNombre($conexion);
break;

case 'listar':

  if(isset($_POST['idParamedico']) && $_POST['idParamedico']!=''){
    $idParamedico= $_POST['idParamedico'];
  }else{
    $idParamedico='null';
    $res['mensaje']='Se necesita campo: idParamedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paramedico=new Paramedico();
  $paramedico->setIdParamedico($idParamedico);
  echo $paramedico->listar($conexion);
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