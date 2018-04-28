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
          <h1>Registro de Pacientes</h1>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <h5>Foto</h5>
            <img src="./img/user.png" alt="Foto" class="img img-responsive img-circle">
            <button type="button" class="btn btn-block btn-primary">Foto</button>
          </div>
          <div class="col-lg-9">
            <h5>Datos Personales</h5>
            <table class="table">
              <tr>
                <td>Nombre: </td>
                <td><input class="form-control" type="text" id="txt-pnombre" placeholder="Primer Nombre"></td>
                <td><input class="form-control" type="text" id="txt-snombre" placeholder="Segundo Nombre"></td>
              </tr>
              <tr>
                <td>Apellidos: </td>
                <td><input class="form-control" type="text" id="txt-papellido" placeholder="Primer Apellido"></td>
                <td><input class="form-control" type="text" id="txt-sapellido" placeholder="Segundo Apellido"></td>
              </tr>
              <tr>
                <td>Identidad: </td>
                <td colspan="2"><input class="form-control" type="text" id="txt-noidentidad" placeholder="Número de Identidad"></td>
              </tr>
              <tr>
                <td>Sexo:</td>
                <td><input  id="rd-sex1" type="radio" name="rd-sexo" value="F"><label for="rd-sex1">Femenino</label></td>
                <td><input id="rd-sex2" type="radio" name="rd-sexo" value="M"><label for="rd-sex2">Masculino</label></td>
              </tr>
              <tr>
                <td>País</td>
                <td colspan="2">
                  <select class ="form-control" id="slc-pais">
                    <option value="" hidden="">País</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Estado Civil: </td>
                <td colspan="2">
                  <select class ="form-control" id="slc-estado-civil">
                    <option value="" hidden="">Estado Civil</option>
                  </select>
                </td>
              </tr>              
              <tr>
                <td>Ocupación: </td>
                <td colspan="2">
                  <select class ="form-control" id="slc-ocupacion">
                    <option value="" hidden="">Ocupación</option>
                  </select>
                </td>
              </tr>
              <tr>              
              <tr>
                <td>Escolaridad: </td>
                <td colspan="2">
                  <select class ="form-control" id="slc-escolaridad">
                    <option value="" hidden="">Escolaridad</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Tipo Sangre: </td>
                <td colspan="2">
                  <select class ="form-control" id="slc-tipo-sangre">
                    <option value="" hidden="">Tipo Sangre</option>
                  </select>
                </td>
              </tr>
              <tr>
              <tr>
                <td>Ascendencia: </td>
                <td colspan="2">
                  <select class ="form-control" id="slc-ascendencia">
                    <option value="" hidden="">Ascendencia</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>E-mail: </td>
                <td colspan="2"><input class="form-control" type="email" placeholder="Email"></td>
              
              </tr>
              <tr>
                <td colspan="3">
                  <button type="button" class="btn btn-block btn-primary">Registrar Paciente</button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/agregar-paciente.js"></script>
  </body>
</html>
