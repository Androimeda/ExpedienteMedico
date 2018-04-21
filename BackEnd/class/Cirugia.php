<?php
class Cirugia{
	private $idCirugia;
	private $idIngreso;
	private $idTipoCirugia;
	private $idMedico;
	private $fechaHora;

	public function __construct(
		$idCirugia = null,
		$idIngreso = null,
		$idTipoCirugia = null,
		$idMedico = null,
		$fechaHora = null
	){
		$this->idCirugia = $idCirugia;
		$this->idIngreso = $idIngreso;
		$this->idTipoCirugia = $idTipoCirugia;
		$this->idMedico = $idMedico;
		$this->fechaHora = $fechaHora;
	}

	public function __toString(){
		$var = "Cirugia{"
		."idCirugia: ".$this->idCirugia." , "
		."idIngreso: ".$this->idIngreso." , "
		."idTipoCirugia: ".$this->idTipoCirugia." , "
		."idMedico: ".$this->idMedico." , "
		."fechaHora: ".$this->fechaHora;
		return $var."}";
	}

	public function getIdCirugia(){
		return $this->idCirugia;
	}

	public function setIdCirugia($idCirugia){
		$this->idCirugia = $idCirugia;
	}
	public function getIdIngreso(){
		return $this->idIngreso;
	}

	public function setIdIngreso($idIngreso){
		$this->idIngreso = $idIngreso;
	}
	public function getIdTipoCirugia(){
		return $this->idTipoCirugia;
	}

	public function setIdTipoCirugia($idTipoCirugia){
		$this->idTipoCirugia = $idTipoCirugia;
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

	public function listarTipoCirugia($conexion){
	}
	public function agregarTipoCirugia($conexion){
	}
	public function actualizarTipoCirugia($conexion){
	}
	public function agregarCirugia($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarCirugia(
		      %s
		      ,%s
		      ,%s
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idIngreso
		  ,$this->idTipoCirugia
		  ,$this->idMedico
		  ,$this->fechaHora
		);
		$resultado=$conexion->query($query);
		oci_bind_by_name($resultado, ':msg', $msg, 2000);
		oci_bind_by_name($resultado, ':res', $res);
		oci_execute($resultado);
		oci_free_statement($resultado);
		$respuesta=[];
		$respuesta['mensaje'] = $msg;
		$respuesta['resultado'] = $res == 1;
		return json_encode($respuesta);
	}
	// public function actualizarCirugia($conexion){
	// }
	public function listarPorPaciente($conexion){
	}
	public function listarPorMedico($conexion){
	}
	public function listarPorHoy($conexion){
	}
	public function listarPorCentroMedico($conexion){
	}
	public function listarPorCentroFecha($conexion){
	}
	public function listarPorMedicoFecha($conexion){
	}

}
?>