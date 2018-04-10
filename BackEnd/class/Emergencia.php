<?php
class Emergencia{
	private $idIngreso;
	private $observacion;
	private $fechaHoraAtencion;
	private $idExpediente;
	private $idAtencion;
	private $idCentroMedico;

	public function __construct(
		$idIngreso = null,
		$observacion = null,
		$fechaHoraAtencion = null,
		$idExpediente = null,
		$idAtencion = null,
		$idCentroMedico = null
	){
		$this->idIngreso = $idIngreso;
		$this->observacion = $observacion;
		$this->fechaHoraAtencion = $fechaHoraAtencion;
		$this->idExpediente = $idExpediente;
		$this->idAtencion = $idAtencion;
		$this->idCentroMedico = $idCentroMedico;
	}

	public function __toString(){
		$var = "Emergencia{"
		."idIngreso: ".$this->idIngreso." , "
		."observacion: ".$this->observacion." , "
		."fechaHoraAtencion: ".$this->fechaHoraAtencion." , "
		."idExpediente: ".$this->idExpediente." , "
		."idAtencion: ".$this->idAtencion." , "
		."idCentroMedico: ".$this->idCentroMedico;
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

	public function crear(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function listarPorCentroMedico(/*Parametros*/){
	}
	public function listarPorPaciente(/*Parametros*/){
	}

}
?>