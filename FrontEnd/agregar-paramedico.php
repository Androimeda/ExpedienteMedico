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
    <div class="container well card">   
      <div class="row">
        <div class="col-lg-12" id="titulo">
          <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
          <h1>Registro de Paramédicos</h1>
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
                <td>Licencia: </td>
                <td colspan="2"><input class="form-control" type="text" id="txt-licencia" placeholder="Número de Licencia"></td>
              </tr>
              <tr>
                <td>Dirección: </td>
                <td colspan="2">
                  <textarea id="txt-direccion" class="form-control" maxlength="50" rows="1" placeholder="Dirección"></textarea>
                </td>
              </tr>
              <tr>
                <td>Sexo:</td>
                <td><input  id="rbt-sex1" type="radio" name="rbt-sexo" value="F"><label for="rbt-sex1">Femenino</label></td>
                <td><input id="rbt-sex2" type="radio" name="rbt-sexo" value="M"><label for="rbt-sex2">Masculino</label></td>
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
                <td>E-mail: </td>
                <td colspan="2"><input id="txt-email" class="form-control" type="email" placeholder="Email"></td>
              
              </tr>
              <tr>
                <td colspan="3">
                  <button type="button" class="btn btn-block btn-primary" onclick="registrar()">Registrar Paramédico</button>
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
    <script src="controlador/agregar-paramedico.js"></script>
  </body>
</html>
