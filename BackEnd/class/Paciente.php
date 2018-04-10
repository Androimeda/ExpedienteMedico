<?php
include_once('Persona.php');
class Paciente extends Persona{
	private $idPaciente;
	private $idTipoSangre;
	private $idEscolaridad;
	private $idOcupacion;
	private $idEstadoCivil;
	private $idAscendencia;

	public function __construct(
		$idPaciente = null,
		$idTipoSangre = null,
		$idEscolaridad = null,
		$idOcupacion = null,
		$idEstadoCivil = null,
		$idAscendencia = null
	){
		$this->idPaciente = $idPaciente;
		$this->idTipoSangre = $idTipoSangre;
		$this->idEscolaridad = $idEscolaridad;
		$this->idOcupacion = $idOcupacion;
		$this->idEstadoCivil = $idEstadoCivil;
		$this->idAscendencia = $idAscendencia;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>"."Paciente{"
		."idPaciente: ".$this->idPaciente." , "
		."idTipoSangre: ".$this->idTipoSangre." , "
		."idEscolaridad: ".$this->idEscolaridad." , "
		."idOcupacion: ".$this->idOcupacion." , "
		."idEstadoCivil: ".$this->idEstadoCivil." , "
		."idAscendencia: ".$this->idAscendencia;
		return $var."}";
	}

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}
	public function getIdTipoSangre(){
		return $this->idTipoSangre;
	}

	public function setIdTipoSangre($idTipoSangre){
		$this->idTipoSangre = $idTipoSangre;
	}
	public function getIdEscolaridad(){
		return $this->idEscolaridad;
	}

	public function setIdEscolaridad($idEscolaridad){
		$this->idEscolaridad = $idEscolaridad;
	}
	public function getIdOcupacion(){
		return $this->idOcupacion;
	}

	public function setIdOcupacion($idOcupacion){
		$this->idOcupacion = $idOcupacion;
	}
	public function getIdEstadoCivil(){
		return $this->idEstadoCivil;
	}

	public function setIdEstadoCivil($idEstadoCivil){
		$this->idEstadoCivil = $idEstadoCivil;
	}
	public function getIdAscendencia(){
		return $this->idAscendencia;
	}

	public function setIdAscendencia($idAscendencia){
		$this->idAscendencia = $idAscendencia;
	}

	public function crear(/*Parametros*/){
	}
	public function listar(/*Parametros*/){
	}
	public function listarTodos(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function buscarPorNombre(/*Parametros*/){
	}
	public function buscarPorApellido(/*Parametros*/){
	}
	public function buscarPorNoIdentidad(/*Parametros*/){
	}
}
?>