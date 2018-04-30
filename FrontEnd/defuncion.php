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
                <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
                <h1>Registro de Defunciones</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-12 well card">
                    <h4>Buscar Paciente</h4>
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
                            <th>Seleccionar</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 well card">
                <h4>Datos Defunción:</h4>
                <table class="table">
                    <tr>
                        <td>Expediente</td>
                        <td colspan="2"><input type="text" disabled="disabled" class="form-control" id="txt-id-expediente"></td>
                    </tr>
                    <tr>
                        <td>Causa:</td>
                        <td colspan="2">
                            <textarea id="txt-observacion-causa" class="form-control">
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha/Hora</td>
                        <td><input type="date" id="txt-fecha" class="form-control"></td>
                        <td><input type="time" id="txt-hora" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="button" class="btn btn-primary btn-block" onclick="registrar()">Registrar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/defuncion.js"></script>
  </body>
</html>
