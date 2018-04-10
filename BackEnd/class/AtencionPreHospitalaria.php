<?php
class AtencionPreHospitalaria{
	private $idAtencion;
	private $observacion;
	private $idParamedico;
	private $idAmbulancia;
	private $idExpediente;

	public function __construct(
		$idAtencion = null,
		$observacion = null,
		$idParamedico = null,
		$idAmbulancia = null,
		$idExpediente = null
	){
		$this->idAtencion = $idAtencion;
		$this->observacion = $observacion;
		$this->idParamedico = $idParamedico;
		$this->idAmbulancia = $idAmbulancia;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "AtencionPreHospitalaria{"
		."idAtencion: ".$this->idAtencion." , "
		."observacion: ".$this->observacion." , "
		."idParamedico: ".$this->idParamedico." , "
		."idAmbulancia: ".$this->idAmbulancia." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdAtencion(){
		return $this->idAtencion;
	}

	public function setIdAtencion($idAtencion){
		$this->idAtencion = $idAtencion;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getIdParamedico(){
		return $this->idParamedico;
	}

	public function setIdParamedico($idParamedico){
		$this->idParamedico = $idParamedico;
	}
	public function getIdAmbulancia(){
		return $this->idAmbulancia;
	}

	public function setIdAmbulancia($idAmbulancia){
		$this->idAmbulancia = $idAmbulancia;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

	public function crear(/*Parametros*/){
	}
	public function listarPorPaciente(/*Parametros*/){
	}
	public function listarPorCentroMedico(/*Parametros*/){
	}
	public function listarPorParamedico(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}

}
?>