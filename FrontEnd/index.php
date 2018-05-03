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
    <input type="hidden" id="txt-id-centro-medico" value="<?php echo $user["ID_CENTRO_MEDICO"] ?>">
    <div class="container"> 
        <div class="row well card" id="titulo">
            <h1><?php echo $user["CENTRO_MEDICO"] ?></h1>
            <h1>Tablero de Estadísticas</h1>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3 well card"></div> -->
            <div class="col-lg-4 well card">
                <img src="img/estadistica.png" alt="" class="img img-responsive icon-stats" width="50px">
                <h4>Centros Registrados</h4>
                <hr>
                <div class="row number" id="centro">
                    <p></p>
                </div>
            </div>
            <div class="col-lg-4 well card">
                <img src="img/estadistica.png" alt="" class="img img-responsive icon-stats" width="50px">
                <h4>Médicos</h4>
                <hr>
                <div class="row number" id="medicos">
                    <p></p>
                </div>
            </div>
            <div class="col-lg-4 well card">
                <img src="img/top.png" alt="" class="img img-responsive icon-stats" width="50px">
                <h4>Paciente con más consultas</h4>
                <hr>
                <div class="row" id="maximo">
                    <b>Nombre: </b>: <p id="nombre"></p>
                    <b>Total: </b><p id="total"></p>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="./controlador/index.js"></script>
  </body>
</html>
