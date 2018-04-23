<?php
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Tratamiento.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['dosis'])){
    $dosis= $_POST['dosis'];
  }else{
    $dosis=null;
    $res['mensaje']='Se necesita campo: dosis';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoTratamiento']) && $_POST['idTipoTratamiento']!=''){
    $idTipoTratamiento= $_POST['idTipoTratamiento'];
  }else{
    $idTipoTratamiento='null';
    $res['mensaje']='Se necesita campo: idTipoTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['intervaloTiempo'])){
    $intervaloTiempo= $_POST['intervaloTiempo'];
  }else{
    $intervaloTiempo=null;
    $res['mensaje']='Se necesita campo: intervaloTiempo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaInicio'])){
    $fechaInicio= $_POST['fechaInicio'];
  }else{
    $fechaInicio=null;
    $res['mensaje']='Se necesita campo: fechaInicio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idViaSuministro']) && $_POST['idViaSuministro']!=''){
    $idViaSuministro= $_POST['idViaSuministro'];
  }else{
    $idViaSuministro='null';
    $res['mensaje']='Se necesita campo: idViaSuministro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['duracionTratamiento'])){
    $duracionTratamiento= $_POST['duracionTratamiento'];
  }else{
    $duracionTratamiento=null;
    $res['mensaje']='Se necesita campo: duracionTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setDosis($dosis);
  $tratamiento->setIdTipoTratamiento($idTipoTratamiento);
  $tratamiento->setIntervaloTiempo($intervaloTiempo);
  $tratamiento->setFechaInicio($fechaInicio);
  $tratamiento->setIdViaSuministro($idViaSuministro);
  $tratamiento->setDuracionTratamiento($duracionTratamiento);
  echo $tratamiento->crear($conexion);
break;

case 'agregarTipoTratamiento':

  if(isset($_POST['tipoTratamiento'])){
    $tipoTratamiento= $_POST['tipoTratamiento'];
  }else{
    $tipoTratamiento=null;
    $res['mensaje']='Se necesita campo: tipoTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setTipoTratamiento($tipoTratamiento);
  echo $tratamiento->agregarTipoTratamiento($conexion);
break;

case 'listarPorPaciente':

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setIdPaciente($idPaciente);
  echo $tratamiento->listarPorPaciente($conexion);
break;

case 'listarTipoTratamiento':
  $tratamiento=new Tratamiento();
  echo $tratamiento->listarTipoTratamiento($conexion);
break;

case 'actualizarReceta':

  if(isset($_POST['idTratamiento']) && $_POST['idTratamiento']!=''){
    $idTratamiento= $_POST['idTratamiento'];
  }else{
    $idTratamiento='null';
    $res['mensaje']='Se necesita campo: idTratamiento';
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

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setIdTratamiento($idTratamiento);
  $tratamiento->setIdConsulta($idConsulta);
  $tratamiento->setIdMedico($idMedico);
  echo $tratamiento->actualizarReceta($conexion);
break;

case 'agregarViaSuministro':

  if(isset($_POST['viaSuministro'])){
    $viaSuministro= $_POST['viaSuministro'];
  }else{
    $viaSuministro=null;
    $res['mensaje']='Se necesita campo: viaSuministro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setViaSuministro($viaSuministro);
  echo $tratamiento->agregarViaSuministro($conexion);
break;

case 'listarViaSuministro':
  $tratamiento=new Tratamiento();
  echo $tratamiento->listarViaSuministro($conexion);
break;

case 'recetar':

  if(isset($_POST['idTratamiento']) && $_POST['idTratamiento']!=''){
    $idTratamiento= $_POST['idTratamiento'];
  }else{
    $idTratamiento='null';
    $res['mensaje']='Se necesita campo: idTratamiento';
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

  if(isset($_POST['idMedico']) && $_POST['idMedico']!=''){
    $idMedico= $_POST['idMedico'];
  }else{
    $idMedico='null';
    $res['mensaje']='Se necesita campo: idMedico';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setIdTratamiento($idTratamiento);
  $tratamiento->setIdConsulta($idConsulta);
  $tratamiento->setIdMedico($idMedico);
  echo $tratamiento->recetar($conexion);
break;

case 'actualizarViaSuministro':

  if(isset($_POST['viaSuministro'])){
    $viaSuministro= $_POST['viaSuministro'];
  }else{
    $viaSuministro=null;
    $res['mensaje']='Se necesita campo: viaSuministro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idViaSuministro']) && $_POST['idViaSuministro']!=''){
    $idViaSuministro= $_POST['idViaSuministro'];
  }else{
    $idViaSuministro='null';
    $res['mensaje']='Se necesita campo: idViaSuministro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setViaSuministro($viaSuministro);
  $tratamiento->setIdViaSuministro($idViaSuministro);
  echo $tratamiento->actualizarViaSuministro($conexion);
break;

case 'actualizarTipoTratamiento':

  if(isset($_POST['idTipoTratamiento']) && $_POST['idTipoTratamiento']!=''){
    $idTipoTratamiento= $_POST['idTipoTratamiento'];
  }else{
    $idTipoTratamiento='null';
    $res['mensaje']='Se necesita campo: idTipoTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['tipoTratamiento'])){
    $tipoTratamiento= $_POST['tipoTratamiento'];
  }else{
    $tipoTratamiento=null;
    $res['mensaje']='Se necesita campo: tipoTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setIdTipoTratamiento($idTipoTratamiento);
  $tratamiento->setTipoTratamiento($tipoTratamiento);
  echo $tratamiento->actualizarTipoTratamiento($conexion);
break;

case 'actualizar':

  if(isset($_POST['dosis'])){
    $dosis= $_POST['dosis'];
  }else{
    $dosis=null;
    $res['mensaje']='Se necesita campo: dosis';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTipoTratamiento']) && $_POST['idTipoTratamiento']!=''){
    $idTipoTratamiento= $_POST['idTipoTratamiento'];
  }else{
    $idTipoTratamiento='null';
    $res['mensaje']='Se necesita campo: idTipoTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['intervaloTiempo'])){
    $intervaloTiempo= $_POST['intervaloTiempo'];
  }else{
    $intervaloTiempo=null;
    $res['mensaje']='Se necesita campo: intervaloTiempo';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['fechaInicio'])){
    $fechaInicio= $_POST['fechaInicio'];
  }else{
    $fechaInicio=null;
    $res['mensaje']='Se necesita campo: fechaInicio';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idViaSuministro']) && $_POST['idViaSuministro']!=''){
    $idViaSuministro= $_POST['idViaSuministro'];
  }else{
    $idViaSuministro='null';
    $res['mensaje']='Se necesita campo: idViaSuministro';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idTratamiento']) && $_POST['idTratamiento']!=''){
    $idTratamiento= $_POST['idTratamiento'];
  }else{
    $idTratamiento='null';
    $res['mensaje']='Se necesita campo: idTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['duracionTratamiento'])){
    $duracionTratamiento= $_POST['duracionTratamiento'];
  }else{
    $duracionTratamiento=null;
    $res['mensaje']='Se necesita campo: duracionTratamiento';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $tratamiento=new Tratamiento();
  $tratamiento->setDosis($dosis);
  $tratamiento->setIdTipoTratamiento($idTipoTratamiento);
  $tratamiento->setIntervaloTiempo($intervaloTiempo);
  $tratamiento->setFechaInicio($fechaInicio);
  $tratamiento->setIdViaSuministro($idViaSuministro);
  $tratamiento->setIdTratamiento($idTratamiento);
  $tratamiento->setDuracionTratamiento($duracionTratamiento);
  echo $tratamiento->actualizar($conexion);
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