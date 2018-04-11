<?php
class HojaTrabajoSocial{
	private $idTS;
	private $descripcion;
	private $idExpediente;
	private $idCentroMedico;

	public function __construct(
		$idTS = null,
		$descripcion = null,
		$idExpediente = null
	){
		$this->idTS = $idTS;
		$this->descripcion = $descripcion;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "HojaTrabajoSocial{"
		."idTS: ".$this->idTS." , "
		."descripcion: ".$this->descripcion." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdTS(){
		return $this->idTS;
	}

	public function setIdTS($idTS){
		$this->idTS = $idTS;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function crear(/*Parametros*/){
	}
	public function listarTodos(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function listarPorPaciente(){
	}
}
?>