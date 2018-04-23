<?php
#28.ActualizarPaciente.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarPaciente

$query=sprintf("
  BEGIN
    PL_ActualizarPaciente(
      %s
      ,'%s'
      ,'%s'
      ,%s
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idPaciente
  ,$this->pdireccion
  ,$this->pcorreo
  ,$this->idEscolaridad
  ,$this->idOcupacion
  ,$this->idEstadoCivil
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