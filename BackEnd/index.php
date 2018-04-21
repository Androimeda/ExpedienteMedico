<?php
# public function ... ($conexion) {...
# Llamada a PL_CrearCentroMedico
include_once("./class/Conexion.php");
$conexion=new Conexion();
$query=sprintf("
  BEGIN
    PL_AgregarPiso(
      %s
      ,'%s'
      ,:msg
      ,:res
    );
  END;
",
  1
  ,"Tortillas"
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