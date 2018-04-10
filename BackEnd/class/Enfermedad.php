<?php
class Enfermedad{
	private $idEnfermedad;
	private $enfermedad;
	private $idTipoEnfermedad;

	public function __construct(
		$idEnfermedad = null,
		$enfermedad = null,
		$idTipoEnfermedad = null
	){
		$this->idEnfermedad = $idEnfermedad;
		$this->enfermedad = $enfermedad;
		$this->idTipoEnfermedad = $idTipoEnfermedad;
	}

	public function __toString(){
		$var = "Enfermedad{"
		."idEnfermedad: ".$this->idEnfermedad." , "
		."enfermedad: ".$this->enfermedad." , "
		."idTipoEnfermedad: ".$this->idTipoEnfermedad;
		return $var."}";
	}

	public function getIdEnfermedad(){
		return $this->idEnfermedad;
	}

	public function setIdEnfermedad($idEnfermedad){
		$this->idEnfermedad = $idEnfermedad;
	}
	public function getEnfermedad(){
		return $this->enfermedad;
	}

	public function setEnfermedad($enfermedad){
		$this->enfermedad = $enfermedad;
	}
	public function getIdTipoEnfermedad(){
		return $this->idTipoEnfermedad;
	}

	public function setIdTipoEnfermedad($idTipoEnfermedad){
		$this->idTipoEnfermedad = $idTipoEnfermedad;
	}

	public function agregarTipoEnfermedad(/*Parametros*/){
	}
	public function eliminarTipoEnfermedad(/*Parametros*/){
	}
	public function listarTipoEnfermedad(/*Parametros*/){
	}
	public function actualizarTipoEnfermedad(/*Parametros*/){
	}

}
?>