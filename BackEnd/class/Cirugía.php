<?php
class Cirugia{
	private $idCirugia;
	private $idIngreso;
	private $idTipoCirugia;
	private $idMedico;

	public function __construct(
		$idCirugia = null,
		$idIngreso = null,
		$idTipoCirugia = null,
		$idMedico = null
	){
		$this->idCirugia = $idCirugia;
		$this->idIngreso = $idIngreso;
		$this->idTipoCirugia = $idTipoCirugia;
		$this->idMedico = $idMedico;
	}

	public function __toString(){
		$var = "Cirugia{"
		."idCirugia: ".$this->idCirugia." , "
		."idIngreso: ".$this->idIngreso." , "
		."idTipoCirugia: ".$this->idTipoCirugia." , "
		."idMedico: ".$this->idMedico;
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

	public function listarTipoCirugia(/*Parametros*/){
	}
	public function agregarTipoCirugia(/*Parametros*/){
	}
	public function eliminarTipoCirugia(/*Parametros*/){
	}
	public function actualizarTipoCirugia(/*Parametros*/){
	}

}
?>