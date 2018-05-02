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
    <div class="container" id="titulo"> 
        <div class="row  well card" >
            <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
            <h1>Gestión de Enfermedades (Catálogo)</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 well card">
                <h1>Tipos de Enfermedades</h1>
                <div class="col-lg-12">
                    <table class="table" id="tbl-tipo-enfermedad">
                        <thead>
                            <th>Código</th>
                            <th>Tipo Enfermedad</th>
                            <th>Cantidad</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <h4>Agregar</h4>
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td><input type="text" id="txt-tipo-enfermedad" value="" class="form-control" placeholder="Ingresar"></td>
                            <td><button type="button" class="btn btn-primary" onclick="agregarTipo()">Agregar</button></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 well card">
                <h1>Filtrar</h1>
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td>Tipo:</td>
                            <td>
                                <select id="slc-tipo-enfermedad" class="form-control">
                                    <option value="" hidden="">Tipo Enfermedad</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <h4>Enfermedades</h4>
                <div class="col-lg-12">
                    <table class="table" id="tbl-enfermedad">
                        <thead>
                            <th>Código</th>
                            <th>Enfermedad</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <h4>Agregar</h4>
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td><input type="text" id="txt-enfermedad" value="" class="form-control" placeholder="Ingresar"></td>
                            <td><button type="button" class="btn btn-primary" onclick="agregarEnfermedad()">Agregar Enfermedad</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/gestionar-enfermedad.js"></script>
  </body>
</html>
