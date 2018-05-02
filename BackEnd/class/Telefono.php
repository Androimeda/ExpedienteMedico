<?php
class Telefono{
	private $idTelefono;
	private $telefono;
	private $idTipoTelefono;
	private $idPais;
	private $idPersona;
	private $idCentroMedico;
	private $nombreCentro;
	private $pNombre;
	private $pApellido;
	private $noIdentidad;
	private $tipoTelefono;

	public function __construct(
		$idTelefono = null,
		$telefono = null,
		$idTipoTelefono = null,
		$idPais = null
	){
		$this->idTelefono = $idTelefono;
		$this->telefono = $telefono;
		$this->idTipoTelefono = $idTipoTelefono;
		$this->idPais = $idPais;
	}

	public function __toString(){
		$var = "Telefono{"
		."idTelefono: ".$this->idTelefono." , "
		."telefono: ".$this->telefono." , "
		."idTipoTelefono: ".$this->idTipoTelefono." , "
		."idPais: ".$this->idPais;
		return $var."}";
	}

	public function getIdTelefono(){
		return $this->idTelefono;
	}

	public function setIdTelefono($idTelefono){
		$this->idTelefono = $idTelefono;
	}
	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	public function getIdTipoTelefono(){
		return $this->idTipoTelefono;
	}

	public function setIdTipoTelefono($idTipoTelefono){
		$this->idTipoTelefono = $idTipoTelefono;
	}
	public function getIdPais(){
		return $this->idPais;
	}

	public function setIdPais($idPais){
		$this->idPais = $idPais;
	}

	public function getIdPersona(){
		return $this->idPersona;
	}

	public function setIdPersona($idPersona){
		$this->idPersona = $idPersona;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}

	public function getNombreCentro(){
		return $this->nombreCentro;
	}

	public function setNombreCentro($nombreCentro){
		$this->nombreCentro = $nombreCentro;
	}

	public function getPNombre(){
		return $this->pNombre;
	}

	public function setPNombre($pNombre){
		$this->pNombre = $pNombre;
	}
	public function getPApellido(){
		return $this->pApellido;
	}

	public function setPApellido($pApellido){
		$this->pApellido = $pApellido;
	}
	public function getNoIdentidad(){
		return $this->noIdentidad;
	}

	public function setNoIdentidad($noIdentidad){
		$this->noIdentidad = $noIdentidad;
	}

	public function getTipoTelefono(){
		return $this->tipoTelefono;
	}

	public function setTipoTelefono($tipoTelefono){
		$this->tipoTelefono = $tipoTelefono;
	}

	public function listarPorPersona($conexion){
	}
	public function listarPorCentroMedico($conexion){
	}
	public function agregarTelefonoPersona($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarTelefonoPersona(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idPersona
		  ,$this->telefono
		  ,$this->idTipoTelefono
		  ,$this->idPais
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
	public function agregarTelefonoCentro($conexion){
		$query=sprintf("
		  BEGIN
		    PL_AgregarTelefonoCentro(
		      %s
		      ,'%s'
		      ,%s
		      ,%s
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  $this->idCentroMedico
		  ,$this->telefono
		  ,$this->idTipoTelefono
		  ,$this->idPais
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
	public function buscarPorPersona($conexion){
		$query=sprintf("
		     SELECT p.NO_IDENTIDAD ,p.p_nombre || ' ' || p.s_nombre || ' ' || p.p_apellido || ' ' || p.s_apellido as nombre ,v.* 
		     FROM VistaTelefonoPersona v INNER JOIN PERSONA p  ON v.ID_PERSONA = p.ID_PERSONA 
		     WHERE  p.NO_IDENTIDAD = '%s'  OR LOWER(p.P_NOMBRE) LIKE '%s'  OR LOWER(p.P_APELLIDO) LIKE '%s' 
		"
		  ,$this->noIdentidad
		  ,$this->pNombre
		  ,$this->pApellido
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function buscarPorCentro($conexion){
		$query=sprintf("
		     SELECT v.* 
		     FROM VistaTelefonoCentroMedico v
		     WHERE  v.ID_CENTRO_MEDICO = %s
		"
		  ,$this->idCentroMedico
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function eliminarDePersona($conexion){
		$query=sprintf("
			DELETE FROM TELEFONOPERSONA
			WHERE ID_PERSONA =%s AND ID_TELEFONO =%s
		"
			,$this->idPersona
			,$this->idTelefono
		);
		$resultado = $conexion->query($query);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Actualizado exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo actualizar tipo';
		}
		return json_encode($respuesta);
	}
	public function eliminarDeCentro($conexion){
		$query=sprintf("
			DELETE FROM TELEFONOCENTROMEDICO
			WHERE ID_CENTRO_MEDICO =%s AND ID_TELEFONO =%s;
		"
			,$this->idCentroMedico
			,$this->idTelefono
		);
		$resultado = $conexion->query($query);
		$respuesta["resultado"]= $res;
		if($res==true){
			$respuesta["mensaje"]='Actualizado exitosamente';
		}else{
			$respuesta["mensaje"]='No se pudo actualizar tipo';
		}
		return json_encode($respuesta);
	}
	public function agregarTipoTelefono($conexion){
		$query=sprintf("
			INSERT INTO TIPOTELEFONO
			(tipo_telefono) VALUES('%s')
		",$this->tipoTelefono
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
	
	public function listarTipoTelefono($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM TIPOTELEFONO
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

	public function actualizarTipoTelefono($conexion){
	}

}
?>