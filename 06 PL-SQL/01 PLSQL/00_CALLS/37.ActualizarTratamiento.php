<?php
#37.ActualizarTratamiento.sql
# public function ... ($conexion) {...
# Llamada a PL_ActualizarTratamiento

$query=sprintf("
  BEGIN
    PL_ActualizarTratamiento(
      %s
      ,'%s'
      ,'%s'
      ,%s
      ,'%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idTratamiento
  ,$this->pdosis
  ,$this->intervaloTiempo
  ,$this->fechaInicio
  ,$this->duracionTratamiento
  ,$this->idTipo
  ,$this->idViaSuministro
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