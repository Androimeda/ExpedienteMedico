<?php
  include '../class/Conexion.php';
	$response = array();
	if(isset($_POST['accion'])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listarTipoCirugia':
				$response['result'] = '';
			break;
			case 'agregarTipoCirugia':
				$response['result'] = '';
			break;
			case 'actualizarTipoCirugia':
				$response['result'] = '';
			break;
			case 'agregar':
				$response['result'] = '';
			break;
			case 'listarPorPaciente':
				$response['result'] = '';
			break;
			case 'listarPorMedico':
				$response['result'] = '';
			break;
			case 'listarPorHoy':
				$response['result'] = '';
			break;
			case 'listarPorCentroMedico':
				$response['result'] = '';
			break;
			case 'listarPorCentroFecha':
				$response['result'] = '';
			break;
			case 'listarPorMedicoFecha':
				$response['result'] = '';
			break;
			default:
				$response['status']=false;
				$response['code']=404;
				$response['message']='Petición no reconocida [404]';
			break;
		}
		$conexion->close();
		$response['status']=true;
		$response['message']='OK [200]';
		$response['code']=200;
	}else{
		$response['status']=false;
		$response['message']='No se especificó petición [400]';
		$response['code']=400;
	}
?>
