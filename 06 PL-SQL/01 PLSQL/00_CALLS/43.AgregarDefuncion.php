<?php
#43.AgregarDefuncion.sql
# public function ... ($conexion) {...
# Llamada a PL_AgregarDefuncion

$query=sprintf("
  BEGIN
    PL_AgregarDefuncion(
      '%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->observacionCausa
  ,$this->fechaHora
  ,$this->idExpediente
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