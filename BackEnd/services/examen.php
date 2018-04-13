<?php
  include '../class/Conexion.php';
	$response = array();
	if(isset($_POST['accion'])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'agregarTipoExamen':
				$response['result'] = null;
			break;
			case 'listarTipoExamen':
				$response['result'] = null;
			break;
			case 'actualizarTipoExamen':
				$response['result'] = null;
			break;
			case 'crear':
				$response['result'] = null;
			break;
			case 'listarTodos':
				$response['result'] = null;
			break;
			case 'eliminar':
				$response['result'] = null;
			break;
			case 'actualizar':
				$response['result'] = null;
			break;
			case 'listarPorPaciente':
				$response['result'] = null;
			break;
			case 'listarPorCentro':
				$response['result'] = null;
			break;
			case 'listarPorTipo':
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
