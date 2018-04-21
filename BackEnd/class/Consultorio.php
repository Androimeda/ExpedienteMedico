<?php
class Consultorio{
	private $idConsultorio;
	private $idPiso;

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
	}
	public function listarPorCentro($conexion){
	}
	public function listarPorMedico($conexion){
	}
	public function actualizar($conexion){
	}
	public function vincularMedico($conexion){
	}

}
?>