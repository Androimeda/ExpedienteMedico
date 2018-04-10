<?php
include_once('Persona.php');
class Medico extends Persona{
	private $noColegiacion;
	private $idTitulo;
	private $idMedico;

	public function __construct(
		$noColegiacion = null,
		$idTitulo = null,
		$idMedico = null
	){
		$this->noColegiacion = $noColegiacion;
		$this->idTitulo = $idTitulo;
		$this->idMedico = $idMedico;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>"."Medico{"
		."noColegiacion: ".$this->noColegiacion." , "
		."idTitulo: ".$this->idTitulo." , "
		."idMedico: ".$this->idMedico;
		return $var."}";
	}

	public function getNoColegiacion(){
		return $this->noColegiacion;
	}

	public function setNoColegiacion($noColegiacion){
		$this->noColegiacion = $noColegiacion;
	}
	public function getIdTitulo(){
		return $this->idTitulo;
	}

	public function setIdTitulo($idTitulo){
		$this->idTitulo = $idTitulo;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}

	public function crear(/*Parametros*/){
	}
	public function listarTodos(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}

}
?>