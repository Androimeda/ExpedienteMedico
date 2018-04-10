<?php
  include 'class/Conexion.php';
  $con = new Conexion();
  $resultado = $con->query("SELECT * FROM Persona");
  $personas = $con->filas($resultado);
  include "class/Medico.php";
  $d = new Medico();
  $d->setPNombre("Antonio");
  echo $d;
?>
