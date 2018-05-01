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
    <div class="row well card">
      <div class="col-lg-12" id="titulo">
        <h1><?php echo $user["CENTRO_MEDICO"]?></h1>
        <input type="hidden" value="<?php echo $user["ID_CENTRO_MEDICO"]; ?>" id="txt-id-centro-medico">
        <h1>Administración de Edificios</h1>
      </div>
    </div>
    <div class="row">
       <div class="col-lg-6">
         <div class="col-lg-12 well card">
             <h4>Edificio</h4>
             <div class="row">
                 <div class="col-lg-12">
                     <table class="table" id="tbl-edificio">
                         <thead>
                             <th>Código</th>
                             <th>Edificio</th>
                             <th># Pisos</th>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>
                 </div>
                 <h4>Agregar:</h4>
                 <div class="col-lg-12">
                     <table class="table">
                         <tr>
                             <td><input type="text" class="form-control" placeholder="Nombre Edificio" id="txt-nombre-edificio"></td>
                             <td><button type="button" class="btn btn-primary" onclick="agregaEdificio()">Agregar Edificio</button></td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div>
       </div>
        

        <div class="col-lg-6">
          <div class="col-lg-6"></div>
          <div class="col-lg-12 well card">
              <h4>Filtrar Pisos</h4>
              <div class="row">
                  <table class="table">
                      <tr>
                          <td>Edificio: </td>
                          <td>
                              <select id="slc-edificio" class="form-control">
                              <option value="" hidden="">Edificio</option>
                          </select>
                      </td>
                      </tr>
                  </table>
              </div>
              <h4>Pisos</h4>
              <div class="row">
                  <div class="col-lg-12">
                      <table class="table" id="tbl-piso">
                          <thead>
                              <th>Código</th>
                              <th>Nombre Piso</th>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                  </div>
                  <h4>Agregar:</h4>
                  <div class="col-lg-12">
                      <table class="table">
                          <tr>
                              <td><input type="text" class="form-control" placeholder="Nombre Piso" id="txt-nombre-piso"></td>
                              <td><button type="button" class="btn btn-primary" onclick="agregarPiso()">Agregar Piso</button></td>
                          </tr>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-lg-12 well card">
            <div class="col-lg-12">
              <h4>Filtrar Consultorios</h4>
              <div class="row">
                  <table class="table">
                      <tr>
                          <td>Piso: </td>
                          <td>
                              <select id="slc-piso" class="form-control">
                              <option value="" hidden="">Piso</option>
                          </select>
                      </td>
                      </tr>
                  </table>
              </div>
              <h4>Consultorios</h4>
              <table class="table" id="tbl-consultorio">
                <thead>
                  <th>Consultorio</th>
                </thead>
                <tbody>
                </tbody>
              </table>
              <div class="row-lg-12">
                <button type="button" class="btn btn-primary" onclick="agregarConsultorio()">Agregar Consultorio</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div> <!-- /container -->
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <script src="./js/config.js  "></script>
  <script src="controlador/edificio.js"></script>
  </body>
</html>
