<?php
class Tratamiento{
	private $idTratamiento;
	private $dosis;
	private $intervaloTiempo;
	private $fechaInicio;
	private $duracionTratamiento;
	private $idTipoTratamiento;
	private $idViaSuministro;

	public function __construct(
		$idTratamiento = null,
		$dosis = null,
		$intervaloTiempo = null,
		$fechaInicio = null,
		$duracionTratamiento = null,
		$idTipoTratamiento = null,
		$idViaSuministro =null
	){
		$this->idTratamiento = $idTratamiento;
		$this->dosis = $dosis;
		$this->intervaloTiempo = $intervaloTiempo;
		$this->fechaInicio = $fechaInicio;
		$this->duracionTratamiento = $duracionTratamiento;
		$this->idTipoTratamiento = $idTipoTratamiento;
		$this->idViaSuministro = $idViaSuministro;
	}

	public function __toString(){
		$var = "Tratamiento{"
		."idTratamiento: ".$this->idTratamiento." , "
		."dosis: ".$this->dosis." , "
		."intervaloTiempo: ".$this->intervaloTiempo." , "
		."fechaInicio: ".$this->fechaInicio." , "
		."duracionTratamiento: ".$this->duracionTratamiento." , "
		."idViaSuministro: ".$this->idViaSuministro." , "
		."idTipoTratamiento: ".$this->idTipoTratamiento;
		return $var."}";
	}

	public function getIdTratamiento(){
		return $this->idTratamiento;
	}

	public function setIdTratamiento($idTratamiento){
		$this->idTratamiento = $idTratamiento;
	}
	public function getDosis(){
		return $this->dosis;
	}

	public function setDosis($dosis){
		$this->dosis = $dosis;
	}
	public function getIntervaloTiempo(){
		return $this->intervaloTiempo;
	}

	public function setIntervaloTiempo($intervaloTiempo){
		$this->intervaloTiempo = $intervaloTiempo;
	}
	public function getFechaInicio(){
		return $this->fechaInicio;
	}

	public function setFechaInicio($fechaInicio){
		$this->fechaInicio = $fechaInicio;
	}
	public function getDuracionTratamiento(){
		return $this->duracionTratamiento;
	}

	public function setDuracionTratamiento($duracionTratamiento){
		$this->duracionTratamiento = $duracionTratamiento;
	}
	public function getIdTipoTratamiento(){
		return $this->idTipoTratamiento;
	}

	public function setIdTipoTratamiento($idTipoTratamiento){
		$this->idTipoTratamiento = $idTipoTratamiento;
	}
	public function getIdViaSuministro(){
		return $this->IdViaSuministro;
	}

	public function setIdViaSuministro($IdViaSuministro){
		$this->IdViaSuministro = $IdViaSuministro;
	}

	public function agregarTipoTratamiento($conexion){
	}
	public function actualizarTipoTratamiento($conexion){
	}
	public function listarTipoTratamiento($conexion){
	}
	public function listarViaSuministro($conexion){
	}
	public function agregarViaSuministro($conexion){
	}
	public function actualizarViaSuministro($conexion){
	}
	public function crear($conexion){
	}
	public function listarTodos($conexion){
	}
	public function actualizar($conexion){
	}
	public function listarPorPaciente($conexion){
	}
	public function recetar($conexion){
	}
	public function borrarReceta($conexion){
	}

}
?>