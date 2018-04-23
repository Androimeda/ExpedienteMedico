<?php
#36.CrearTratamiento.sql
# public function ... ($conexion) {...
# Llamada a PL_crearTratamiento

$query=sprintf("
  BEGIN
    PL_crearTratamiento(
      '%s'
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
  $this->dosis
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