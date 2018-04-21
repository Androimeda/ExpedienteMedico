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

	public function crear($conexion){
	}
	public function eliminar($conexion){
	}
	public function actualizar($conexion){
	}
	public function listar($conexion){
	}
	public function listarTodos($conexion){
	}
	public function buscarPorNombre($conexion){
	}
	public function buscarPorApellido($conexion){
	}
	public function buscarPorNoIdentidad($conexion){
	}
}
?>