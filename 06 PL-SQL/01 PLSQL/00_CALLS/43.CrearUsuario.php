<?php
#43.CrearUsuario.sql
# public function ... ($conexion) {...
# Llamada a PL_CrearUsuario

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
  $this->contrasena
  ,$this->idTipoUsuario
  ,$this->idTipoCentroMedico
  ,$this->cnombre
  ,$this->cdIreccion
  ,$this->pNombre
  ,$this->sNombre
  ,$this->pApellido
  ,$this->sApellido
  ,$this->direccion
  ,$this->noIdentidad
  ,$this->idPais
  ,$this->sexo
  ,$this->pcorreo
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

?>