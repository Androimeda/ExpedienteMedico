<?php
header("Access-Control-Allow-Origin: *");
include_once('./utils/date.php');
include_once('../class/Conexion.php');
include_once('../class/Persona.php');
include_once('../class/Paciente.php');
if(isset($_POST['accion'])){
$conexion = new Conexion();
switch ($_POST['accion']) {
case 'crear':

  if(isset($_POST['idTipoSangre']) && $_POST['idTipoSangre']!=''){
    $idTipoSangre= $_POST['idTipoSangre'];
  }else{
    $idTipoSangre='null';
    $res['mensaje']='Se necesita campo: idTipoSangre';
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

  if(isset($_POST['pNombre'])){
    $pNombre= $_POST['pNombre'];
  }else{
    $pNombre=null;
    $res['mensaje']='Se necesita campo: pNombre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idAscendencia']) && $_POST['idAscendencia']!=''){
    $idAscendencia= $_POST['idAscendencia'];
  }else{
    $idAscendencia='null';
    $res['mensaje']='Se necesita campo: idAscendencia';
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

  if(isset($_POST['idEstadoCivil']) && $_POST['idEstadoCivil']!=''){
    $idEstadoCivil= $_POST['idEstadoCivil'];
  }else{
    $idEstadoCivil='null';
    $res['mensaje']='Se necesita campo: idEstadoCivil';
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

  if(isset($_POST['idOcupacion']) && $_POST['idOcupacion']!=''){
    $idOcupacion= $_POST['idOcupacion'];
  }else{
    $idOcupacion='null';
    $res['mensaje']='Se necesita campo: idOcupacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEscolaridad']) && $_POST['idEscolaridad']!=''){
    $idEscolaridad= $_POST['idEscolaridad'];
  }else{
    $idEscolaridad='null';
    $res['mensaje']='Se necesita campo: idEscolaridad';
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
  $paciente=new Paciente();
  $paciente->setIdTipoSangre($idTipoSangre);
  $paciente->setIdPais($idPais);
  $paciente->setNoIdentidad($noIdentidad);
  $paciente->setPNombre($pNombre);
  $paciente->setIdAscendencia($idAscendencia);
  $paciente->setSNombre($sNombre);
  $paciente->setSApellido($sApellido);
  $paciente->setIdEstadoCivil($idEstadoCivil);
  $paciente->setDireccion($direccion);
  $paciente->setCorreo($correo);
  $paciente->setIdOcupacion($idOcupacion);
  $paciente->setIdEscolaridad($idEscolaridad);
  $paciente->setPApellido($pApellido);
  $paciente->setSexo($sexo);
  echo $paciente->crear($conexion);
break;

case 'agregarNatalidad':

  if(isset($_POST['idMadre']) && $_POST['idMadre']!=''){
    $idMadre= $_POST['idMadre'];
  }else{
    $idMadre='null';
    $res['mensaje']='Se necesita campo: idMadre';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['ordenPartoMultiple'])){
    $ordenPartoMultiple= $_POST['ordenPartoMultiple'];
  }else{
    $ordenPartoMultiple=null;
    $res['mensaje']='Se necesita campo: ordenPartoMultiple';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPadre']) && $_POST['idPadre']!=''){
    $idPadre= $_POST['idPadre'];
  }else{
    $idPadre='null';
    $res['mensaje']='Se necesita campo: idPadre';
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
  $paciente=new Paciente();
  $paciente->setIdMadre($idMadre);
  $paciente->setOrdenPartoMultiple($ordenPartoMultiple);
  $paciente->setIdPadre($idPadre);
  $paciente->setIdExpediente($idExpediente);
  $paciente->setIdCentroMedico($idCentroMedico);
  $paciente->setFechaHora($fechaHora);
  echo $paciente->agregarNatalidad($conexion);
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
  $paciente=new Paciente();
  $paciente->setSApellido($sApellido);
  $paciente->setPApellido($pApellido);
  echo $paciente->buscarPorApellido($conexion);
break;

case 'agregarDefuncion':

  if(isset($_POST['observacionCausa'])){
    $observacionCausa= $_POST['observacionCausa'];
  }else{
    $observacionCausa=null;
    $res['mensaje']='Se necesita campo: observacionCausa';
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

  if(isset($_POST['fechaHora'])){
    $fechaHora= $_POST['fechaHora'];
  }else{
    $fechaHora=null;
    $res['mensaje']='Se necesita campo: fechaHora';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paciente=new Paciente();
  $paciente->setObservacionCausa($observacionCausa);
  $paciente->setIdExpediente($idExpediente);
  $paciente->setFechaHora($fechaHora);
  echo $paciente->agregarDefuncion($conexion);
break;

case 'buscarPorNoIdentidad':

  if(isset($_POST['idPersona']) && $_POST['idPersona']!=''){
    $idPersona= $_POST['idPersona'];
  }else{
    $idPersona='null';
    $res['mensaje']='Se necesita campo: idPersona';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
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
  $paciente=new Paciente();
  $paciente->setIdPersona($idPersona);
  $paciente->setIdPaciente($idPaciente);
  $paciente->setNoIdentidad($noIdentidad);
  echo $paciente->buscarPorNoIdentidad($conexion);
break;

case 'listarTodos':
  $paciente=new Paciente();
  echo $paciente->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['direccion'])){
    $direccion= $_POST['direccion'];
  }else{
    $direccion=null;
    $res['mensaje']='Se necesita campo: direccion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idOcupacion']) && $_POST['idOcupacion']!=''){
    $idOcupacion= $_POST['idOcupacion'];
  }else{
    $idOcupacion='null';
    $res['mensaje']='Se necesita campo: idOcupacion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['idEstadoCivil']) && $_POST['idEstadoCivil']!=''){
    $idEstadoCivil= $_POST['idEstadoCivil'];
  }else{
    $idEstadoCivil='null';
    $res['mensaje']='Se necesita campo: idEstadoCivil';
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

  if(isset($_POST['idEscolaridad']) && $_POST['idEscolaridad']!=''){
    $idEscolaridad= $_POST['idEscolaridad'];
  }else{
    $idEscolaridad='null';
    $res['mensaje']='Se necesita campo: idEscolaridad';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paciente=new Paciente();
  $paciente->setDireccion($direccion);
  $paciente->setIdOcupacion($idOcupacion);
  $paciente->setIdPaciente($idPaciente);
  $paciente->setIdEstadoCivil($idEstadoCivil);
  $paciente->setCorreo($correo);
  $paciente->setIdEscolaridad($idEscolaridad);
  echo $paciente->actualizar($conexion);
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
  $paciente=new Paciente();
  $paciente->setPNombre($pNombre);
  $paciente->setSNombre($sNombre);
  echo $paciente->buscarPorNombre($conexion);
break;

case 'listar':

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paciente=new Paciente();
  $paciente->setIdPaciente($idPaciente);
  echo $paciente->listar($conexion);
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