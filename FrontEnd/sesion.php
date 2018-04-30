<?php 
 session_start();
 
  if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];
  }else{
   header('location: login.php');
  }
?>