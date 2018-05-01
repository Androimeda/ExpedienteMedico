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
	private $tipoTratamiento;
	private $idPaciente;


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
		return $this->idViaSuministro;
	}

	public function setIdViaSuministro($idViaSuministro){
		$this->idViaSuministro = $idViaSuministro;
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

	public function getTipoTratamiento(){
		return $this->tipoTratamiento;
	}

	public function setTipoTratamiento($tipoTratamiento){
		$this->tipoTratamiento = $tipoTratamiento;
	}

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}

	public function agregarTipoTratamiento($conexion){
		$query=sprintf("
		  INSERT 
		  INTO TIPOTRATAMIENTO (TIPO_TRATAMIENTO) 
		  VALUES ('%s')
		  
		"
		  ,$this->tipoTratamiento
		);
		$resultado = $conexion->query($query);
		$resultado = $conexion->query($query);
		$res = $conexion->run($resultado);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Agregada exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo agregar tipo';
		}
		return json_encode($respuesta);
	}

	public function actualizarTipoTratamiento($conexion){
		$query=sprintf("
		  UPDATE TIPOTRATAMIENTO SET
		  TIPO_TRATAMIENTO = '%s'
		  WHERE id_tipo_tratamiento = '%s'
		"
		  ,$this->tipoTratamiento
		  ,$this->idTipoTratamiento
		);
		$resultado = $conexion->query($query);
		$resultado = $conexion->query($query);
		$res = $conexion->run($resultado);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Actualizada exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo actualizar tipo';
		}
		return json_encode($respuesta);
	}

	public function listarTipoTratamiento($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM TIPOTRATAMIENTO
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorTipoTratamiento($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM TRATAMIENTO
		    WHERE ID_TIPO = %s
		"
		, $this->idTipoTratamiento
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarViaSuministro($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VIASUMINISTRO
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function agregarViaSuministro($conexion){
		$query=sprintf("
		    INSERT 
		    INTO VIASUMINISTRO (VIA_SUMINISTRO) 
		    VALUES ('%s')

		"
		  ,$this->viaSuministro
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
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
		$query=sprintf("
		   SELECT * FROM VISTATRATAMIENTOCONSULTAS v 
		    WHERE v.ID_PACIENTE =%s
		"
		  ,$this->idPaciente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function recetar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_Recetar(
		      %s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idConsulta
		  ,$this->dosis
		  ,$this->intervaloTiempo
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