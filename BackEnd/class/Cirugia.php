<?php
class Cirugia{
	private $idCirugia;
	private $idIngreso;
	private $idTipoCirugia;
	private $idMedico;
	private $fechaHora;

	public function __construct(
		$idCirugia = null,
		$idIngreso = null,
		$idTipoCirugia = null,
		$idMedico = null,
		$fechaHora = null
	){
		$this->idCirugia = $idCirugia;
		$this->idIngreso = $idIngreso;
		$this->idTipoCirugia = $idTipoCirugia;
		$this->idMedico = $idMedico;
		$this->fechaHora = $fechaHora;
	}

	public function __toString(){
		$var = "Cirugia{"
		."idCirugia: ".$this->idCirugia." , "
		."idIngreso: ".$this->idIngreso." , "
		."idTipoCirugia: ".$this->idTipoCirugia." , "
		."idMedico: ".$this->idMedico." , "
		."fechaHora: ".$this->fechaHora;
		return $var."}";
	}

	public function getIdCirugia(){
		return $this->idCirugia;
	}

	public function setIdCirugia($idCirugia){
		$this->idCirugia = $idCirugia;
	}
	public function getIdIngreso(){
		return $this->idIngreso;
	}

	public function setIdIngreso($idIngreso){
		$this->idIngreso = $idIngreso;
	}
	public function getIdTipoCirugia(){
		return $this->idTipoCirugia;
	}

	public function setIdTipoCirugia($idTipoCirugia){
		$this->idTipoCirugia = $idTipoCirugia;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}
	public function getFechaHora(){
		return $this->fechaHora;
	}

	public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}

	public function listarTipoCirugia(/*Parametros*/){
	}
	public function agregarTipoCirugia(/*Parametros*/){
	}
	public function eliminarTipoCirugia(/*Parametros*/){
	}
	public function actualizarTipoCirugia(/*Parametros*/){
	}
	public function agregar(/*Parametros*/){
	}
	public function listarPorPaciente(/*Parametros*/){
	}
	public function listarPorMedico(/*Parametros*/){
	}
	public function listarPorHoy(/*Parametros*/){
	}
	public function listarPorCentroMedico(/*Parametros*/){
	}
	public function listarPorCentroFecha(/*Parametros*/){
	}
	public function listarPorMedicoFecha(/*Parametros*/){
	}

}
?>