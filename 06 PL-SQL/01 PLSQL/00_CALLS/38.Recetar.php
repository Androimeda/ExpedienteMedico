<?php
#38.Recetar.sql
# public function ... ($conexion) {...
# Llamada a PL_Recetar

$query=sprintf("
  BEGIN
    PL_Recetar(
      %s
      ,'%s'
      ,'%s'
      ,'%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idConsulta
  ,$this->dosis
  ,$this->intervaloTiempo
  ,$this->duracionTratamiento
  ,$this->idTipoTratamiento
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