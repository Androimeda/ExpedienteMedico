<?php
  include '../class/Conexion.php';
	$response = array();
	if(isset($_POST['accion'])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'agregarTipoTratamiento':
				$response['result'] = null;
			break;
			case 'actualizarTipoTratamiento':
				$response['result'] = null;
			break;
			case 'listarTipoTratamiento':
				$response['result'] = null;
			break;
			case 'listarViaSuministro':
				$response['result'] = null;
			break;
			case 'agregarViaSuministro':
				$response['result'] = null;
			break;
			case 'actualizarViaSuministro':
				$response['result'] = null;
			break;
			case 'crear':
				$response['result'] = null;
			break;
			case 'listarTodos':
				$response['result'] = null;
			break;
			case 'actualizar':
				$response['result'] = null;
			break;
			case 'listarPorPaciente':
				$response['result'] = null;
			break;
			case 'recetar':
				$response['result'] = null;
			break;
			case 'borrarReceta':
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
