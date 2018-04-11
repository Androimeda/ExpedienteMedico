<?php
class Defuncion{
	private $idDeceso;
	private $observacionCausa;
	private $fechaHora;
	private $idExpediente;

	public function __construct(
		$idDeceso = null,
		$observacionCausa = null,
		$fechaHora = null,
		$idExpediente = null
	){
		$this->idDeceso = $idDeceso;
		$this->observacionCausa = $observacionCausa;
		$this->fechaHora = $fechaHora;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "Defuncion{"
		."idDeceso: ".$this->idDeceso." , "
		."observacionCausa: ".$this->observacionCausa." , "
		."fechaHora: ".$this->fechaHora." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdDeceso(){
		return $this->idDeceso;
	}

	public function setIdDeceso($idDeceso){
		$this->idDeceso = $idDeceso;
	}
	public function getObservacionCausa(){
		return $this->observacionCausa;
	}

	public function setObservacionCausa($observacionCausa){
		$this->observacionCausa = $observacionCausa;
	}
	public function getFechaHora(){
		return $this->fechaHora;
	}

	public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

}
?>