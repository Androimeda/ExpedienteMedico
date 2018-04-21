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

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearConsultaExterna(
		      %s
		      ,%s
		      ,%s
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idConsultorio
		  ,$this->idExpediente
		  ,$this->idMedico
		  ,$this->fechaHora
		  ,$this->sintomas
		  ,$this->diagnostico
		  ,$this->observacion
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
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarConsultaExterna(
		      %s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idConsulta
		  ,$this->idExpediente
		  ,$this->idConsultorio
		  ,$this->idMedico
		  ,$this->fechaHora
		  ,$this->sintomas
		  ,$this->diagnostico
		  ,$this->observ
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
	public function eliminar($conexion){
	}
	public function listarPorPaciente($conexion){
	}
	public function listarPorHoy($conexion){
	}
	public function listarPorCentroMedico($conexion){
	}
	public function listarPorMedico($conexion){
	}
	public function listarPorConsultorio($conexion){
	}

}
?>