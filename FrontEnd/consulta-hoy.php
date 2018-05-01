<?php include("sesion.php") ?>
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
    <!-- Fin Navbar -->
    <div class="container well card">   
        <div class="row">
          <div class="col-lg-12" id="titulo">
            <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
            <h1>Consultas Diarias</h1>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <div class="col-lg-4">
                <input type="text" class="form-control" id="txt-busqueda" placeholder="Búsqueda">
              </div>
              <div class="col-lg-4">
                <select name="slc-filtro-pac" class ="form-control" id="slc-filtro-pac">
                  <option value="" hidden="">Filtro</option>
                  <option value="1">Nombre</option>
                  <option value="2">Apellido</option>
                  <option value="3">No Identidad</option>
                </select>
              </div>
              <div class="col-lg-4">
                <button type="button" class="btn btn-default" onclick="cargaTablaPaciente()">Limpiar</button>
                <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
              </div>
          </div>
        </div>   
        <div class="row">
            <div class="col-lg-12">
                <table class="table" id="tbl-consulta">
                  <thead>
                    <th>Fecha</th>
                    <th>Centro Medico</th>
                    <th>Piso</th>
                    <th>Medico</th>
                    <th>Especialidad</th>
                    <th>Síntomas</th>
                    <th>Diagnostico</th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/consulta-hoy.js"></script>
  </body>
</html>
