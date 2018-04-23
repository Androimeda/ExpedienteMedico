<?php
#19.CrearExamen.sql
# public function ... ($conexion) {...
# Llamada a PL_CrearExamen

$query=sprintf("
  BEGIN
    PL_CrearExamen(
      '%s'
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
  $this->urlDocumento
  ,$this->idTipo
  ,$this->idCentroMedico
  ,$this->observacion
  ,$this->idExpediente
  ,$this->fecha
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