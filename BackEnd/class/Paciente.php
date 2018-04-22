<?php
class Paciente extends Persona{
	private $idPaciente;
	private $idTipoSangre;
	private $idEscolaridad;
	private $idOcupacion;
	private $idEstadoCivil;
	private $idAscendencia;

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
		  ,$this->pdireccion
		  ,$this->pcorreo
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
		    WHERE  v.NO_IDENTIDAD =%s 
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function getNumeroExpediente($conexion){
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
	
	public function setNatalidad($conexion){
	}
	public function setDefuncion($conexion){
	}
}
?>