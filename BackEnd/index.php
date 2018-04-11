<?php
  include 'class/Conexion.php';
  $con = new Conexion();
  $resultado = $con->query("SELECT * FROM Persona");
  $personas = $con->filas($resultado);
  var_dump($personas);
?>
