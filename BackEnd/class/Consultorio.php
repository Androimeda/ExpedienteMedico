<?php
class Consultorio{
	private $idConsultorio;
	private $idPiso;

	public function __construct(
		$idConsultorio = null,
		$idPiso = null
	){
		$this->idConsultorio = $idConsultorio;
		$this->idPiso = $idPiso;
	}

	public function __toString(){
		$var = "Consultorio{"
		."idConsultorio: ".$this->idConsultorio." , "
		."idPiso: ".$this->idPiso;
		return $var."}";
	}

	public function getIdConsultorio(){
		return $this->idConsultorio;
	}

	public function setIdConsultorio($idConsultorio){
		$this->idConsultorio = $idConsultorio;
	}
	public function getIdPiso(){
		return $this->idPiso;
	}

	public function setIdPiso($idPiso){
		$this->idPiso = $idPiso;
	}

	public function crear(/*Parametros*/){
	}
	public function listarPorPiso(/*Parametros*/){
	}
	public function listarPorCentro(/*Parametros*/){
	}
	public function listarPorMedico(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function asignar(/*Parametros*/){
	}

}
?>