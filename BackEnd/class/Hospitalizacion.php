<?php
class Hospitalizacion{
	private $idIngreso;
	private $observacion;
	private $fechaHoraIngreso;
	private $fechaHoraAlta;
	private $idPiso;
	private $cama;
	private $idMedico;
	private $idExpediente;
	private $idCentroMedico;
	private $noIdentidad;

	public function __construct(
		$idIngreso = null,
		$observacion = null,
		$fechaHoraIngreso = null,
		$fechaHoraAlta = null,
		$idPiso = null,
		$cama = null,
		$idMedico = null,
		$idExpediente = null
	){
		$this->idIngreso = $idIngreso;
		$this->observacion = $observacion;
		$this->fechaHoraIngreso = $fechaHoraIngreso;
		$this->fechaHoraAlta = $fechaHoraAlta;
		$this->idPiso = $idPiso;
		$this->cama = $cama;
		$this->idMedico = $idMedico;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "Hospitalizacion{"
		."idIngreso: ".$this->idIngreso." , "
		."observacion: ".$this->observacion." , "
		."fechaHoraIngreso: ".$this->fechaHoraIngreso." , "
		."fechaHoraAlta: ".$this->fechaHoraAlta." , "
		."idPiso: ".$this->idPiso." , "
		."cama: ".$this->cama." , "
		."idMedico: ".$this->idMedico." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdIngreso(){
		return $this->idIngreso;
	}

	public function setIdIngreso($idIngreso){
		$this->idIngreso = $idIngreso;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getFechaHoraIngreso(){
		return $this->fechaHoraIngreso;
	}

	public function setFechaHoraIngreso($fechaHoraIngreso){
		$this->fechaHoraIngreso = to_timestamp($fechaHoraIngreso);
	}
	public function getFechaHoraAlta(){
		return $this->fechaHoraAlta;
	}

	public function setFechaHoraAlta($fechaHoraAlta){
		$this->fechaHoraAlta = to_timestamp($fechaHoraAlta);
	}
	public function getIdPiso(){
		return $this->idPiso;
	}

	public function setIdPiso($idPiso){
		$this->idPiso = $idPiso;
	}
	public function getCama(){
		return $this->cama;
	}

	public function setCama($cama){
		$this->cama = $cama;
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

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function getNoIdentidad(){
		return $this->noIdentidad;
	}

	public function setNoIdentidad($noIdentidad){
		$this->noIdentidad = $noIdentidad;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearHospitalizacion(
		      '%s'
		      ,%s
		      ,%s
		      ,%s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->observacion
		  ,$this->fechaHoraIngreso
		  ,$this->fechaHoraAlta
		  ,$this->idPiso
		  ,$this->cama
		  ,$this->idMedico
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
	
	public function listarPorCentro($conexion){
		$query=sprintf("
		  SELECT  * 
		  FROM VISTAHOSPITALIZACIONES v 
		  WHERE v.ID_CENTRO_MEDICO =%s
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorPaciente($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAHOSPITALIZACIONES v 
		    WHERE v.ID_EXPEDIENTE =%s
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorMedico($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAHOSPITALIZACIONES v 
		    WHERE  v.ID_CENTRO_MEDICO =%s  AND v.ID_MEDICO =%s 
		"
		  ,$this->idCentroMedico
		  ,$this->idMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorPiso($conexion){
		$query=sprintf("
		     SELECT  * 
		     FROM VISTAHOSPITALIZACIONES v 
		     WHERE v.ID_PISO =%s
		"
		  ,$this->idPiso
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	
	public function listarPorPacienteActiva($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAHOSPITALIZACIONES v 
		    WHERE v.NO_IDENTIDAD LIKE '%%%s%%'
		    AND FECHA_HORA_ALTA IS NULL
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function darAlta($conexion){
		$query=sprintf("
		  BEGIN
		    PL_DarAlta(
		      %s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idIngreso
		  ,$this->fechaHoraAlta
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
		    PL_ActualizarHospitalizacion(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,'%s'
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idIngreso
		  ,$this->observacion
		  ,$this->fechaHoraIngreso
		  ,$this->idPiso
		  ,$this->cama
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
	
	public function listarPorFecha($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAHOSPITALIZACIONES v 
		    WHERE v.ID_CENTRO_MEDICO =%s 
		    	AND EXTRACT(DAY FROM V.FECHA_HORA) = EXTRACT(DAY FROM %s)
			 		AND EXTRACT(MONTH FROM V.FECHA_HORA) = EXTRACT(MONTH FROM %s)
			 		AND EXTRACT(YEAR FROM V.FECHA_HORA) = EXTRACT(YEAR FROM %s)
		"
		  ,$this->idCentroMedico
		  ,$this->fechaHoraIngreso
		  ,$this->fechaHoraIngreso
		  ,$this->fechaHoraIngreso
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>