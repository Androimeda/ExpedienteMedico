<?php
class Telefono{
	private $idTelefono;
	private $telefono;
	private $idTipoTelefono;
	private $idPais;
	private $idPersona;
	private $idCentroMedico;

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
	}
	public function buscarPorCentro($conexion){
	}
	public function eliminarDePersona($conexion){
	}
	public function eliminarDeCentro($conexion){
	}
	public function agregarTipoTelefono($conexion){
	}
	public function listarTipoTelefono($conexion){
	}
	public function actualizarTipoTelefono($conexion){
	}

}
?>