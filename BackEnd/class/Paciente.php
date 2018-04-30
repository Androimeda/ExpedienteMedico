<?php
class Paciente extends Persona{
	private $idPaciente;
	private $idTipoSangre;
	private $idEscolaridad;
	private $idOcupacion;
	private $idEstadoCivil;
	private $idAscendencia;
	private $idExpediente;
	private $fechaHora;
	private $ordenPartoMultiple;
	private $idCentroMedico;
	private $idMadre;
	private $idPadre;
	private $observacionCausa;

	public function __construct(
		$idPaciente = null,
		$idTipoSangre = null,
		$idEscolaridad = null,
		$idOcupacion = null,
		$idEstadoCivil = null,
		$idAscendencia = null
	){
		$this->idPaciente = $idPaciente;
		$this->idTipoSangre = $idTipoSangre;
		$this->idEscolaridad = $idEscolaridad;
		$this->idOcupacion = $idOcupacion;
		$this->idEstadoCivil = $idEstadoCivil;
		$this->idAscendencia = $idAscendencia;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>"."Paciente{"
		."idPaciente: ".$this->idPaciente." , "
		."idTipoSangre: ".$this->idTipoSangre." , "
		."idEscolaridad: ".$this->idEscolaridad." , "
		."idOcupacion: ".$this->idOcupacion." , "
		."idEstadoCivil: ".$this->idEstadoCivil." , "
		."idAscendencia: ".$this->idAscendencia;
		return $var."}";
	}

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}
	public function getIdTipoSangre(){
		return $this->idTipoSangre;
	}

	public function setIdTipoSangre($idTipoSangre){
		$this->idTipoSangre = $idTipoSangre;
	}
	public function getIdEscolaridad(){
		return $this->idEscolaridad;
	}

	public function setIdEscolaridad($idEscolaridad){
		$this->idEscolaridad = $idEscolaridad;
	}
	public function getIdOcupacion(){
		return $this->idOcupacion;
	}

	public function setIdOcupacion($idOcupacion){
		$this->idOcupacion = $idOcupacion;
	}
	public function getIdEstadoCivil(){
		return $this->idEstadoCivil;
	}

	public function setIdEstadoCivil($idEstadoCivil){
		$this->idEstadoCivil = $idEstadoCivil;
	}
	public function getIdAscendencia(){
		return $this->idAscendencia;
	}

	public function setIdAscendencia($idAscendencia){
		$this->idAscendencia = $idAscendencia;
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
		$this->fechaHora = to_timestamp($fechaHora);
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

	public function getObservacionCausa(){
		return $this->observacionCausa;
	}

	public function setObservacionCausa($observacionCausa){
		$this->observacionCausa = $observacionCausa;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearPaciente(
		      '%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->getPNombre()
		  ,$this->getSNombre()
		  ,$this->getPApellido()
		  ,$this->getSApellido()
		  ,$this->getDireccion()
		  ,$this->getNoIdentidad()
		  ,$this->getIdPais()
		  ,$this->getSexo()
		  ,$this->getCorreo()
		  ,$this->idTipoSangre
		  ,$this->idEscolaridad
		  ,$this->idOcupacion
		  ,$this->idEstadoCivil
		  ,$this->idAscendencia
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
		$query=sprintf("
		  SELECT  * 
		  FROM VISTAPACIENTE v 
		  WHERE v.ID_PACIENTE =%s
		"
		  ,$this->idPaciente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarTodos($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAPACIENTE
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarPaciente(
		      %s
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idPaciente
		  ,$this->getDireccion()
		  ,$this->getCorreo()
		  ,$this->idEscolaridad
		  ,$this->idOcupacion
		  ,$this->idEstadoCivil
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
	public function buscarPorNombre($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAPACIENTE v 
		    WHERE  v.P_NOMBRE = '%s'  OR v.S_NOMBRE = '%s' 
		"
		  ,$this->getPNombre()
		  ,$this->getSNombre()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function buscarPorApellido($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAPACIENTE v 
		    WHERE  v.P_APELLIDO = '%s'  OR v.S_APELLIDO = '%s' 
		"
		  ,$this->getPApellido()
		  ,$this->getSApellido()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function buscarPorNoIdentidad($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAPACIENTE v 
		    WHERE  v.NO_IDENTIDAD LIKE '%%%s%%'
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function buscarNoNato($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAPACIENTE v 
		    WHERE  v.NO_IDENTIDAD LIKE '%%%s%%'
		    AND FECHA_NAC IS NULL
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function obtenerNumeroExpediente($conexion){
		$query=sprintf("
		    SELECT  v.ID_EXPEDIENTE 
		    FROM VISTAPACIENTE v 
		    WHERE  v.ID_PERSONA =%s  OR v.ID_PACIENTE =%s 
		"
		  ,$this->idPersona
		  ,$this->idPaciente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function agregarNatalidad($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarNatalidad(
		      %s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idExpediente
		  ,$this->fechaHora
		  ,$this->ordenPartoMultiple
		  ,$this->idCentroMedico
		  ,$this->idMadre
		  ,$this->idPadre
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
	public function agregarDefuncion($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarDefuncion(
		      '%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->observacionCausa
		  ,$this->fechaHora
		  ,$this->idExpediente
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
}
?>