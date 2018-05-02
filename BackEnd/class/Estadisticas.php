<?php
class Estadisticas{
	private $idCentroMedico;

	public function __construct(
		$idCentroMedico = null
	){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function __toString(){
		$var = "Estadisticas{"
		."idCentroMedico: ".$this->idCentroMedico;
		return $var."}";
	}

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function centros($conexion){
		$query=sprintf("
		  SELECT  COUNT(*) as total
		  FROM CENTROMEDICO V 
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function medicos($conexion){
		$query=sprintf("
		  SELECT  COUNT(*) as total
		  FROM VISTAMEDICO
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function pacienteMax($conexion){
		$query=sprintf("
		  WITH TOTALES_CONSULTA
		  AS (
		  SELECT
		      ID_EXPEDIENTE,
		      COUNT(*) AS total
		  FROM CONSULTAEXTERNA
		  GROUP BY
		      ID_EXPEDIENTE
		  )
		  SELECT
		      *
		  FROM TOTALES_CONSULTA tc
		  INNER JOIN VISTAPACIENTE v
		      ON v.ID_EXPEDIENTE = tc.ID_EXPEDIENTE
		  WHERE total = (
		  SELECT
		      MAX(total)
		  FROM TOTALES_CONSULTA
		  )
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>