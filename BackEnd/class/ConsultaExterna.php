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
	private $nombreCentro;
	private $idCentroMedico;

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
		$this->fechaHora = to_timestamp($fechaHora);
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

	public function getNombreCentro(){
		return $this->nombreCentro;
	}

	public function setNombreCentro($nombreCentro){
		$this->nombreCentro = $nombreCentro;
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
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
	public function listarPorPaciente($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaConsultaExterna V 
		    WHERE  V.ID_EXPEDIENTE=%s 
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}	
	public function listar($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaConsultaExterna V 
		    WHERE  V.ID_CONSULTA=%s 
		"
		  ,$this->idConsulta
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorHoy($conexion){
		$query=sprintf("
		    SELECT * 
		    FROM VistaConsultaExterna V 
		    WHERE 
		    EXTRACT(DAY FROM V.FECHA_HORA) = EXTRACT(DAY FROM SYSDATE)
		    AND EXTRACT(MONTH FROM V.FECHA_HORA) = EXTRACT(MONTH FROM SYSDATE)
		    AND EXTRACT(YEAR FROM V.FECHA_HORA) = EXTRACT(YEAR FROM SYSDATE)
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorCentroMedico($conexion){
		$query=sprintf("
		     SELECT* 
		     FROM VistaConsultaExterna V 
		     WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s'
		"
		  ,$this->idCentroMedico
		  ,$this->nombreCentro
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorMedico($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaConsultaExterna V 
		    WHERE  V.ID_MEDICO =%s 
		"
		  ,$this->idMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorConsultorio($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM VistaConsultaExterna V  
		   WHERE  V.ID_CONSULTORIO=%s 
		"
		  ,$this->idConsultorio
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarDiariasPorConsultorio($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM VistaConsultaExterna V  
		   WHERE  V.ID_CONSULTORIO=%s
		   AND EXTRACT(DAY FROM V.FECHA_HORA) = EXTRACT(DAY FROM SYSDATE)
		   AND EXTRACT(MONTH FROM V.FECHA_HORA) = EXTRACT(MONTH FROM SYSDATE)
		   AND EXTRACT(YEAR FROM V.FECHA_HORA) = EXTRACT(YEAR FROM SYSDATE)
		"
		  ,$this->idConsultorio
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorCentroMedicoFecha($conexion){
		$query=sprintf("
		    SELECT* 
		    FROM VistaConsultaExterna V 
				WHERE v.ID_CENTRO_MEDICO=%s 
				AND EXTRACT(DAY FROM V.FECHA_HORA) = EXTRACT(DAY FROM %s)
			 	AND EXTRACT(MONTH FROM V.FECHA_HORA) = EXTRACT(MONTH FROM %s)
			 	AND EXTRACT(YEAR FROM V.FECHA_HORA) = EXTRACT(YEAR FROM %s)
		"
		  ,$this->idCentroMedico
		  ,$this->fechaHora
		  ,$this->fechaHora
		  ,$this->fechaHora
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}	

}
?>