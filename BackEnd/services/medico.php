<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Persona.php');
include_once('../class/Medico.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['noColegiacion'])){
    $noColegiacion= $_POST['noColegiacion'];
  }else{
    $noColegiacion=null;
    $res['mensaje']='Se necesita campo: noColegiacion';
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

  if(isset($_POST['noIdentidad']) && $_POST['noIdentidad']!=''){
    $noIdentidad= $_POST['noIdentidad'];
  }else{
    $noIdentidad='null';
    $res['mensaje']='Se necesita campo: noIdentidad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEspecialidad']) && $_POST['idEspecialidad']!=''){
    $idEspecialidad= $_POST['idEspecialidad'];
  }else{
    $idEspecialidad='null';
    $res['mensaje']='Se necesita campo: idEspecialidad';
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

  if(isset($_POST['sNombre'])){
    $sNombre= $_POST['sNombre'];
  }else{
    $sNombre=null;
    $res['mensaje']='Se necesita campo: sNombre';
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

  if(isset($_POST['correo'])){
    $correo= $_POST['correo'];
  }else{
    $correo=null;
    $res['mensaje']='Se necesita campo: correo';
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

  if(isset($_POST['sexo'])){
    $sexo= $_POST['sexo'];
  }else{
    $sexo=null;
    $res['mensaje']='Se necesita campo: sexo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $medico=new Medico();
  $medico->setNoColegiacion($noColegiacion);
  $medico->setIdPais($idPais);
  $medico->setNoIdentidad($noIdentidad);
  $medico->setIdEspecialidad($idEspecialidad);
  $medico->setPNombre($pNombre);
  $medico->setSNombre($sNombre);
  $medico->setSApellido($sApellido);
  $medico->setDireccion($direccion);
  $medico->setCorreo($correo);
  $medico->setPApellido($pApellido);
  $medico->setSexo($sexo);
  echo $medico->crear($conexion);
break;

case 'buscarPorApellido':

  if(isset($_POST['sApellido']) && $_POST['sApellido']!=''){
    $sApellido= $_POST['sApellido'];
  }else{
    $sApellido='null';
    $res['mensaje']='Se necesita campo: sApellido';
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
  $medico=new Medico();
  $medico->setSApellido($sApellido);
  $medico->setPApellido($pApellido);
  echo $medico->buscarPorApellido($conexion);
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
  $medico=new Medico();
  $medico->setNoIdentidad($noIdentidad);
  echo $medico->buscarPorNoIdentidad($conexion);
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
  $medico=new Medico();
  $medico->setIdCentroMedico($idCentroMedico);
  echo $medico->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['correo'])){
    $correo= $_POST['correo'];
  }else{
    $correo=null;
    $res['mensaje']='Se necesita campo: correo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['noColegiacion'])){
    $noColegiacion= $_POST['noColegiacion'];
  }else{
    $noColegiacion=null;
    $res['mensaje']='Se necesita campo: noColegiacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEspecialidad']) && $_POST['idEspecialidad']!=''){
    $idEspecialidad= $_POST['idEspecialidad'];
  }else{
    $idEspecialidad='null';
    $res['mensaje']='Se necesita campo: idEspecialidad';
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

  if(isset($_POST['direccion'])){
    $direccion= $_POST['direccion'];
  }else{
    $direccion=null;
    $res['mensaje']='Se necesita campo: direccion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $medico=new Medico();
  $medico->setCorreo($correo);
  $medico->setNoColegiacion($noColegiacion);
  $medico->setIdEspecialidad($idEspecialidad);
  $medico->setIdMedico($idMedico);
  $medico->setDireccion($direccion);
  echo $medico->actualizar($conexion);
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
  $medico=new Medico();
  $medico->setPNombre($pNombre);
  $medico->setSNombre($sNombre);
  echo $medico->buscarPorNombre($conexion);
break;

case 'listarEspecialidad':
  $medico=new Medico();
  echo $medico->listarEspecialidad($conexion);
break;

case 'listar':

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $medico=new Medico();
  $medico->setIdMedico($idMedico);
  echo $medico->listar($conexion);
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