<?php
class Cirugia{
	private $idCirugia;
	private $idIngreso;
	private $idTipoCirugia;
	private $idMedico;
	private $fechaHora;
	private $descripcion;
	private $idCentroMedico;
	private $idExpediente;


	public function __construct(
		$idCirugia = null,
		$idIngreso = null,
		$idTipoCirugia = null,
		$idMedico = null,
		$fechaHora = null
	){
		$this->idCirugia = $idCirugia;
		$this->idIngreso = $idIngreso;
		$this->idTipoCirugia = $idTipoCirugia;
		$this->idMedico = $idMedico;
		$this->fechaHora = $fechaHora;
	}

	public function __toString(){
		$var = "Cirugia{"
		."idCirugia: ".$this->idCirugia." , "
		."idIngreso: ".$this->idIngreso." , "
		."idTipoCirugia: ".$this->idTipoCirugia." , "
		."idMedico: ".$this->idMedico." , "
		."fechaHora: ".$this->fechaHora;
		return $var."}";
	}

	public function getIdCirugia(){
		return $this->idCirugia;
	}

	public function setIdCirugia($idCirugia){
		$this->idCirugia = $idCirugia;
	}
	public function getIdIngreso(){
		return $this->idIngreso;
	}

	public function setIdIngreso($idIngreso){
		$this->idIngreso = $idIngreso;
	}
	public function getIdTipoCirugia(){
		return $this->idTipoCirugia;
	}

	public function setIdTipoCirugia($idTipoCirugia){
		$this->idTipoCirugia = $idTipoCirugia;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}
	public function getFechaHora(){
		return $this->fechaHora;
	}

	public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

	public function listarTipoCirugia($conexion){
		$query=sprintf("
		   SELECT
		   	*
		   FROM TIPOCIRUGIA
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function agregarTipoCirugia($conexion){
		$query=sprintf("
			INSERT INTO TIPOCIRUGIA
			(descripcion) VALUES('%s')
		",$this->descripcion
		);
		$resultado = $conexion->query($query);
		$res = $conexion->run($resultado);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Agregada exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo agregar tipo';
		}
		return json_encode($respuesta);
	}
	
	public function actualizarTipoCirugia($conexion){
		$query=sprintf("
			UPDATE TIPOCIRUGIA SET
				descripcion = '%s'
			WHERE id_tipo_cirugia = %s
		",$this->descripcion
		 ,$this->idPiso
		);
		$resultado = $conexion->query($query);
		$res = $conexion->run($resultado);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Agregada exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo agregar tipo';
		}
		return json_encode($respuesta);
	}
	
	public function agregarCirugia($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarCirugia(
		      %s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idIngreso
		  ,$this->idTipoCirugia
		  ,$this->idMedico
		  ,$this->fechaHora
		);
		$resultado=$conexion->query($query);
		oci_bind_by_name($resultado, ':msg', $msg, 2000);
		oci_bind_by_name($resultado, ':res', $res);
		oci_execute($resultado);
		oci_free_statement($resultado);
		$respuesta=[];
		$respuesta['mensaje'] = $msg;
		$respuesta['resultado'] = $res == 1;
		return json_encode($respuesta);
	}
	// public function actualizarCirugia($conexion){
	// }
	public function listarPorPaciente($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM VistaCirugia V 
		   WHERE  V.ID_EXPEDIENTE=%s 
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorMedico($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM Vistacirugia V 
		   WHERE  V.ID_MEDICO =%s 
		"
		  ,$this->idMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorHoy($conexion){
		$query=sprintf("
		   SELECT * 
		   FROM Vistacirugia V 
		   WHERE 
		   	EXTRACT(DAY FROM V.FECHA_HORA) = EXTRACT(DAY FROM SYSDATE)
		   	AND EXTRACT(MONTH FROM V.FECHA_HORA) = EXTRACT(MONTH FROM SYSDATE)
		   	AND EXTRACT(YEAR FROM V.FECHA_HORA) = EXTRACT(YEAR FROM SYSDATE)
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorCentroMedico($conexion){
		$query=sprintf("
		   SELECT* 
		   FROM Vistacirugia V 
		   WHERE V.ID_CENTRO_MEDICO=%s
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorCentroFecha($conexion){
		$query=sprintf("
		   SELECT* 
		   FROM Vistacirugia V 
		   WHERE V.ID_CENTRO_MEDICO=%s AND V.FECHA_HORA= %s
		"
		  ,$this->idCentroMedico
		  ,$this->fechaHora
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorMedicoFecha($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM Vistacirugia V 
		   WHERE  V.ID_MEDICO =%s AND V.FECHA_HORA= %s 
		"
		  ,$this->idMedico
		  ,$this->fechaHora
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>