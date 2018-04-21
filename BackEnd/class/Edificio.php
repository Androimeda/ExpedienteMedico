<?php
class Edificio{
	private $idEdificio;
	private $nombre;
	private $idCentroMedico;
	private $descripcion;

	public function __construct(
		$idEdificio = null,
		$nombre = null,
		$idCentroMedico = null
	){
		$this->idEdificio = $idEdificio;
		$this->nombre = $nombre;
		$this->idCentroMedico = $idCentroMedico;
	}

	public function __toString(){
		$var = "Edificio{"
		."idEdificio: ".$this->idEdificio." , "
		."nombre: ".$this->nombre." , "
		."idCentroMedico: ".$this->idCentroMedico;
		return $var."}";
	}

	public function getIdEdificio(){
		return $this->idEdificio;
	}

	public function setIdEdificio($idEdificio){
		$this->idEdificio = $idEdificio;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearEdificio(
		      '%s'
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->nombre
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
	public function listarPorCentro($conexion){
	}
	public function listar($conexion){
	}
	public function actualizar($conexion){
	}
	public function listarPiso($conexion){
	}
	public function agregarPiso($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarPiso(
		      %s
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idEdificio
		  ,$this->descripcion
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
	public function actualizarPiso($conexion){
	}

}
?>