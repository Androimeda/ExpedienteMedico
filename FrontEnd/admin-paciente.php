<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];
  }else{
    echo "No has iniciado sesion";
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <title>Hope Medics</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <!-- Fixed navbar -->
    <?php include("nav-bar.php") ?>
   <div class="container">
     <div class="row">
       <div class="col-lg-8 col-lg-offset-8"></div>
       <div class="col-lg-4 well card" id="card-info">
        <p>Centro Médico: <?php  ?></p>
        <p>Dirección: </p>
        <p>Teléfono: </p>
       </div>
     </div>
    </div>
    <!-- Fin Navbar -->
    <div class="container well card">
      <div class="row">
        <div class="col-lg-12" id="titulo">
          <h1>Pacientes</h1>
          <h1>Hospital Escuela Universitario</h1>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4">
              <input type="text" class="form-control" id="txt-paciente" placeholder="Búsqueda">
            </div>
            <div class="col-lg-4">
              <select name="slc-filtro-pac" class ="form-control" id="slc-filtro-pac">
                <option value="" hidden="">Filtro</option>
              </select>
            </div>
            <div class="col-lg-4">
              <button type="button" class="btn btn-primary">Buscar</button>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped">
            <thead>
              <th>No expediente</th>
              <th>Fecha creación</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>No identidad</th>
              <th>Sexo</th>
              <th>Direccion</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              <tr>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
              </tr>
              <tr>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
              </tr>
              <tr>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
                <td>Lorem</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/vue.min.js  "></script>
    <script src="./js/config.js  "></script>
    <script src="controlador/admin-paciente.js"></script>
  </body>
</html>
