<?php
include_once('Persona.php');
class Paramedico extends Persona{
	private $idParamedico;
	private $licencia;

	public function __construct(
		$idParamedico = null,
		$licencia = null
	){
		$this->idParamedico = $idParamedico;
		$this->licencia = $licencia;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>Paramedico{"
		."idParamedico: ".$this->idParamedico." , "
		."licencia: ".$this->licencia;
		return $var."}";
	}

	public function getIdParamedico(){
		return $this->idParamedico;
	}

	public function setIdParamedico($idParamedico){
		$this->idParamedico = $idParamedico;
	}
	public function getLicencia(){
		return $this->licencia;
	}

	public function setLicencia($licencia){
		$this->licencia = $licencia;
	}

	public function crear(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}
	public function listarTodos(/*Parametros*/){
	}
	public function buscarPorNombre(/*Parametros*/){
	}
	public function buscarPorApellido(/*Parametros*/){
	}
	public function buscarPorNoIdentidad(/*Parametros*/){
	}
}
?>