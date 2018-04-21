<?php
include_once('Persona.php');
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
		  $this->pNombre
		  ,$this->sNombre
		  ,$this->pApellido
		  ,$this->sApellido
		  ,$this->direccion
		  ,$this->noIdentidad
		  ,$this->idPais
		  ,$this->sexo
		  ,$this->correo
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
	}
	public function listarTodos($conexion){
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
	public function eliminar($conexion){
	}
	public function buscarPorNombre($conexion){
	}
	public function buscarPorApellido($conexion){
	}
	public function buscarPorNoIdentidad($conexion){
	}
	public function getNumeroExpediente($conexion){
	}
	public function setNatalidad($conexion){
	}
	public function setDefuncion($conexion){
	}
}
?>