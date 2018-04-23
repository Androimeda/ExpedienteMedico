<?php
#09.ActualizarConsultaExterna.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarConsultaExterna

$query=sprintf("
  BEGIN
    PL_ActualizarConsultaExterna(
      %s
      ,%s
      ,%s
      ,%s
      ,%s
      ,'%s'
      ,'%s'
      ,'%s'
      ,:msg
      ,:res
    );
  END;
",
  $this->idConsulta
  ,$this->idExpediente
  ,$this->idConsultorio
  ,$this->idMedico
  ,$this->fechaHora
  ,$this->psintomas
  ,$this->pdiagnostico
  ,$this->pobservacion
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