<?php
class Examen{
	private $idExamen;
	private $urlDocumento;
	private $idTipo;
	private $idCentroMedico;
	private $observacion;
	private $idExpediente;
	private $fecha;

	public function __construct(
		$idExamen = null,
		$urlDocumento = null,
		$idTipo = null,
		$idCentroMedico = null,
		$observacion = null,
		$idExpediente = null,
		$fecha = null
	){
		$this->idExamen = $idExamen;
		$this->urlDocumento = $urlDocumento;
		$this->idTipo = $idTipo;
		$this->idCentroMedico = $idCentroMedico;
		$this->observacion = $observacion;
		$this->idExpediente = $idExpediente;
		$this->fecha = $fecha;
	}

	public function __toString(){
		$var = "Examen{"
		."idExamen: ".$this->idExamen." , "
		."urlDocumento: ".$this->urlDocumento." , "
		."idTipo: ".$this->idTipo." , "
		."idCentroMedico: ".$this->idCentroMedico." , "
		."observacion: ".$this->observacion." , "
		."idExpediente: ".$this->idExpediente." , "
		."fecha: ".$this->fecha;
		return $var."}";
	}

	public function getIdExamen(){
		return $this->idExamen;
	}

	public function setIdExamen($idExamen){
		$this->idExamen = $idExamen;
	}
	public function getUrlDocumento(){
		return $this->urlDocumento;
	}

	public function setUrlDocumento($urlDocumento){
		$this->urlDocumento = $urlDocumento;
	}
	public function getIdTipo(){
		return $this->idTipo;
	}

	public function setIdTipo($idTipo){
		$this->idTipo = $idTipo;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}
	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function agregarTipoExamen($conexion){
	}
	public function listarTipoExamen($conexion){
	}
	public function actualizarTipoExamen($conexion){
	}
	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearExamen(
		      '%s'
		      ,%s
		      ,%s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->urlDocumento
		  ,$this->idTipo
		  ,$this->idCentroMedico
		  ,$this->observacion
		  ,$this->idExpediente
		  ,$this->fecha
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
	public function listarTodos($conexion){
	}
	public function eliminar($conexion){
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarExamen(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idExamen
		  ,$this->urlDocumento
		  ,$this->idTipo
		  ,$this->idCentroMedico
		  ,$this->observacion
		  ,$this->idExpediente
		  ,$this->fecha
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
	public function listarPorPaciente($conexion){
	}
	public function listarPorCentro($conexion){
	}
	public function listarPorTipo($conexion){
	}

}
?>