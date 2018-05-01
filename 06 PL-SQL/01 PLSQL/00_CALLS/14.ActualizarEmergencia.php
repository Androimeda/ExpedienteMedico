<?php
#14.ActualizarEmergencia.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarEmergencia

$query=sprintf("
  BEGIN
    PL_ActualizarEmergencia(
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
  $this->idIngreso
  ,$this->pobservacion
  ,$this->fechaHoraAtencion
  ,$this->idExpediente
  ,$this->idCentroMedico
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