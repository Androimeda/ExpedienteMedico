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
    <input type="hidden" value="<?php echo $user["ID_CENTRO_MEDICO"];?>" id="txt-id-centro-medico">
    <div class="container well card">   
        <div class="row">
          <div class="col-lg-12" id="titulo">
            <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
            <h1>Consultas Diarias</h1>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <div class="col-lg-3">
                <select class ="form-control" id="slc-edificio">
                  <option value="" hidden="">Edificio</option>
                </select>
              </div>
              <div class="col-lg-3">
                <select class ="form-control" id="slc-piso">
                  <option value="" hidden="">Piso</option>
                </select>
              </div>              
              <div class="col-lg-3">
                <select class ="form-control" id="slc-consultorio">
                  <option value="" hidden="">Consultorio</option>
                </select>
              </div>
              <div class="col-lg-3">
                <button type="button" class="btn btn-default" onclick="cargaTabla()">Limpiar</button>
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
                    <th>Nombre</th>
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
        <div class="row">
            <div class="col-lg-12">
                <a href="agregar-consulta.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> &nbsp; Agregar Consulta</a>
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/consulta-hoy.js"></script>
  </body>
</html>
