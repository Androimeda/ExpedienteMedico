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
    <div class="container">   
        <div class="row">
            <div class="col-lg-8 well card">
                <h4>Buscar Expediente</h4>
                <table class="table">
                    <tr>
                        <td>No de indentidad</td>
                        <td><input type="text" placeholder="Ingresar" class="form-control" id="txt-noidentidad"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-default" onclick="limpiar()">Limpiar</button>
                            <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
                        </td>
                    </tr>
                </table>

                <table class="table" id="tbl-resultado">
                    <thead>
                        <th>Expediente</th>
                        <th>Nombre</th>
                        <th>No Identidad</th>
                        <th>Ver Expediente</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-lg-12 well card sector-exp">
            <h4>Expediente</h4>
            <h5>Consulta Externa</h5>
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
            </div>            
            <div class="col-lg-12 well card sector-exp">
            <h5>Emergencia</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table" id="tbl-emergencia">
                      <thead>
                        <th>Fecha</th>
                        <th>Centro Medico</th>
                        <th>Medico</th>
                        <th>Especialidad</th>
                        <th>Observacion</th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <!-- FAB ICON -->
    <div class="container fab">
      <div class="row">
        <div class="col-lg-11 col-lg-offsset-11"></div>
        <div class="col-lg-1">
          <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-home"></span></a>
          <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
      </div>
    </div>
    <!-- /FAB ICON -->

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/expediente.js"></script>
  </body>
</html>
