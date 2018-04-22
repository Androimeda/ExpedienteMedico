<?php
include_once('Persona.php');
class Medico extends Persona{
	private $noColegiacion;
	private $idEspecialidad;
	private $idMedico;
	private $idCentroMedico;

	public function __construct(
		$noColegiacion = null,
		$idEspecialidad = null,
		$idMedico = null
	){
		$this->noColegiacion = $noColegiacion;
		$this->idEspecialidad = $idEspecialidad;
		$this->idMedico = $idMedico;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>"."Medico{"
		."noColegiacion: ".$this->noColegiacion." , "
		."idEspecialidad: ".$this->idEspecialidad." , "
		."idMedico: ".$this->idMedico;
		return $var."}";
	}

	public function getNoColegiacion(){
		return $this->noColegiacion;
	}

	public function setNoColegiacion($noColegiacion){
		$this->noColegiacion = $noColegiacion;
	}
	public function getidEspecialidad(){
		return $this->idEspecialidad;
	}

	public function setidEspecialidad($idEspecialidad){
		$this->idEspecialidad = $idEspecialidad;
	}
	public function getIdMedico(){
		return $this->idMedico;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
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
		    PL_CrearMedico(
		      '%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->pNombre
		  ,$this->sNombre
		  ,$this->pApellido
		  ,$this->sApellido
		  ,$this->direccion
		  ,$this->sexo
		  ,$this->noIdentidad
		  ,$this->idPais
		  ,$this->idEspecialidad
		  ,$this->noColegiacion
		  ,$this->correo
		);
	}
	public function listarTodos($conexion){
		$query=sprintf("
		  SELECT DISTINCT  e.ID_CENTRO_MEDICO,  v.* 
		  FROM VISTAMEDICO v INNER JOIN MEDICOCONSULTORIO mc  ON mc.ID_MEDICO = v.ID_MEDICO INNER JOIN CONSULTORIO c  ON c.ID_CONSULTORIO = mc.ID_CONSULTORIO INNER JOIN PISO p  ON p.ID_PISO = c.ID_PISO INNER JOIN EDIFICIO e  ON e.ID_EDIFICIO = p.ID_PISO 
		  WHERE  e.ID_CENTRO_MEDICO =%s ORDER BY v.ESPECIALIDAD 
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
		    PL_ActualizarMedico(
		      %s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idMedico
		  ,$this->direccion
		  ,$this->idEspecialidad
		  ,$this->noColegiacion
		  ,$this->correo
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
	
	public function listar($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAMEDICO v 
		    WHERE v.ID_MEDICO =%s
		"
		  ,$this->idMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function buscarPorNombre($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAMEDICO v 
		    WHERE  v.P_NOMBRE = '%s'  OR v.S_NOMBRE = '%s' 
		"
		  ,$this->pNombre
		  ,$this->sNombre
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function buscarPorApellido($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAMEDICO v 
		    WHERE  v.P_APELLIDO = '%s'  OR v.S_APELLIDO = '%s' 
		"
		  ,$this->pApellido
		  ,$this->sApellido
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function buscarPorNoIdentidad($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VISTAMEDICO v 
		    WHERE  v.NO_IDENTIDAD = '%s' 
		"
		  ,$this->noIdentidad
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
}
?>