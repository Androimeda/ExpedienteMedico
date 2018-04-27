<?php
#CrearPersona.sql
# public function ... ($conexion) {...
# Llamada a CREATE OR REPLACE FUNCTION FN_CrearPersona

$query=sprintf("
  BEGIN
    CREATE OR REPLACE FUNCTION FN_CrearPersona(
      '%s'
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
  $this->pNombre
  ,$this->sNombre
  ,$this->pApellido
  ,$this->sApellido
  ,$this->direccion
  ,$this->noIdentidad
  ,$this->idPais
  ,$this->sexo
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