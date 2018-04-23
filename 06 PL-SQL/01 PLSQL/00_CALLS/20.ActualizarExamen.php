<?php
#20.ActualizarExamen.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarExamen

$query=sprintf("
  BEGIN
    PL_ActualizarExamen(
      %s
      ,'%s'
      ,%s
      ,%s
      ,'%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idExamen
  ,$this->urlDocumento
  ,$this->idTipo
  ,$this->idCentroMedico
  ,$this->pobservacion
  ,$this->idExpediente
  ,$this->pfecha
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