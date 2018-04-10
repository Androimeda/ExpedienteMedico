<?php
class Edificio{
	private $idEdificio;
	private $nombre;
	private $idCentroMedico;

	public function __construct(
		$idEdificio = null,
		$nombre = null,
		$idCentroMedico = null
	){
		$this->idEdificio = $idEdificio;
		$this->nombre = $nombre;
		$this->idCentroMedico = $idCentroMedico;
	}

	public function __toString(){
		$var = "Edificio{"
		."idEdificio: ".$this->idEdificio." , "
		."nombre: ".$this->nombre." , "
		."idCentroMedico: ".$this->idCentroMedico;
		return $var."}";
	}

	public function getIdEdificio(){
		return $this->idEdificio;
	}

	public function setIdEdificio($idEdificio){
		$this->idEdificio = $idEdificio;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function crear(/*Parametros*/){
	}
	public function listarPorCentro(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function listarPiso(/*Parametros*/){
	}
	public function agregarPiso(/*Parametros*/){
	}
	public function eliminarPiso(/*Parametros*/){
	}

}
?>