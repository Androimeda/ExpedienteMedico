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
                  <td class="td-info" id="td-nombre"></td>
                  <td>Apellidos: </td>
                  <td class="td-info" id="td-apellido"></td>
                </tr>
                <tr>
                  <td>No Identidad</td>
                  <td class="td-info" id="td-noidentidad"></td>
                  <td>Tipo Sanguíneo</td>
                  <td class="td-info" id="td-tipo-sangre"></td>
                </tr>
                <tr>
                  <td>Fecha Nacimiento: </td>
                  <td class="td-info" id="td-fecha"></td>
                  <td>Nacionalidad: </td>
                  <td class="td-info" id="td-nacionalidad"></td>
                </tr>
                <tr>
                  <td>Ascendencia: </td>
                  <td class="td-info" id="td-ascendencia"></td>
                  <td>Estado Civil</td>
                  <td class="td-info" id="td-estado-civil"></td>
                </tr>
                <tr>
                  <td>Madre</td>
                  <td class="td-info" id="td-madre"></td>
                  <td>Padre</td>
                  <td class="td-info" id="td-padre"></td>
                </tr>
                <tr>
                  <td>Dirección</td>
                  <td class="td-info" id="td-direccion"></td>
                </tr>
              </table>
            </div>
            <div class="col-lg-12 well card sector-exp">
            <h4 id="div-consulta">Expediente</h4>
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
            <h5 id="div-emergencia">Emergencia</h5>
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
            <h5 id="div-hospitalizacion">Hospitalizacion</h5>
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
            <h5 id="div-cirugia">Cirugía</h5>
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
            <h5 id="div-enfermedad">Enfermedad</h5>
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
            <div class="col-lg-12 well card sector-exp">
            <h5 id="div-tratamiento">Tratamiento</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table" id="tbl-tratamiento">
                      <thead>
                        <th>Fecha Indicación</th>
                        <th>Tratamiento</th>
                        <th>Dosis</th>
                        <th>Intervalo</th>
                        <th>Duración</th>
                        <th>Via Suministro</th>
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
          <a href="#div-consulta" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Consultas</a>
          <a href="#div-emergencia" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Emergencias</a>
          <a href="#div-hospitalizacion" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Hospitalizacion</a>
          <a href="#div-cirugia" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Cirugía</a>
          <a href="#div-enfermedad" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Enfermedad</a>
          <a href="#div-tratamiento" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp; Tratamiento</a>
          
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
