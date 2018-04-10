<?php
class Examen{
	private $idExamen;
	private $urlDocumento;
	private $idTipo;
	private $idCentroMedico;
	private $observacion;
	private $idExpediente;
	private $fecha;

	public function __construct(
		$idExamen = null,
		$urlDocumento = null,
		$idTipo = null,
		$idCentroMedico = null,
		$observacion = null,
		$idExpediente = null,
		$fecha = null
	){
		$this->idExamen = $idExamen;
		$this->urlDocumento = $urlDocumento;
		$this->idTipo = $idTipo;
		$this->idCentroMedico = $idCentroMedico;
		$this->observacion = $observacion;
		$this->idExpediente = $idExpediente;
		$this->fecha = $fecha;
	}

	public function __toString(){
		$var = "Examen{"
		."idExamen: ".$this->idExamen." , "
		."urlDocumento: ".$this->urlDocumento." , "
		."idTipo: ".$this->idTipo." , "
		."idCentroMedico: ".$this->idCentroMedico." , "
		."observacion: ".$this->observacion." , "
		."idExpediente: ".$this->idExpediente." , "
		."fecha: ".$this->fecha;
		return $var."}";
	}

	public function getIdExamen(){
		return $this->idExamen;
	}

	public function setIdExamen($idExamen){
		$this->idExamen = $idExamen;
	}
	public function getUrlDocumento(){
		return $this->urlDocumento;
	}

	public function setUrlDocumento($urlDocumento){
		$this->urlDocumento = $urlDocumento;
	}
	public function getIdTipo(){
		return $this->idTipo;
	}

	public function setIdTipo($idTipo){
		$this->idTipo = $idTipo;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}
	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function addTipoExamen(/*Parametros*/){
	}
	public function listarTipoExamen(/*Parametros*/){
	}
	public function eliminarTipoExamen(/*Parametros*/){
	}
	public function actualizarTipoExamen(/*Parametros*/){
	}

}
?>