<?php
class Usuario extends Persona{
	private $idUsuario;
	private $correo;
	private $contrasena;
	private $idCentroMedico;
	private $idTipoUsuario;
	private $idTipoCentroMedico;
	private $permisos;
	private $nombreCentroMedico;
	private $direccionCentroMedico;

	public function __construct(
		$idUsuario = null,
		$correo = null,
		$contrasena = null,
		$idCentroMedico = null,
		$idTipoUsuario = null,
		$permisos = null
	){
		$this->idUsuario = $idUsuario;
		$this->correo = $correo;
		$this->contrasena = $contrasena;
		$this->idCentroMedico = $idCentroMedico;
		$this->idTipoUsuario = $idTipoUsuario;
		$this->permisos = $permisos;
	}

	public function __toString(){
		$var = "Usuario{"
		."idUsuario: ".$this->idUsuario." , "
		."correo: ".$this->correo." , "
		."contrasena: ".$this->contrasena." , "
		."idCentroMedico: ".$this->idCentroMedico." , "
		."idTipoUsuario: ".$this->idTipoUsuario." , "
		."permisos: ".$this->permisos;
		return $var."}";
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}
	public function getIdCentroMedico(){
		return $this->idCentroMedico;
	}

	public function setIdCentroMedico($idCentroMedico){
		$this->idCentroMedico = $idCentroMedico;
	}
	public function getIdTipoUsuario(){
		return $this->idTipoUsuario;
	}

	public function setIdTipoUsuario($idTipoUsuario){
		$this->idTipoUsuario = $idTipoUsuario;
	}
	public function getPermisos(){
		return $this->permisos;
	}

	public function setPermisos($permisos){
		$this->permisos = $permisos;
	}

	public function getNombreCentroMedico(){
		return $this->nombreCentroMedico;
	}

	public function setNombreCentroMedico($nombreCentroMedico){
		$this->nombreCentroMedico = $nombreCentroMedico;
	}
	public function getDireccionCentroMedico(){
		return $this->direccionCentroMedico;
	}

	public function setDireccionCentroMedico($direccionCentroMedico){
		$this->direccionCentroMedico = $direccionCentroMedico;
	}

	public function getIdTipoCentroMedico(){
		return $this->idTipoCentroMedico;
	}

	public function setIdTipoCentroMedico($idTipoCentroMedico){
		$this->idTipoCentroMedico = $idTipoCentroMedico;
	}


	public function login($conexion){
		$query=sprintf("
		  BEGIN
		    PL_Login('%s','%s', :data, :msj, :res);
		  END;
		",
		  $this->getCorreo()
		  ,hash("sha512",$this->contrasena)
		); 
		$result = $conexion->query($query);
		$data = $conexion->getCursor();
		oci_bind_by_name($result, ':data', $data, -1, OCI_B_CURSOR);
		oci_bind_by_name($result, ':msj', $msj, 2000);
		oci_bind_by_name($result, ':res', $res);
		oci_execute($result);

		if($res==1){
		  oci_execute($data);
		  $usuario = oci_fetch_array($data, OCI_ASSOC + OCI_RETURN_NULLS);
		  oci_free_cursor($data);
		  oci_free_statement($result);
		  session_start();
		  $_SESSION['usuario'] = $usuario;
		}
		$respuesta['resultado'] = $res;
		$respuesta['mensaje'] = $msj;
		return json_encode($respuesta);
	}

	public function registrar($conexion){
		$query=sprintf("
		  BEGIN
		    PL_CrearUsuario(
		      '%s'
		      ,%s
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,'%s'
		      ,%s
		      ,'%s'
		      ,'%s'
		      ,:msg
		      ,:res
		    );
		  END;
		",
		  hash("sha512",$this->contrasena)
		  ,$this->idTipoUsuario
		  ,$this->idTipoCentroMedico
		  ,$this->nombreCentroMedico
		  ,$this->direccionCentroMedico
		  ,$this->getPNombre()
		  ,$this->getSNombre()
		  ,$this->getPApellido()
		  ,$this->getSApellido()
		  ,$this->getDireccion()
		  ,$this->getNoIdentidad()
		  ,$this->getIdPais()
		  ,$this->getSexo()
		  ,$this->getCorreo()
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

	public function listarTipos($conexion){
		$query=sprintf("
		  SELECT  * 
		  FROM TIPOUSUARIO
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>