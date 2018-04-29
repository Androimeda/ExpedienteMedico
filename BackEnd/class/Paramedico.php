<?php
class Paramedico extends Persona{
	private $idParamedico;
	private $licencia;
	private $idCentroMedico;

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

	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
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
		  $this->getPNombre()
		  ,$this->getSNombre()
		  ,$this->getPApellido()
		  ,$this->getSApellido()
		  ,$this->getDireccion()
		  ,$this->getSexo()
		  ,$this->getNoIdentidad()
		  ,$this->getCorreo()
		  ,$this->getIdPais()
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
		  ,$this->getDireccion()
		  ,$this->getCorreo()
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
		$query=sprintf("
		    SELECT  * 
		    FROM VistaParamedico v 
		    WHERE v.ID_PARAMEDICO =%s
		"
		  ,$this->idParamedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function listarTodos($conexion){
		$query=sprintf("
		     SELECT DISTINCT v.* 
		     FROM VistaParamedico v INNER JOIN ATENCIONPREHOSPITALARIA a  ON a.ID_PARAMEDICO = v.ID_PARAMEDICO INNER JOIN AMBULANCIA amb  ON a.ID_AMBULANCIA = amb.ID_AMBULANCIA INNER JOIN CENTROMEDICO c  ON amb.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO 
		     WHERE c.ID_CENTRO_MEDICO =%s 
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function buscarPorNombre($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaParamedico v 
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
		    FROM VistaParamedico v 
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
		    FROM VistaParamedico v 
		    WHERE  v.NO_IDENTIDAD = '%s' 
		"
		  ,$this->getNoIdentidad()
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}	
	public function buscarPorLicencia($conexion){
		$query=sprintf("
		    SELECT  * 
		    FROM VistaParamedico v 
		    WHERE  v.LICENCIA = '%s' 
		"
		  ,$this->licencia
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
}
?>