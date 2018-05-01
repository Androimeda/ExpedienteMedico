<?php
class AtencionPreHospitalaria{
	private $idAtencion;
	private $observacion;
	private $idParamedico;
	private $idAmbulancia;
	private $idExpediente;
	private $nombreCentro;
	private $idCentroMedico;

	public function __construct(
		$idAtencion = null,
		$observacion = null,
		$idParamedico = null,
		$idAmbulancia = null,
		$idExpediente = null
	){
		$this->idAtencion = $idAtencion;
		$this->observacion = $observacion;
		$this->idParamedico = $idParamedico;
		$this->idAmbulancia = $idAmbulancia;
		$this->idExpediente = $idExpediente;
	}

	public function __toString(){
		$var = "AtencionPreHospitalaria{"
		."idAtencion: ".$this->idAtencion." , "
		."observacion: ".$this->observacion." , "
		."idParamedico: ".$this->idParamedico." , "
		."idAmbulancia: ".$this->idAmbulancia." , "
		."idExpediente: ".$this->idExpediente;
		return $var."}";
	}

	public function getIdAtencion(){
		return $this->idAtencion;
	}

	public function setIdAtencion($idAtencion){
		$this->idAtencion = $idAtencion;
	}
	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}
	public function getIdParamedico(){
		return $this->idParamedico;
	}

	public function setIdParamedico($idParamedico){
		$this->idParamedico = $idParamedico;
	}
	public function getIdAmbulancia(){
		return $this->idAmbulancia;
	}

	public function setIdAmbulancia($idAmbulancia){
		$this->idAmbulancia = $idAmbulancia;
	}
	public function getIdExpediente(){
		return $this->idExpediente;
	}

	public function setIdExpediente($idExpediente){
		$this->idExpediente = $idExpediente;
	}

	public function getNombreCentro(){
		return $this->nombreCentro;
	}

	public function setNombreCentro($nombreCentro){
		$this->nombreCentro = $nombreCentro;
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function getPNombre(){
		return $this->pNombre;
	}

	public function setPNombre($pNombre){
		$this->pNombre = $pNombre;
	}
	public function getSNombre(){
		return $this->sNombre;
	}

	public function setSNombre($sNombre){
		$this->sNombre = $sNombre;
	}
	public function getPApellido(){
		return $this->pApellido;
	}

	public function setPApellido($pApellido){
		$this->pApellido = $pApellido;
	}
	public function getSApellido(){
		return $this->sApellido;
	}

	public function setSApellido($sApellido){
		$this->sApellido = $sApellido;
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
		    PL_CrearAtencionPH(
		      '%s'
		      ,%s
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->observacion
		  ,$this->idParamedico
		  ,$this->idAmbulancia
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
	public function listarPorPaciente($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM vistaAPH v 
		   WHERE v.ID_EXPEDIENTE =%s
		"
		  ,$this->idExpediente
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorCentroMedico($conexion){
		$query=sprintf("
		   SELECT  * 
		   FROM vistaAPH V 
		   WHERE   V.NOMBRE='%s' OR V.ID_CENTRO_MEDICO=%s 
		"
		  ,$this->nombreCentro
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorCentroFecha($conexion){
		$query=sprintf("
		   SELECT
		     *
		   FROM VISTAAPH V
		   WHERE ID_CENTRO_MEDICO = %s
		   AND EXTRACT(DAY FROM V.FECHA_HORA_ATENCION) = EXTRACT(DAY FROM %s)
		   AND EXTRACT(MONTH FROM V.FECHA_HORA_ATENCION) = EXTRACT(MONTH FROM %s)
		   AND EXTRACT(YEAR FROM V.FECHA_HORA_ATENCION) = EXTRACT(YEAR FROM %s)
		   ;
		"
		  ,$this->idCentroMedico
		  ,$this->fechaHoraAtencion
		  ,$this->fechaHoraAtencion
		  ,$this->fechaHoraAtencion
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}	

	public function buscarPorNombre($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAAPH v 
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
		    FROM VISTAAPH v 
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
		    FROM VISTAAPH v 
		    WHERE  v.NO_IDENTIDAD LIKE '%%%s%%'
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}


	public function listarPorCentroDiarias($conexion){
		$query=sprintf("
		   SELECT
		     *
		   FROM VISTAAPH V
		   WHERE ID_CENTRO_MEDICO = %s
		   AND EXTRACT(DAY FROM V.FECHA_HORA_ATENCION) = EXTRACT(DAY FROM SYSDATE)
		   AND EXTRACT(MONTH FROM V.FECHA_HORA_ATENCION) = EXTRACT(MONTH FROM SYSDATE)
		   AND EXTRACT(YEAR FROM V.FECHA_HORA_ATENCION) = EXTRACT(YEAR FROM SYSDATE)
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarPorParamedico($conexion){
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarAtencionPH(
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
		  $this->idAtencion
		  ,$this->observacion
		  ,$this->fechaHoraAtencion
		  ,$this->idParamedico
		  ,$this->idAmbulancia
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