<?php
class Referencia{
	private $idReferencia;
	private $descripcion;
	private $idMedico;
	private $idExpediente;
	private $idCentroMedicoRemite;
	private $idCentroMedicoRecibe;

	public function __construct(
		$idReferencia = null,
		$descripcion = null,
		$idMedico = null,
		$idExpediente = null,
		$idCentroMedicoRemite = null,
		$idCentroMedicoRecibe = null
	){
		$this->idReferencia = $idReferencia;
		$this->descripcion = $descripcion;
		$this->idMedico = $idMedico;
		$this->idExpediente = $idExpediente;
		$this->idCentroMedicoRemite = $idCentroMedicoRemite;
		$this->idCentroMedicoRecibe = $idCentroMedicoRecibe;
	}

	public function __toString(){
		$var = "Referencia{"
		."idReferencia: ".$this->idReferencia." , "
		."descripcion: ".$this->descripcion." , "
		."idMedico: ".$this->idMedico." , "
		."idExpediente: ".$this->idExpediente." , "
		."idCentroMedicoRemite: ".$this->idCentroMedicoRemite." , "
		."idCentroMedicoRecibe: ".$this->idCentroMedicoRecibe;
		return $var."}";
	}

	public function getIdReferencia(){
		return $this->idReferencia;
	}

	public function setIdReferencia($idReferencia){
		$this->idReferencia = $idReferencia;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}
	public function getIdCentroMedicoRemite(){
		return $this->idCentroMedicoRemite;
	}

	public function setIdCentroMedicoRemite($idCentroMedicoRemite){
		$this->idCentroMedicoRemite = $idCentroMedicoRemite;
	}
	public function getIdCentroMedicoRecibe(){
		return $this->idCentroMedicoRecibe;
	}

	public function setIdCentroMedicoRecibe($idCentroMedicoRecibe){
		$this->idCentroMedicoRecibe = $idCentroMedicoRecibe;
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
	public function listarPorPaciente($conexion){
	}
	public function listarPorCentroRemite($conexion){
	}
	public function listarRecibidas($conexion){
	}
	public function listarPorMedico($conexion){
	}
}
?>