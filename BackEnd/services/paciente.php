<?php
include_once('../class/Conexion.php');
include_once('../class/Paciente.php');
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

  if(isset($_POST['noIdentidad']) && $_POST['noIdentidad']!=''){
    $noIdentidad= $_POST['noIdentidad'];
  }else{
    $noIdentidad='null';
    $res['mensaje']='Se necesita campo: noIdentidad';
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

  if(isset($_POST['sexo'])){
    $sexo= $_POST['sexo'];
  }else{
    $sexo=null;
    $res['mensaje']='Se necesita campo: sexo';
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

  if(isset($_POST['idTipoSangre']) && $_POST['idTipoSangre']!=''){
    $idTipoSangre= $_POST['idTipoSangre'];
  }else{
    $idTipoSangre='null';
    $res['mensaje']='Se necesita campo: idTipoSangre';
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

  if(isset($_POST['idOcupacion']) && $_POST['idOcupacion']!=''){
    $idOcupacion= $_POST['idOcupacion'];
  }else{
    $idOcupacion='null';
    $res['mensaje']='Se necesita campo: idOcupacion';
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

  if(isset($_POST['idAscendencia']) && $_POST['idAscendencia']!=''){
    $idAscendencia= $_POST['idAscendencia'];
  }else{
    $idAscendencia='null';
    $res['mensaje']='Se necesita campo: idAscendencia';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }
  $paciente=new Paciente();
  $paciente->setPNombre($pNombre);
  $paciente->setSNombre($sNombre);
  $paciente->setPApellido($pApellido);
  $paciente->setSApellido($sApellido);
  $paciente->setDireccion($direccion);
  $paciente->setNoIdentidad($noIdentidad);
  $paciente->setIdPais($idPais);
  $paciente->setSexo($sexo);
  $paciente->setCorreo($correo);
  $paciente->setIdTipoSangre($idTipoSangre);
  $paciente->setIdEscolaridad($idEscolaridad);
  $paciente->setIdOcupacion($idOcupacion);
  $paciente->setIdEstadoCivil($idEstadoCivil);
  $paciente->setIdAscendencia($idAscendencia);
  echo $paciente->crear($conexion);
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
  $paciente=new Paciente();
  $paciente->setPApellido($pApellido);
  $paciente->setSApellido($sApellido);
  echo $paciente->buscarPorApellido($conexion);
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
  $paciente=new Paciente();
  $paciente->setNoIdentidad($noIdentidad);
  $paciente->setIdPersona($idPersona);
  $paciente->setIdPaciente($idPaciente);
  echo $paciente->buscarPorNoIdentidad($conexion);
break;

case 'listarTodos':
  $paciente=new Paciente();
  echo $paciente->listarTodos($conexion);
break;

case 'actualizar':

  if(isset($_POST['idPaciente']) && $_POST['idPaciente']!=''){
    $idPaciente= $_POST['idPaciente'];
  }else{
    $idPaciente='null';
    $res['mensaje']='Se necesita campo: idPaciente';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['pdireccion'])){
    $pdireccion= $_POST['pdireccion'];
  }else{
    $pdireccion=null;
    $res['mensaje']='Se necesita campo: pdireccion';
    $res['resultado']=false;
    echo json_encode($res);
    break;
  }

  if(isset($_POST['pcorreo'])){
    $pcorreo= $_POST['pcorreo'];
  }else{
    $pcorreo=null;
    $res['mensaje']='Se necesita campo: pcorreo';
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

  if(isset($_POST['idOcupacion']) && $_POST['idOcupacion']!=''){
    $idOcupacion= $_POST['idOcupacion'];
  }else{
    $idOcupacion='null';
    $res['mensaje']='Se necesita campo: idOcupacion';
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
  $paciente=new Paciente();
  $paciente->setIdPaciente($idPaciente);
  $paciente->setPdireccion($pdireccion);
  $paciente->setPcorreo($pcorreo);
  $paciente->setIdEscolaridad($idEscolaridad);
  $paciente->setIdOcupacion($idOcupacion);
  $paciente->setIdEstadoCivil($idEstadoCivil);
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

}
$conexion->close();
}else{
  $res['mensaje']='Accion no especificada';
  $res['resultado']=false;
  echo json_encode($res);
}
?>