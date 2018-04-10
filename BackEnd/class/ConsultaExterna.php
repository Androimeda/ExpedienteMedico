<?php
class ConsultaExterna{
	private $idConsulta;
	private $idConsultorio;
	private $idExpediente;
	private $idMedico;
	private $fechaHora;
	private $sintomas;
	private $diagnostico;
	private $observacion;

	public function __construct(
		$idConsulta = null,
		$idConsultorio = null,
		$idExpediente = null,
		$idMedico = null,
		$fechaHora = null,
		$sintomas = null,
		$diagnostico = null,
		$observacion = null
	){
		$this->idConsulta = $idConsulta;
		$this->idConsultorio = $idConsultorio;
		$this->idExpediente = $idExpediente;
		$this->idMedico = $idMedico;
		$this->fechaHora = $fechaHora;
		$this->sintomas = $sintomas;
		$this->diagnostico = $diagnostico;
		$this->observacion = $observacion;
	}

	public function __toString(){
		$var = "ConsultaExterna{"
		."idConsulta: ".$this->idConsulta." , "
		."idConsultorio: ".$this->idConsultorio." , "
		."idExpediente: ".$this->idExpediente." , "
		."idMedico: ".$this->idMedico." , "
		."fechaHora: ".$this->fechaHora." , "
		."sintomas: ".$this->sintomas." , "
		."diagnostico: ".$this->diagnostico." , "
		."observacion: ".$this->observacion;
		return $var."}";
	}

	public function getIdConsulta(){
		return $this->idConsulta;
	}

	public function setIdConsulta($idConsulta){
		$this->idConsulta = $idConsulta;
	}
	public function getIdConsultorio(){
		return $this->idConsultorio;
	}

	public function setIdConsultorio($idConsultorio){
		$this->idConsultorio = $idConsultorio;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
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
	public function getSintomas(){
		return $this->sintomas;
	}

	public function setSintomas($sintomas){
		$this->sintomas = $sintomas;
	}
	public function getDiagnostico(){
		return $this->diagnostico;
	}

	public function setDiagnostico($diagnostico){
		$this->diagnostico = $diagnostico;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}

	public function crear(/*Parametros*/){
	}
	public function listarPorExpediente(/*Parametros*/){
	}
	public function actualizar(/*Parametros*/){
	}
	public function eliminar(/*Parametros*/){
	}
	public function listarDiarias(/*Parametros*/){
	}
	public function listarPorCentroMedico(/*Parametros*/){
	}
	public function listarPorMedico(/*Parametros*/){
	}

}
?>