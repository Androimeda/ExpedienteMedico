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
            <h1>Consulta Externa Hoy</h1>
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
                    <th>Editar</th>
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

    
    <!-- Modal -->
    <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Consulta</h4>
          </div>
          <input type="hidden" value="" id="txt-id-consulta">
          <input type="hidden" value="" id="txt-id-expediente">
          <input type="hidden" value="" id="txt-id-medico">
          <div class="modal-body">
            <table class="table">
              <tr>
                <td>Nombre</td>
                <td><input type="text" id="txt-nombre" disabled="disabled" class="form-control"></td>
              </tr>
              <tr>
                <td>No Identidad</td>
                <td><input type="text" id="txt-noidentidad" disabled="disabled" class="form-control"></td>
              </tr>
              <tr>
                <td>Médico</td>
                <td><input type="text" id="txt-medico" disabled="disabled" class="form-control"></td>
              </tr>              
              <tr>
                <td>Especialidad</td>
                <td><input type="text" id="txt-especialidad" disabled="disabled" class="form-control"></td>
              </tr>
              <tr>
                <td>Consultorio</td>
                <td><input type="text" id="txt-consultorio" disabled="disabled" class="form-control"></td>
              </tr>
              <tr>
                <td>Fecha</td>
                <td><input type="text" id="txt-fecha" disabled="disabled" class="form-control"></td>
              </tr>
              <tr>
                <td>Síntomas</td>
                <td>
                  <textarea class="form-control" id="txt-sintomas"></textarea>
                </td>
              </tr>              
              <tr>
                <td>Diagnóstico</td>
                <td>
                  <textarea class="form-control" id="txt-diagnostico"></textarea>
                </td>
              </tr>
              <tr>
                <td>Observación</td>
                <td>
                  <textarea class="form-control" id="txt-observacion"></textarea>
                </td>
              </tr>

            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="actualizar()">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- FAB ICON -->
    <div class="container fab">
      <div class="row">
        <div class="col-lg-11"></div>
        <div class="col-lg-1">
          <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
      </div>
    </div>
    <!-- /FAB ICON -->



    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/consulta-hoy.js"></script>
  </body>
</html>
