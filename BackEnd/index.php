<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="../FrontEnd/js/jquery.min.js"></script>
</head>
<body>
  
</body>
</html>
<?php
include_once('./class/Conexion.php');
session_start();
$query = "
BEGIN  
PL_Login('elmeroqueso@gmail.com','11', :data, :msj, :res);
END;
";
$conexion = new Conexion();
$result = $conexion->query($query);
$data = $conexion->getCursor();
oci_bind_by_name($result, ':data', $data, -1, OCI_B_CURSOR);
oci_bind_by_name($result, ':msj', $msj, 2000);
oci_bind_by_name($result, ':res', $res);
oci_execute($result);
// 
if($res==1){
  oci_execute($data);
  $usuario = oci_fetch_array($data, OCI_ASSOC + OCI_RETURN_NULLS);
  oci_free_cursor($data);
  oci_free_statement($result);
  $_SESSION['usuario'] = $usuario;
  echo json_encode($usuario);
}
$respuesta['resultado'] = $res;
$respuesta['mensaje'] = $msj;
// echo json_encode($respuesta);
?>