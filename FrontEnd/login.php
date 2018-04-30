<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        header('location: index.php');
    }
?>
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
  <body class="login">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="./img/icon.png" class="img img-responsive logo"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <!-- <li id="nav-item-inicio"><a href="index.php">Inicio</a></li> -->

            <!-- Pacientes -->
<!--             <li class="dropdown" id="nav-item-paciente">
              <a href="#" 
                class="dropdown-toggle" 
                data-toggle="dropdown" 
                role="button" 
                aria-haspopup="true" 
                aria-expanded="false">Pacientes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Gestiones</li>
                <li><a href="expediente.php
                  ">Ver Expediente</a></li>
                <li><a href="./natalidad.php">Natalidad</a></li>
                <li><a href="./defuncion.php">Defunción</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Administración</li>
                <li><a href="./agregar-paciente.php">Agregar Paciente</a></li>
                <li><a href="./admin-paciente.php">Administrar Pacientes</a></li>
              </ul>
            </li> -->

          </ul>
          
          <!-- Menu de Administradror -->
<!--           <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" id="nav-item-admin">
              <a href="#" 
              class="dropdown-toggle" 
              data-toggle="dropdown" 
              role="button" 
              aria-haspopup="true" 
              aria-expanded="false">
              Administrador<span class="caret"></span>
              <img src="img/user.png" class="img img-responsive img-circle user-img" alt="">
            </a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Información</li>
                <li><a href="./perfil.php">Perfil</a></li>
                <li><a href="./datos-centro.php">Datos del centro</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Ajustes</li>
                <li><a href="./preferencias.php">Preferencias</a></li>
                <li><a href="#">Manual de Usuario</a></li>
                <li><a href="./acerca-de.php">Acerca de</a></li>
              </ul>
            </li>
          </ul> -->
       </div>  
    </nav>
    <!-- Fin Navbar -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12" >
                <div class="col-lg-6">
                    <img src="./img/icon.png" class="img img-responsive" width="300px">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7"></div>
            <div class="col-lg-5 well card">
                <h3>Acceder</h3>
                <div class="col-lg-12 well card-bg">
                    <table class="table">
                        <tr>
                            <td>Correo Electrónico</td>
                            <td><input type="email"  id="txt-email" value="" class="form-control" placeholder="E-mail"></td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="password"  id="txt-password" value="" class="form-control" placeholder="Contraseña"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="button" onclick="login()" class="btn btn-primary btn-block">Acceder</button>
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
    <script src="./controlador/login.js"></script>
  </body>
</html>
