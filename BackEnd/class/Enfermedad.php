<?php
class Enfermedad{
	private $idEnfermedad;
	private $enfermedad;
	private $idTipoEnfermedad;

	public function __construct(
		$idEnfermedad = null,
		$enfermedad = null,
		$idTipoEnfermedad = null
	){
		$this->idEnfermedad = $idEnfermedad;
		$this->enfermedad = $enfermedad;
		$this->idTipoEnfermedad = $idTipoEnfermedad;
	}

	public function __toString(){
		$var = "Enfermedad{"
		."idEnfermedad: ".$this->idEnfermedad." , "
		."enfermedad: ".$this->enfermedad." , "
		."idTipoEnfermedad: ".$this->idTipoEnfermedad;
		return $var."}";
	}

	public function getIdEnfermedad(){
		return $this->idEnfermedad;
	}

	public function setIdEnfermedad($idEnfermedad){
		$this->idEnfermedad = $idEnfermedad;
	}
	public function getEnfermedad(){
		return $this->enfermedad;
	}

	public function setEnfermedad($enfermedad){
		$this->enfermedad = $enfermedad;
	}
	public function getIdTipoEnfermedad(){
		return $this->idTipoEnfermedad;
	}

	public function setIdTipoEnfermedad($idTipoEnfermedad){
		$this->idTipoEnfermedad = $idTipoEnfermedad;
	}

	public function agregarTipoEnfermedad($conexion){
	}
	public function listarTipoEnfermedad($conexion){
	}
	public function actualizarTipoEnfermedad($conexion){
	}
	public function listarTodos($conexion){
	}
	public function listarPorTipo($conexion){
	}
	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearEnfermedad(
		      '%s'
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->enfermedad
		  ,$this->idTipoEnfermedad
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
		    PL_ActualizarEnfermedad(
		      %s
		      ,'%s'
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idEnfermedad
		  ,$this->penfermedad
		  ,$this->idTipoEnfermedad
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
	public function diagnosticarEnfermedad($conexion){
		$query=sprintf("
		  BEGIN
		    PL_DiagnosticarEnfermedad(
		      %s
		      ,%s
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idEnfermedad
		  ,$this->idMedico
		  ,$this->fechaDiagnostico
		  ,$this->idExpediente
		  ,$this->idConsulta
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
	public function quitarDiagnostico($conexion){
		$query=sprintf("
		  BEGIN
		    PL_QuitarDiagnostico(
		      %s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idEnfermedad
		  ,$this->idExpediente
		  ,$this->idConsulta
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