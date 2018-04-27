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
   <div class="container" id="centro-head">
     <div class="col-lg-4"></div>
     <div class="col-lg-4"></div>
     <div class="col-lg-4">
       <div class="row">LORE</div>
       <div class="row">LORE</div>
       <div class="row">LORE</div>
     </div>
    </div>
    <!-- Fin Navbar -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12" id="titulo">
          <h2>Pacientes</h2>
          <h2>Hospital Escuela Universitario</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-4">
            <table class="table borderless">
              <td>
                <td><label>Buscar:</label></td>
                <td><input type="text" class="form-control" id="txt-paciente"></td>
              </tr>
            </table>
          </div>
          <div class="col-lg-4">
            <table class="table borderless">
              <td>
                <td><label>Buscar:</label></td>
                <td><input type="text" class="form-control" id="txt-paciente"></td>
              </tr>
            </table>
          </div>
          <div class="col-lg-4">
            <table class="table borderless">
              <td>
                <td><label>Buscar:</label></td>
                <td><input type="text" class="form-control" id="txt-paciente"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row"></div>
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
      </div>   
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/vue.min.js  "></script>
    <script src="./js/config.js  "></script>
    <script src="controlador/admin-paciente.js"></script>
  </body>
</html>
