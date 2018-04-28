<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Persona.php');
include_once('../class/Usuario.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
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
  $usuario=new Usuario();
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