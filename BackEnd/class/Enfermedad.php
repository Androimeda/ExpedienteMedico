<?php
class Enfermedad{
	private $idEnfermedad;
	private $enfermedad;
	private $idTipoEnfermedad;
	private $descripcion;
	private $idExpediente;
	private $idConsulta;
	private $idMedico;

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

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

	public function getIdConsulta(){
		return $this->idConsulta;
	}

	public function setIdConsulta($idConsulta){
		$this->idConsulta = $idConsulta;
	}

	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}

	public function agregarTipoEnfermedad($conexion){
		$query=sprintf("
			INSERT INTO TIPOENFERMEDAD
			(descripcion) VALUES('%s')
		",$this->descripcion
		);
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

	public function listarTipoEnfermedad($conexion){
		$query=sprintf("
			SELECT * FROM TIPOENFERMEDAD
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function actualizarTipoEnfermedad($conexion){
		$query=sprintf("
			UPDATE TIPOENFERMEDAD SET
				descripcion = '%s'
			WHERE id_tipo_enfermedad = %s
		",$this->descripcion
		 ,$this->idTipoEnfermedad
		);
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

	public function listarTodos($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM VistaEnfermedad ORDER BY tipo_enfermedad, enfermedad 
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorTipo($conexion){
		$query=sprintf("
		   SELECT * 
		   FROM ENFERMEDAD e
		   INNER JOIN TIPOENFERMEDAD t
		   ON e.id_tipo_enfermedad = t.id_tipo_enfermedad
		   WHERE e.ID_TIPO_ENFERMEDAD=%s
		"
		  ,$this->idTipoEnfermedad
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
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
		$query=sprintf("
		    SELECT  * 
		    FROM VistaEnfermedadesConsultas V 
		    WHERE  V.ID_EXPEDIENTE=%s 
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function diagnosticarEnfermedad($conexion){
		$query=sprintf("
		  BEGIN
		    PL_DiagnosticarEnfermedad(
		      %s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idEnfermedad
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