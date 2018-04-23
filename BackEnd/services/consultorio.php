<?php
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Consultorio.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['idPiso']) && $_POST['idPiso']!=''){
    $idPiso= $_POST['idPiso'];
  }else{
    $idPiso='null';
    $res['mensaje']='Se necesita campo: idPiso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultorio=new Consultorio();
  $consultorio->setIdPiso($idPiso);
  echo $consultorio->crear($conexion);
break;

case 'listarPorPiso':

  if(isset($_POST['idPiso']) && $_POST['idPiso']!=''){
    $idPiso= $_POST['idPiso'];
  }else{
    $idPiso='null';
    $res['mensaje']='Se necesita campo: idPiso';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultorio=new Consultorio();
  $consultorio->setIdPiso($idPiso);
  echo $consultorio->listarPorPiso($conexion);
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
  $consultorio=new Consultorio();
  $consultorio->setIdCentroMedico($idCentroMedico);
  $consultorio->setNombreCentro($nombreCentro);
  echo $consultorio->listarPorCentro($conexion);
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
  $consultorio=new Consultorio();
  $consultorio->setIdMedico($idMedico);
  echo $consultorio->listarPorMedico($conexion);
break;

case 'vincularMedico':

  if(isset($_POST['idTurno']) && $_POST['idTurno']!=''){
    $idTurno= $_POST['idTurno'];
  }else{
    $idTurno='null';
    $res['mensaje']='Se necesita campo: idTurno';
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

  if(isset($_POST['idConsultorio']) && $_POST['idConsultorio']!=''){
    $idConsultorio= $_POST['idConsultorio'];
  }else{
    $idConsultorio='null';
    $res['mensaje']='Se necesita campo: idConsultorio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultorio=new Consultorio();
  $consultorio->setIdTurno($idTurno);
  $consultorio->setIdMedico($idMedico);
  $consultorio->setIdConsultorio($idConsultorio);
  echo $consultorio->vincularMedico($conexion);
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