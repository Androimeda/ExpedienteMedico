<?php
#18.QuitarDiagnostico.sql
# public function ... ($conexion) {...
# Llamada a PL_QuitarDiagnostico

$query=sprintf("
  BEGIN
    PL_QuitarDiagnostico(
      %s
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idEnfermedad
  ,$this->idExpediente
  ,$this->idConsulta
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