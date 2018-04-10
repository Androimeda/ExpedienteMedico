<?php
class Natalidad{
	private $idParto;
	private $idExpediente;
	private $fechaHora;
	private $ordenPartoMultiple;
	private $idCentroMedico;
	private $idMadre;
	private $idPadre;

	public function __construct(
		$idParto = null,
		$idExpediente = null,
		$fechaHora = null,
		$ordenPartoMultiple = null,
		$idCentroMedico = null,
		$idMadre = null,
		$idPadre = null
	){
		$this->idParto = $idParto;
		$this->idExpediente = $idExpediente;
		$this->fechaHora = $fechaHora;
		$this->ordenPartoMultiple = $ordenPartoMultiple;
		$this->idCentroMedico = $idCentroMedico;
		$this->idMadre = $idMadre;
		$this->idPadre = $idPadre;
	}

	public function __toString(){
		$var = "Natalidad{"
		."idParto: ".$this->idParto." , "
		."idExpediente: ".$this->idExpediente." , "
		."fechaHora: ".$this->fechaHora." , "
		."ordenPartoMultiple: ".$this->ordenPartoMultiple." , "
		."idCentroMedico: ".$this->idCentroMedico." , "
		."idMadre: ".$this->idMadre." , "
		."idPadre: ".$this->idPadre;
		return $var."}";
	}

	public function getIdParto(){
		return $this->idParto;
	}

	public function setIdParto($idParto){
		$this->idParto = $idParto;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}
	public function getFechaHora(){
		return $this->fechaHora;
	}

	public function setFechaHora($fechaHora){
		$this->fechaHora = $fechaHora;
	}
	public function getOrdenPartoMultiple(){
		return $this->ordenPartoMultiple;
	}

	public function setOrdenPartoMultiple($ordenPartoMultiple){
		$this->ordenPartoMultiple = $ordenPartoMultiple;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getIdMadre(){
		return $this->idMadre;
	}

	public function setIdMadre($idMadre){
		$this->idMadre = $idMadre;
	}
	public function getIdPadre(){
		return $this->idPadre;
	}

	public function setIdPadre($idPadre){
		$this->idPadre = $idPadre;
	}

}
?>