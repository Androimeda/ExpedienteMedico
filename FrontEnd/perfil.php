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
    <?php include("nav-bar.php"); ?>
    <!-- Fin Navbar -->
    <div class="container">
        <div class="col-lg-8 well card">
            <div class="row">
                <h4>Datos de Administrador</h4>
                <table class="table">
                    <tr>
                        <td>Nombre: </td>
                        <td><?php echo $user["P_NOMBRE"]." ".$user["S_NOMBRE"]; ?></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><?php echo $user["P_APELLIDO"]." ".$user["S_APELLIDO"]; ?></td>
                    </tr>
                    <tr>
                        <td>Dirección:</td>
                        <td><?php echo $user["DIRECCION"]; ?></td>
                    </tr>
                    <tr>
                        <td>No identidad:</td>
                        <td><?php echo $user["NO_IDENTIDAD"]; ?></td>
                    </tr>
                    <tr>
                        <td>País</td>
                        <td><?php echo $user["PAIS"]; ?></td>
                    </tr>
                    <tr>
                        <td>Correo:</td>
                        <td><?php echo $user["CORREO"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-lg-4 well card">
            <h4>Datos del Centro</h4>
            <table class="table">
                <tr>
                    <td>Nombre del Centro:</td>
                    <td><?php echo $user["CENTRO_MEDICO"]; ?></td>
                    <input type="hidden" id="txt-id-centro" value="<?php echo $user["ID_CENTRO_MEDICO"]; ?>">
                </tr>
                <tr>
                    <td>Tipo de Centro:</td>
                    <td><?php echo $user["TIPO_CENTRO"]; ?></td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td><?php echo $user["DIRECCION"]; ?></td>
                </tr>
                <tr>
                    <td>Horario:</td>
                    <td><?php echo $user["HORARIO"]; ?></td>
                </tr>
            </table>
            <h4>Teléfonos</h4>
            <table class="table" id="tbl-telefono">
                <thead>
                    <th>Teléfono</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script src="./js/config.js  "></script>
    <script src="controlador/perfil.js"></script>
  </body>
</html>
