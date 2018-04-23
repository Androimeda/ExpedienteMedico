<?php
#39.ActualizarReceta.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarReceta

$query=sprintf("
  BEGIN
    PL_ActualizarReceta(
      %s
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idTratamiento
  ,$this->idConsulta
  ,$this->idMedico
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