<?php
include_once('Persona.php');
class Paramedico extends Persona{
	private $idParamedico;
	private $licencia;

	public function __construct(
		$idParamedico = null,
		$licencia = null
	){
		$this->idParamedico = $idParamedico;
		$this->licencia = $licencia;
	}

	public function __toString(){
		$var = parent::__toString();
		$var .= "<br>Paramedico{"
		."idParamedico: ".$this->idParamedico." , "
		."licencia: ".$this->licencia;
		return $var."}";
	}

	public function getIdParamedico(){
		return $this->idParamedico;
	}

	public function setIdParamedico($idParamedico){
		$this->idParamedico = $idParamedico;
	}
	public function getLicencia(){
		return $this->licencia;
	}

	public function setLicencia($licencia){
		$this->licencia = $licencia;
	}

	public function crear($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearParamedico(
		      '%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,%s
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
		  ,$this->correo
		  ,$this->idPais
		  ,$this->licencia
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
	public function eliminar($conexion){
	}
	public function actualizar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_ActualizarParamedico(
		      '%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idParamedico
		  ,$this->direccion
		  ,$this->correo
		  ,$this->licencia
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
	public function listarTodos($conexion){
	}
	public function buscarPorNombre($conexion){
	}
	public function buscarPorApellido($conexion){
	}
	public function buscarPorNoIdentidad($conexion){
	}
}
?>