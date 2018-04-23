<?php
/*NOOOOOOO BORRRRRARRRRRRRRRRR*/
/*JUST DONT*/
class Persona{
	private $idPersona;
	private $pNombre;
	private $sNombre;
	private $pApellido;
	private $sApellido;
	private $direccion;
	private $noIdentidad;
	private $sexo;
	private $correo;
	private $idPais;

	public function __construct(
		$idPersona = null,
		$pNombre = null,
		$sNombre = null,
		$pApellido = null,
		$sApellido = null,
		$direccion = null,
		$noIdentidad = null,
		$sexo = null,
		$correo = null
	){
		$this->idPersona = $idPersona;
		$this->pNombre = $pNombre;
		$this->sNombre = $sNombre;
		$this->pApellido = $pApellido;
		$this->sApellido = $sApellido;
		$this->direccion = $direccion;
		$this->noIdentidad = $noIdentidad;
		$this->sexo = $sexo;
		$this->correo = $correo;
	}

	public function __toString(){
		$var = "Persona{"
		."idPersona: ".$this->idPersona." , "
		."pNombre: ".$this->pNombre." , "
		."sNombre: ".$this->sNombre." , "
		."pApellido: ".$this->pApellido." , "
		."sApellido: ".$this->sApellido." , "
		."direccion: ".$this->direccion." , "
		."noIdentidad: ".$this->noIdentidad." , "
		."sexo: ".$this->sexo." , "
		."correo: ".$this->correo;
		return $var."}";
	}

	public function getIdPersona(){
		return $this->idPersona;
	}

	public function setIdPersona($idPersona){
		$this->idPersona = $idPersona;
	}
	public function getPNombre(){
		return $this->pNombre;
	}

	public function setPNombre($pNombre){
		$this->pNombre = $pNombre;
	}
	public function getSNombre(){
		return $this->sNombre;
	}

	public function setSNombre($sNombre){
		$this->sNombre = $sNombre;
	}
	public function getPApellido(){
		return $this->pApellido;
	}

	public function setPApellido($pApellido){
		$this->pApellido = $pApellido;
	}
	public function getSApellido(){
		return $this->sApellido;
	}

	public function setSApellido($sApellido){
		$this->sApellido = $sApellido;
	}
	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function getNoIdentidad(){
		return $this->noIdentidad;
	}

	public function setNoIdentidad($noIdentidad){
		$this->noIdentidad = $noIdentidad;
	}
	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getIdPais(){
		return $this->idPais;
	}

	public function setIdPais($idPais){
		$this->idPais = $idPais;
	}

	public function listarPais($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM PAIS
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarEstadoCivil($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM ESTADOCIVIL
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarEscolaridad($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM ESCOLARIDAD
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarAscendencia($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM ASCENDENCIA
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarTipoSangre($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM TIPOSANGRE
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}
	public function listarOcupacion($conexion){
		$query=sprintf("
			SELECT
			  *
			FROM OCUPACION
		"
		);
		$resultado = $conexion->query($query);
		$respuesta = $conexion->filas($resultado);
		return json_encode($respuesta);
	}

}
?>