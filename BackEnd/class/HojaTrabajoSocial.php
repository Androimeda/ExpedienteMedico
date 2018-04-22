<?php
class HojaTrabajoSocial{
	private $idTS;
	private $descripcion;
	private $idExpediente;
	private $idCentroMedico;

	public function __construct(
		$idTS = null,
		$descripcion = null,
		$idExpediente = null
	){
		$this->idTS = $idTS;
		$this->descripcion = $descripcion;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "HojaTrabajoSocial{"
		."idTS: ".$this->idTS." , "
		."descripcion: ".$this->descripcion." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdTS(){
		return $this->idTS;
	}

	public function setIdTS($idTS){
		$this->idTS = $idTS;
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

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearHojaTrabajoSocial(
		      '%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->descripcion
		  ,$this->idExpediente
		  ,$this->idCentroMedico
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
		$query=sprintf("
		   SELECT  * 
		   FROM VistaHojaTrabajoSocial h 
		   WHERE h.id_centro_medico =%s 
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarHojaTrabajoSocial(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idTS
		  ,$this->descripcion
		  ,$this->idExpediente
		  ,$this->idCentroMedico
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
		    FROM VistaHojaTrabajoSocial h 
		    WHERE  h.id_expediente =%s 
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
}
?>