<?php
# public function ... ($conexion) {...
# Llamada a PL_AgregarTelefonoCentro

$query=sprintf("
  BEGIN
    PL_AgregarTelefonoCentro(
      %s
      ,'%s'
      ,%s
      ,%s
      ,:msg
      ,:res
    );
  END;
",
  $this->idCentroMedico
  ,$this->telefono
  ,$this->idTipoTelefono
  ,$this->idPais
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