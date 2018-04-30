<?php include("sesion.php"); ?>
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
            <div class="col-lg-6 well card">
                <h4>Buscar Expediente</h4>
                <table class="table" id="tbl-busqueda">
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
            <div class="col-lg-6 well card">
              <h4>Datos Personales</h4>
              <table class="table" id="tbl-info">
                <tr>
                  <td>Nombre: </td>
                  <td id="td-nombre"></td>
                  <td>Apellidos: </td>
                  <td id="td-apellido"></td>
                </tr>
                <tr>
                  <td>No Identidad</td>
                  <td id="td-noidentidad"></td>
                  <td>Tipo Sanguíneo</td>
                  <td id="td-tipo-sangre"></td>
                </tr>
                <tr>
                  <td>Fecha Nacimiento: </td>
                  <td id="td-fecha"></td>
                  <td>Nacionalidad: </td>
                  <td id="td-nacionalidad"></td>
                </tr>
                <tr>
                  <td>Ascendencia: </td>
                  <td id="td-ascendencia"></td>
                  <td>Estado Civil</td>
                  <td id="td-estado-civil"></td>
                </tr>
                <tr>
                  <td>Madre</td>
                  <td id="td-madre"></td>
                  <td>Padre</td>
                  <td id="td-padre"></td>
                </tr>
                <tr>
                  <td>Dirección</td>
                  <td id="td-direccion"></td>
                </tr>
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
            <div class="col-lg-12 well card sector-exp">
            <h5>Hospitalizacion</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table" id="tbl-hospitalizacion">
                      <thead>
                        <th>Centro Medico</th>
                        <th>Sala</th>
                        <th>Cama</th>
                        <th>Médico</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Alta</th>
                        <th>Observación</th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>            
            <div class="col-lg-12 well card sector-exp">
            <h5>Cirugía</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table" id="tbl-cirugia">
                      <thead>
                        <th>Centro Medico</th>
                        <th>Médico</th>
                        <th>Fecha/Hora</th>
                        <th>Cirugía</th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>            
            <div class="col-lg-12 well card sector-exp">
            <h5>Enfermedad</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table" id="tbl-enfermedad">
                      <thead>
                        <th>Fecha Diagnóstico</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                        <th>Diagnóstico</th>
                        <th>Padece?</th>
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
        <div class="col-lg-12">
          <a href="#tbl-consulta" class="btn btn-success"><span class="glyphicon glyphicon-cloud"></span>&nbsp; Consultas</a>
          <a href="#tbl-emergencia" class="btn btn-success"><span class="glyphicon glyphicon-cloud"></span>&nbsp; Emergencias</a>
          <a href="#tbl-hospitalizacion" class="btn btn-success"><span class="glyphicon glyphicon-cloud"></span>&nbsp; Hospitalizacion</a>
          <a href="#tbl-cirugia" class="btn btn-success"><span class="glyphicon glyphicon-cloud"></span>&nbsp; Cirugía</a>
          <a href="#tbl-enfermedad" class="btn btn-success"><span class="glyphicon glyphicon-cloud"></span>&nbsp; Enfermedad</a>
          
          <a href="#tbl-busqueda" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span> &nbsp; Datos</a>
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
