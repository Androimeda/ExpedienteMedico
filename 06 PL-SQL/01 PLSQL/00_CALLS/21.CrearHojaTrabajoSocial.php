<?php
#21.CrearHojaTrabajoSocial.sql
# public function ... ($conexion) {...
# Llamada a PL_CrearHojaTrabajoSocial

$query=sprintf("
  BEGIN
    PL_CrearHojaTrabajoSocial(
      '%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->descripcion
  ,$this->idExpediente
  ,$this->idCentroMedico
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