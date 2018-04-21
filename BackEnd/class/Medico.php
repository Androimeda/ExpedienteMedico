<?php
include_once('Persona.php');
class Medico extends Persona{
	private $noColegiacion;
	private $idEspecialidad;
	private $idMedico;

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
	}
	public function buscarPorNombre($conexion){
	}
	public function buscarPorApellido($conexion){
	}
	public function buscarPorNoIdentidad($conexion){
	}
}
?>