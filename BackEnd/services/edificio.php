<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Edificio.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['nombre'])){
    $nombre= $_POST['nombre'];
  }else{
    $nombre=null;
    $res['mensaje']='Se necesita campo: nombre';
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
  $edificio=new Edificio();
  $edificio->setNombre($nombre);
  $edificio->setIdCentroMedico($idCentroMedico);
  echo $edificio->crear($conexion);
break;

case 'listarPisos':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEdificio']) && $_POST['idEdificio']!=''){
    $idEdificio= $_POST['idEdificio'];
  }else{
    $idEdificio='null';
    $res['mensaje']='Se necesita campo: idEdificio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $edificio=new Edificio();
  $edificio->setIdCentroMedico($idCentroMedico);
  $edificio->setIdEdificio($idEdificio);
  echo $edificio->listarPisos($conexion);
break;

case 'actualizarPiso':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
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
  $edificio=new Edificio();
  $edificio->setDescripcion($descripcion);
  $edificio->setIdPiso($idPiso);
  echo $edificio->actualizarPiso($conexion);
break;

case 'agregarPiso':

  if(isset($_POST['descripcion'])){
    $descripcion= $_POST['descripcion'];
  }else{
    $descripcion=null;
    $res['mensaje']='Se necesita campo: descripcion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEdificio']) && $_POST['idEdificio']!=''){
    $idEdificio= $_POST['idEdificio'];
  }else{
    $idEdificio='null';
    $res['mensaje']='Se necesita campo: idEdificio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $edificio=new Edificio();
  $edificio->setDescripcion($descripcion);
  $edificio->setIdEdificio($idEdificio);
  echo $edificio->agregarPiso($conexion);
break;

case 'listarPiso':

  if(isset($_POST['idPiso']) && $_POST['idPiso']!=''){
    $idPiso= $_POST['idPiso'];
  }else{
    $idPiso='null';
    $res['mensaje']='Se necesita campo: idPiso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $edificio=new Edificio();
  $edificio->setIdPiso($idPiso);
  echo $edificio->listarPiso($conexion);
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

  if(isset($_POST['nombreCentro'])){
    $nombreCentro= $_POST['nombreCentro'];
  }else{
    $nombreCentro=null;
    $res['mensaje']='Se necesita campo: nombreCentro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $edificio=new Edificio();
  $edificio->setIdCentroMedico($idCentroMedico);
  $edificio->setNombreCentro($nombreCentro);
  echo $edificio->listarPorCentro($conexion);
break;

case 'listar':

  if(isset($_POST['idEdificio']) && $_POST['idEdificio']!=''){
    $idEdificio= $_POST['idEdificio'];
  }else{
    $idEdificio='null';
    $res['mensaje']='Se necesita campo: idEdificio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $edificio=new Edificio();
  $edificio->setIdEdificio($idEdificio);
  echo $edificio->listar($conexion);
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