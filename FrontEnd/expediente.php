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
            <div class="col-lg-4 well card">
                <h5>Buscar Expediente</h5>
                <table class="table">
                    <tr>
                        <td>No de indentidad</td>
                        <td><input type="text" placeholder="Ingresar" class="form-control" id="txt-noidentidad"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-8 well card">
            <h5>Expediente</h5>
                
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/expediente.js"></script>
  </body>
</html>
