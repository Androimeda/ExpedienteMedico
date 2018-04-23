<?php
#41.ActualizarHospitalizacion.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarHospitalizacion

$query=sprintf("
  BEGIN
    PL_ActualizarHospitalizacion(
      %s
      ,'%s'
      ,%s
      ,%s
      ,'%s'
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idIngreso
  ,$this->pobservacion
  ,$this->fechaHoraIngreso
  ,$this->idPiso
  ,$this->pcama
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