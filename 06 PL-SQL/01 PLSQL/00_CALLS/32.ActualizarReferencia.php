<?php
#32.ActualizarReferencia.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarReferencia

$query=sprintf("
  BEGIN
    PL_ActualizarReferencia(
      %s
      ,'%s'
      ,%s
      ,%s
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idReferencia
  ,$this->pdescripcion
  ,$this->idMedico
  ,$this->idExpediente
  ,$this->idCentroMedicoRemite
  ,$this->idCentroMedicoRecibe
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