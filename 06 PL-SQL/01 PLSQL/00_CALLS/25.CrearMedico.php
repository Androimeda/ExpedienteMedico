<?php
#25.CrearMedico.sql
# public function ... ($conexion) {...
# Llamada a PL_CrearMedico

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