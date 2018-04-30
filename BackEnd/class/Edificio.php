<?php
class Edificio{
	private $idEdificio;
	private $nombre;
	private $idCentroMedico;
	private $nombreCentro;
	private $descripcion;
	private $idPiso;

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

	public function getNombreCentro(){
		return $this->nombreCentro;
	}

	public function setNombreCentro($nombreCentro){
		$this->nombreCentro = $nombreCentro;
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
		$query=sprintf("
		    SELECT* 
		    FROM VistaEdificio V 
		    WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE='%s' 
		"
		  ,$this->idCentroMedico
		  ,$this->nombreCentro
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listar($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM VistaEdificio
			WHERE id_edificio = %s
		"
			,$this->idEdificio
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarPiso($conexion){
		$query=sprintf("
		    SELECT * 
		    FROM VistaPiso v 
		    WHERE V.ID_PISO=%s 
		"
		  ,$this->idPiso
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
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
		$query=sprintf("
			UPDATE PISO SET
				descripcion = '%s'
			WHERE id_piso = %s
		",$this->descripcion
		 ,$this->idPiso
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

	public function listarPisos($conexion){
		$query=sprintf("
		    SELECT *
		    FROM VistaEdificioPiso
		    WHERE
		    	ID_CENTRO_MEDICO = %s
		    	AND ID_EDIFICIO = %s
		"
		  ,$this->idCentroMedico
		  ,$this->idEdificio
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
}
?>