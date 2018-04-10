<?php
class Ambulancia{
	private $idAmbulancia;
	private $placa;
	private $idCentroMedico;

	public function __construct(
		$idAmbulancia = null,
		$placa = null,
		$idCentroMedico = null
	){
		$this->idAmbulancia = $idAmbulancia;
		$this->placa = $placa;
		$this->idCentroMedico = $idCentroMedico;
	}

	public function __toString(){
		$var = "Ambulancia{"
		."idAmbulancia: ".$this->idAmbulancia." , "
		."placa: ".$this->placa." , "
		."idCentroMedico: ".$this->idCentroMedico;
		return $var."}";
	}

	public function getIdAmbulancia(){
		return $this->idAmbulancia;
	}

	public function setIdAmbulancia($idAmbulancia){
		$this->idAmbulancia = $idAmbulancia;
	}
	public function getPlaca(){
		return $this->placa;
	}

	public function setPlaca($placa){
		$this->placa = $placa;
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
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function listarPorCentroMedico(/*Parametros*/){
	}
	public function buscarPorParamedico(/*Parametros*/){
	}

}
?>