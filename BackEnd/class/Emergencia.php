<?php
class Emergencia{
	private $idIngreso;
	private $observacion;
	private $fechaHoraAtencion;
	private $idExpediente;
	private $idAtencion;
	private $nombreCentro;
	private $idCentroMedico;
	private $idMedico;

	public function __construct(
		$idIngreso = null,
		$observacion = null,
		$fechaHoraAtencion = null,
		$idExpediente = null,
		$idAtencion = null,
		$idCentroMedico = null,
		$idMedico = null
	){
		$this->idIngreso = $idIngreso;
		$this->observacion = $observacion;
		$this->fechaHoraAtencion = $fechaHoraAtencion;
		$this->idExpediente = $idExpediente;
		$this->idAtencion = $idAtencion;
		$this->idCentroMedico = $idCentroMedico;
		$this->idMedico = $idMedico;
	}

	public function __toString(){
		$var = "Emergencia{"
		."idIngreso: ".$this->idIngreso." , "
		."observacion: ".$this->observacion." , "
		."fechaHoraAtencion: ".$this->fechaHoraAtencion." , "
		."idExpediente: ".$this->idExpediente." , "
		."idAtencion: ".$this->idAtencion." , "
		."idCentroMedico: ".$this->idCentroMedico." , "
		."idMedico: ".$this->idMedico;
		return $var."}";
	}

	public function getIdIngreso(){
		return $this->idIngreso;
	}

	public function setIdIngreso($idIngreso){
		$this->idIngreso = $idIngreso;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getFechaHoraAtencion(){
		return $this->fechaHoraAtencion;
	}

	public function setFechaHoraAtencion($fechaHoraAtencion){
		$this->fechaHoraAtencion = to_timestamp($fechaHoraAtencion);
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}
	public function getIdAtencion(){
		return $this->idAtencion;
	}

	public function setIdAtencion($idAtencion){
		$this->idAtencion = $idAtencion;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}

	public function getNombreCentro(){
		return $this->nombreCentro;
	}

	public function setNombreCentro($nombreCentro){
		$this->nombreCentro = $nombreCentro;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearEmergencia(
		      '%s'
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->observacion
		  ,$this->fechaHoraAtencion
		  ,$this->idExpediente
		  ,$this->idCentroMedico
		  ,$this->idMedico
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
	public function eliminar($conexion){
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarEmergencia(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idIngreso
		  ,$this->observacion
		  ,$this->fechaHoraAtencion
		  ,$this->idExpediente
		  ,$this->idAtencion
		  ,$this->idCentroMedico
		  ,$this->idMedico
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
	public function listarPorCentroMedico($conexion){
		$query=sprintf("
		     SELECT* 
		     FROM VistaEmergencia V 
		     WHERE V.ID_CENTRO_MEDICO=%s OR V.centro_medico LIKE '%s'
		"
		  ,$this->idCentroMedico
		  ,$this->nombreCentro
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorPaciente($conexion){
		$query=sprintf("
		     SELECT  * 
		     FROM VistaEmergencia V 
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
		    FROM VistaEmergencia V 
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
		    FROM VistaEmergencia V 
		    WHERE 
		    EXTRACT(DAY FROM V.FECHA_HORA_ATENCION) = EXTRACT(DAY FROM SYSDATE)
		    AND EXTRACT(MONTH FROM V.FECHA_HORA_ATENCION) = EXTRACT(MONTH FROM SYSDATE)
		    AND EXTRACT(YEAR FROM V.FECHA_HORA_ATENCION) = EXTRACT(YEAR FROM SYSDATE)
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorCentroFecha($conexion){
		$query=sprintf("
		     SELECT * 
		     FROM VistaEmergencia V 
		     WHERE v.ID_CENTRO_MEDICO=%s 
		     AND EXTRACT(DAY FROM V.FECHA_HORA_ATENCION) = EXTRACT(DAY FROM %s)
		     AND EXTRACT(MONTH FROM V.FECHA_HORA_ATENCION) = EXTRACT(MONTH FROM %s)
		     AND EXTRACT(YEAR FROM V.FECHA_HORA_ATENCION) = EXTRACT(YEAR FROM %s)
		"
		  ,$this->idCentroMedico
		  ,$this->fechaHoraAtencion
		  ,$this->fechaHoraAtencion
		  ,$this->fechaHoraAtencion
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorMedicoFecha($conexion){
		$query=sprintf("
		     SELECT* 
		     FROM VistaEmergencia V 
		     WHERE v.ID_MEDICO=%s 
		     AND v.FECHA_HORA_ATENCION= %s 
		"
		  ,$this->idMedico
		  ,$this->fechaHoraAtencion
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>