<?php
class Consultorio{
	private $idConsultorio;
	private $idPiso;
	private $nombreCentro;
	private $idCentroMedico;
	private $idMedico;

	public function __construct(
		$idConsultorio = null,
		$idPiso = null
	){
		$this->idConsultorio = $idConsultorio;
		$this->idPiso = $idPiso;
	}

	public function __toString(){
		$var = "Consultorio{"
		."idConsultorio: ".$this->idConsultorio." , "
		."idPiso: ".$this->idPiso;
		return $var."}";
	}

	public function getIdConsultorio(){
		return $this->idConsultorio;
	}

	public function setIdConsultorio($idConsultorio){
		$this->idConsultorio = $idConsultorio;
	}
	public function getIdPiso(){
		return $this->idPiso;
	}

	public function setIdPiso($idPiso){
		$this->idPiso = $idPiso;
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

	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_PL_CrearConsultorio(
		      %s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idPiso
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
	public function listarPorPiso($conexion){
		$query=sprintf("
		    SELECT *  
		    FROM VistaConsultorio V  
		    WHERE V.ID_PISO=%s  
		"
		  ,$this->idPiso
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorCentro($conexion){
		$query=sprintf("
		   SELECT* 
		   FROM VistaConsultorio V 
		   WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s'
		"
		  ,$this->idCentroMedico
		  ,$this->nombreCentro
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPorMedico($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaConsultorio V 
		    WHERE  V.ID_MEDICO =%s 
		"
		  ,$this->idMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function vincularMedico($conexion){
	}

}
?>