<?php
  include '../class/Conexion.php';
	$response = array();
	if(isset($_POST['accion'])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listarPorPersona':
				$response['result'] = null;
			break;
			case 'listarPorCentroMedico':
				$response['result'] = null;
			break;
			case 'agregarPersona':
				$response['result'] = null;
			break;
			case 'agregarCentro':
				$response['result'] = null;
			break;
			case 'buscarPorPersona':
				$response['result'] = null;
			break;
			case 'buscarPorCentro':
				$response['result'] = null;
			break;
			case 'eliminarDePersona':
				$response['result'] = null;
			break;
			case 'eliminarDeCentro':
				$response['result'] = null;
			break;
			case 'agregarTipoTelefono':
				$response['result'] = null;
			break;
			case 'listarTipoTelefono':
				$response['result'] = null;
			break;
			case 'actualizarTipoTelefono':
				$response['result'] = null;
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
