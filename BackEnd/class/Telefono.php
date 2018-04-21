<?php
class Telefono{
	private $idTelefono;
	private $telefono;
	private $idTipoTelefono;
	private $idPais;

	public function __construct(
		$idTelefono = null,
		$telefono = null,
		$idTipoTelefono = null,
		$idPais = null
	){
		$this->idTelefono = $idTelefono;
		$this->telefono = $telefono;
		$this->idTipoTelefono = $idTipoTelefono;
		$this->idPais = $idPais;
	}

	public function __toString(){
		$var = "Telefono{"
		."idTelefono: ".$this->idTelefono." , "
		."telefono: ".$this->telefono." , "
		."idTipoTelefono: ".$this->idTipoTelefono." , "
		."idPais: ".$this->idPais;
		return $var."}";
	}

	public function getIdTelefono(){
		return $this->idTelefono;
	}

	public function setIdTelefono($idTelefono){
		$this->idTelefono = $idTelefono;
	}
	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	public function getIdTipoTelefono(){
		return $this->idTipoTelefono;
	}

	public function setIdTipoTelefono($idTipoTelefono){
		$this->idTipoTelefono = $idTipoTelefono;
	}
	public function getIdPais(){
		return $this->idPais;
	}

	public function setIdPais($idPais){
		$this->idPais = $idPais;
	}

	public function listarPorPersona($conexion){
	}
	public function listarPorCentroMedico($conexion){
	}
	public function agregarPersona($conexion){
	}
	public function agregarCentro($conexion){
	}
	public function buscarPorPersona($conexion){
	}
	public function buscarPorCentro($conexion){
	}
	public function eliminarDePersona($conexion){
	}
	public function eliminarDeCentro($conexion){
	}
	public function agregarTipoTelefono($conexion){
	}
	public function listarTipoTelefono($conexion){
	}
	public function actualizarTipoTelefono($conexion){
	}

}
?>