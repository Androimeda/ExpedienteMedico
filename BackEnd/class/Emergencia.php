<?php
class Emergencia{
	private $idIngreso;
	private $observacion;
	private $fechaHoraAtencion;
	private $idExpediente;
	private $idAtencion;
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
		$this->fechaHoraAtencion = $fechaHoraAtencion;
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

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearEmergencia(
		      '%s'
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
		  $this->observacion
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
	}
	public function listarPorPaciente($conexion){
	}
	public function listarPorMedico($conexion){
	}
	public function listarPorHoy($conexion){
	}
	public function listarPorCentroFecha($conexion){
	}
	public function listarPorMedicoFecha($conexion){
	}

}
?>