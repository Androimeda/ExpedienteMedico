<?php
class Persona{
	private $p_nombre;
	private $s_nombre;
	private $p_apellido;
	private $s_apellido;
	private $no_identidad;

	public function __construct(
		$p_nombre = null,
		$s_nombre = null,
		$p_apellido = null,
		$s_apellido = null,
		$no_identidad = null
	){
		$this->p_nombre = $p_nombre;
		$this->s_nombre = $s_nombre;
		$this->p_apellido = $p_apellido;
		$this->s_apellido = $s_apellido;
		$this->no_identidad = $no_identidad;
	}

	public function __toString(){
		$var = "Persona{"
		."p_nombre: ".$this->p_nombre." , "
		."s_nombre: ".$this->s_nombre." , "
		."p_apellido: ".$this->p_apellido." , "
		."s_apellido: ".$this->s_apellido." , "
		."no_identidad: ".$this->no_identidad;
		return $var."}";
	}

	public function getP_nombre(){
		return $this->p_nombre;
	}

	public function setP_nombre($p_nombre){
		$this->p_nombre = $p_nombre;
	}
	public function getS_nombre(){
		return $this->s_nombre;
	}

	public function setS_nombre($s_nombre){
		$this->s_nombre = $s_nombre;
	}
	public function getP_apellido(){
		return $this->p_apellido;
	}

	public function setP_apellido($p_apellido){
		$this->p_apellido = $p_apellido;
	}
	public function getS_apellido(){
		return $this->s_apellido;
	}

	public function setS_apellido($s_apellido){
		$this->s_apellido = $s_apellido;
	}
	public function getNo_identidad(){
		return $this->no_identidad;
	}

	public function setNo_identidad($no_identidad){
		$this->no_identidad = $no_identidad;
	}

}
?>