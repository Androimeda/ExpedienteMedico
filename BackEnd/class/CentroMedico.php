<?php
class CentroMedico{
	private $idCentroMedico;
	private $nombre;
	private $direccion;
	private $idTipoCentro;

	public function __construct(
		$idCentroMedico = null,
		$nombre = null,
		$direccion = null,
		$idTipoCentro = null
	){
		$this->idCentroMedico = $idCentroMedico;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->idTipoCentro = $idTipoCentro;
	}

	public function __toString(){
		$var = "CentroMedico{"
		."idCentroMedico: ".$this->idCentroMedico." , "
		."nombre: ".$this->nombre." , "
		."direccion: ".$this->direccion." , "
		."idTipoCentro: ".$this->idTipoCentro;
		return $var."}";
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function getIdTipoCentro(){
		return $this->idTipoCentro;
	}

	public function setIdTipoCentro($idTipoCentro){
		$this->idTipoCentro = $idTipoCentro;
	}

	public function crear(/*Parametros*/){
	}
	public function listarTodos(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}

}
?>