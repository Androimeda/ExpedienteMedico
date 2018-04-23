<?php
#42.AgregarNatalidad.sql
# public function ... ($conexion) {...
# Llamada a PL_AgregarNatalidad

$query=sprintf("
  BEGIN
    PL_AgregarNatalidad(
      %s
      ,%s
      ,%s
      ,%s
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idExpediente
  ,$this->fechaHora
  ,$this->ordenPartoMultiple
  ,$this->idCentroMedico
  ,$this->idMadre
  ,$this->idPadre
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