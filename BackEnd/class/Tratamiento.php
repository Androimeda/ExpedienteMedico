<?php
class Tratamiento{
	private $idTratamiento;
	private $dosis;
	private $intervaloTiempo;
	private $fechaInicio;
	private $duracionTratamiento;
	private $idTipoTratamiento;
	private $idViaSuministro;
	private $viaSuministro;
	private $idMedico;
	private $idConsulta;

	public function __construct(
		$idTratamiento = null,
		$dosis = null,
		$intervaloTiempo = null,
		$fechaInicio = null,
		$duracionTratamiento = null,
		$idTipoTratamiento = null,
		$idViaSuministro =null
	){
		$this->idTratamiento = $idTratamiento;
		$this->dosis = $dosis;
		$this->intervaloTiempo = $intervaloTiempo;
		$this->fechaInicio = $fechaInicio;
		$this->duracionTratamiento = $duracionTratamiento;
		$this->idTipoTratamiento = $idTipoTratamiento;
		$this->idViaSuministro = $idViaSuministro;
	}

	public function __toString(){
		$var = "Tratamiento{"
		."idTratamiento: ".$this->idTratamiento." , "
		."dosis: ".$this->dosis." , "
		."intervaloTiempo: ".$this->intervaloTiempo." , "
		."fechaInicio: ".$this->fechaInicio." , "
		."duracionTratamiento: ".$this->duracionTratamiento." , "
		."idViaSuministro: ".$this->idViaSuministro." , "
		."idTipoTratamiento: ".$this->idTipoTratamiento;
		return $var."}";
	}

	public function getIdTratamiento(){
		return $this->idTratamiento;
	}

	public function setIdTratamiento($idTratamiento){
		$this->idTratamiento = $idTratamiento;
	}
	public function getDosis(){
		return $this->dosis;
	}

	public function setDosis($dosis){
		$this->dosis = $dosis;
	}
	public function getIntervaloTiempo(){
		return $this->intervaloTiempo;
	}

	public function setIntervaloTiempo($intervaloTiempo){
		$this->intervaloTiempo = $intervaloTiempo;
	}
	public function getFechaInicio(){
		return $this->fechaInicio;
	}

	public function setFechaInicio($fechaInicio){
		$this->fechaInicio = $fechaInicio;
	}
	public function getDuracionTratamiento(){
		return $this->duracionTratamiento;
	}

	public function setDuracionTratamiento($duracionTratamiento){
		$this->duracionTratamiento = $duracionTratamiento;
	}
	public function getIdTipoTratamiento(){
		return $this->idTipoTratamiento;
	}

	public function setIdTipoTratamiento($idTipoTratamiento){
		$this->idTipoTratamiento = $idTipoTratamiento;
	}
	public function getIdViaSuministro(){
		return $this->IdViaSuministro;
	}

	public function setIdViaSuministro($IdViaSuministro){
		$this->IdViaSuministro = $IdViaSuministro;
	}

	public function getViaSuministro(){
		return $this->viaSuministro;
	}

	public function setViaSuministro($viaSuministro){
		$this->viaSuministro = $viaSuministro;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}
	public function getIdConsulta(){
		return $this->idConsulta;
	}

	public function setIdConsulta($idConsulta){
		$this->idConsulta = $idConsulta;
	}

	public function agregarTipoTratamiento($conexion){
	}
	public function actualizarTipoTratamiento($conexion){
	}
	public function listarTipoTratamiento($conexion){
	}
	public function listarViaSuministro($conexion){
	}
	public function agregarViaSuministro($conexion){
	}
	public function actualizarViaSuministro($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarViaSuministro(
		      %s
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idViaSuministro
		  ,$this->viaSuministro
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
	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_crearTratamiento(
		      '%s'
		      ,'%s'
		      ,%s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->dosis
		  ,$this->intervaloTiempo
		  ,$this->fechaInicio
		  ,$this->duracionTratamiento
		  ,$this->idTipoTratamiento
		  ,$this->idViaSuministro
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
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarTratamiento(
		      %s
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idTratamiento
		  ,$this->dosis
		  ,$this->intervaloTiempo
		  ,$this->fechaInicio
		  ,$this->duracionTratamiento
		  ,$this->idTipoTratamiento
		  ,$this->idViaSuministro
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
	public function recetar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_Recetar(
		      %s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idTratamiento
		  ,$this->idConsulta
		  ,$this->idMedico
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
	public function actualizarReceta($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarReceta(
		      %s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idTratamiento
		  ,$this->idConsulta
		  ,$this->idMedico
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