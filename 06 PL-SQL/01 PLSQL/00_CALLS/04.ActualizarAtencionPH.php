<?php
#04.ActualizarAtencionPH.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarAtencionPH

$query=sprintf("
  BEGIN
    PL_ActualizarAtencionPH(
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
  $this->idAtencion
  ,$this->pobservacion
  ,$this->fechaHoraAtencion
  ,$this->idParamedico
  ,$this->idAmbulancia
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