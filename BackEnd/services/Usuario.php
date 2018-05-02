<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Persona.php');
include_once('../class/Usuario.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'listarTipos':
  $usuario=new Usuario();
  echo $usuario->listarTipos($conexion);
break;

case 'login':

  if(isset($_POST['correo'])){
    $correo= $_POST['correo'];
  }else{
    $correo=null;
    $res['mensaje']='Se necesita campo: correo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['contrasena'])){
    $contrasena= $_POST['contrasena'];
  }else{
    $contrasena=null;
    $res['mensaje']='Se necesita campo: contrasena';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $usuario=new Usuario();
  $usuario->setCorreo($correo);
  $usuario->setContrasena($contrasena);
  echo $usuario->login($conexion);
break;

case 'registrar':

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

  if(isset($_POST['nombreCentroMedico'])){
    $nombreCentroMedico= $_POST['nombreCentroMedico'];
  }else{
    $nombreCentroMedico=null;
    $res['mensaje']='Se necesita campo: nombreCentroMedico';
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

  if(isset($_POST['idTipoUsuario']) && $_POST['idTipoUsuario']!=''){
    $idTipoUsuario= $_POST['idTipoUsuario'];
  }else{
    $idTipoUsuario='null';
    $res['mensaje']='Se necesita campo: idTipoUsuario';
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

  if(isset($_POST['idTipoCentroMedico']) && $_POST['idTipoCentroMedico']!=''){
    $idTipoCentroMedico= $_POST['idTipoCentroMedico'];
  }else{
    $idTipoCentroMedico='null';
    $res['mensaje']='Se necesita campo: idTipoCentroMedico';
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

  if(isset($_POST['contrasena'])){
    $contrasena= $_POST['contrasena'];
  }else{
    $contrasena=null;
    $res['mensaje']='Se necesita campo: contrasena';
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

  if(isset($_POST['direccionCentroMedico'])){
    $direccionCentroMedico= $_POST['direccionCentroMedico'];
  }else{
    $direccionCentroMedico=null;
    $res['mensaje']='Se necesita campo: direccionCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $usuario=new Usuario();
  $usuario->setIdPais($idPais);
  $usuario->setNoIdentidad($noIdentidad);
  $usuario->setNombreCentroMedico($nombreCentroMedico);
  $usuario->setPNombre($pNombre);
  $usuario->setSNombre($sNombre);
  $usuario->setSApellido($sApellido);
  $usuario->setIdTipoUsuario($idTipoUsuario);
  $usuario->setDireccion($direccion);
  $usuario->setCorreo($correo);
  $usuario->setIdTipoCentroMedico($idTipoCentroMedico);
  $usuario->setPApellido($pApellido);
  $usuario->setContrasena($contrasena);
  $usuario->setSexo($sexo);
  $usuario->setDireccionCentroMedico($direccionCentroMedico);
  echo $usuario->registrar($conexion);
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