<?php
class Referencia{
	private $idReferencia;
	private $descripcion;
	private $idMedico;
	private $idExpediente;
	private $idCentroMedicoRemite;
	private $idCentroMedicoRecibe;
	private $idPaciente;

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

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearReferencia(
		      '%s'
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->descripcion
		  ,$this->idMedico
		  ,$this->idExpediente
		  ,$this->idCentroMedicoRemite
		  ,$this->idCentroMedicoRecibe
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
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarReferencia(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idReferencia
		  ,$this->descripcion
		  ,$this->idMedico
		  ,$this->idExpediente
		  ,$this->idCentroMedicoRemite
		  ,$this->idCentroMedicoRecibe
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
	
	public function listar($conexion){
	}
	public function listarTodos($conexion){
	}

	public function listarPorPaciente($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaReferencias v 
		    WHERE v.ID_PACIENTE=%s
		"
		  ,$this->idPaciente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);

	}
	public function listarPorCentroRemite($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaReferencias v 
		    WHERE v.id_centro_medico_remite=%s
		"
		  ,$this->idCentroMedicoRemite
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);

	}
	public function listarRecibidas($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaReferencias v 
		    WHERE v.id_centro_medico_recibe=%s
		"
		  ,$this->idCentroMedicoRecibe
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorMedico($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaReferencias v 
		    WHERE v.ID_MEDICO =%s AND v.id_centro_medico_remite=%s
		"
		  ,$this->idMedico
		  ,$this->idCentroMedicoRemite
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
}
?>