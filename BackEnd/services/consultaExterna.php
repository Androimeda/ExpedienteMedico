<?php
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/ConsultaExterna.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

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

  if(isset($_POST['diagnostico'])){
    $diagnostico= $_POST['diagnostico'];
  }else{
    $diagnostico=null;
    $res['mensaje']='Se necesita campo: diagnostico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['sintomas'])){
    $sintomas= $_POST['sintomas'];
  }else{
    $sintomas=null;
    $res['mensaje']='Se necesita campo: sintomas';
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

  if(isset($_POST['observacion'])){
    $observacion= $_POST['observacion'];
  }else{
    $observacion=null;
    $res['mensaje']='Se necesita campo: observacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdMedico($idMedico);
  $consultaexterna->setIdConsultorio($idConsultorio);
  $consultaexterna->setDiagnostico($diagnostico);
  $consultaexterna->setSintomas($sintomas);
  $consultaexterna->setIdExpediente($idExpediente);
  $consultaexterna->setObservacion($observacion);
  $consultaexterna->setFechaHora($fechaHora);
  echo $consultaexterna->crear($conexion);
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
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdExpediente($idExpediente);
  echo $consultaexterna->listarPorPaciente($conexion);
break;

case 'listarPorHoy':
  $consultaexterna=new ConsultaExterna();
  echo $consultaexterna->listarPorHoy($conexion);
break;

case 'listarPorConsultorio':

  if(isset($_POST['idConsultorio']) && $_POST['idConsultorio']!=''){
    $idConsultorio= $_POST['idConsultorio'];
  }else{
    $idConsultorio='null';
    $res['mensaje']='Se necesita campo: idConsultorio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdConsultorio($idConsultorio);
  echo $consultaexterna->listarPorConsultorio($conexion);
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
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdMedico($idMedico);
  echo $consultaexterna->listarPorMedico($conexion);
break;

case 'actualizar':

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

  if(isset($_POST['diagnostico'])){
    $diagnostico= $_POST['diagnostico'];
  }else{
    $diagnostico=null;
    $res['mensaje']='Se necesita campo: diagnostico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idConsulta']) && $_POST['idConsulta']!=''){
    $idConsulta= $_POST['idConsulta'];
  }else{
    $idConsulta='null';
    $res['mensaje']='Se necesita campo: idConsulta';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['sintomas'])){
    $sintomas= $_POST['sintomas'];
  }else{
    $sintomas=null;
    $res['mensaje']='Se necesita campo: sintomas';
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

  if(isset($_POST['observ'])){
    $observ= $_POST['observ'];
  }else{
    $observ=null;
    $res['mensaje']='Se necesita campo: observ';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdMedico($idMedico);
  $consultaexterna->setIdConsultorio($idConsultorio);
  $consultaexterna->setDiagnostico($diagnostico);
  $consultaexterna->setIdConsulta($idConsulta);
  $consultaexterna->setSintomas($sintomas);
  $consultaexterna->setIdExpediente($idExpediente);
  $consultaexterna->setObserv($observ);
  $consultaexterna->setFechaHora($fechaHora);
  echo $consultaexterna->actualizar($conexion);
break;

case 'listarPorCentroMedico':

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
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdCentroMedico($idCentroMedico);
  $consultaexterna->setNombreCentro($nombreCentro);
  echo $consultaexterna->listarPorCentroMedico($conexion);
break;

case 'listarPorCentroMedicoFecha':

  if(isset($_POST['idCentroMedico']) && $_POST['idCentroMedico']!=''){
    $idCentroMedico= $_POST['idCentroMedico'];
  }else{
    $idCentroMedico='null';
    $res['mensaje']='Se necesita campo: idCentroMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $consultaexterna=new ConsultaExterna();
  $consultaexterna->setIdCentroMedico($idCentroMedico);
  $consultaexterna->setFechaHora($fechaHora);
  echo $consultaexterna->listarPorCentroMedicoFecha($conexion);
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