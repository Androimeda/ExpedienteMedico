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
          
          <ul class="nav navbar-nav navbar-right">
            <li id="nav-item-inicio"><a href="#" onclick="$('#modal-editar').modal('show')">Registrar</a>
            </li>
          </ul>
          <!-- Menu de Administradror
           <ul class="nav navbar-nav navbar-right">
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
            <div class="col-lg-6"></div>
            <div class="col-lg-6 well card">
                <h3>Acceder</h3>
                <div class="col-lg-12">
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


            <!-- Modal -->
            <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Centro</h4>
                  </div>
                  <input type="hidden" value="" id="txt-id-paciente">
                  <div class="modal-body">
                    <table class="table" id="tbl-registrar">
                      <tr>
                        <td>Primer Nombre:</td>
                        <td><input type="text"  class="form-control" id="txt-primer-nombre" placeholder="Primer Nombre:"></td>
                        <td>Segundo Nombre:</td>
                        <td><input type="text"  class="form-control" id="txt-segundo-nombre" placeholder="Segundo Nombre:"></td>
                      </tr>
                      <tr>
                        <td>Primer Apellido:</td>
                        <td><input type="text"  class="form-control" id="txt-primer-apellido" placeholder="Primer Apellido:"></td>
                        <td>Segundo Apellido:</td>
                        <td><input type="text"  class="form-control" id="txt-segundo-apellido" placeholder="Segundo Apellido:"></td>
                      </tr>
                      <tr>
                        <td>Número Identidad:</td>
                        <td colspan="3"><input type="text"  class="form-control" id="txt-no-identidad" placeholder="Número Identidad"></td>
                      </tr>
                      <tr>
                        <td>Sexo:</td>
                        <td colspan="3">
                          <select id="slc-sexo" class="form-control">
                            <option value="" hidden="">Sexo</option>
                            <option value="F">F</option>
                            <option value="M">M</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Pais:</td>
                        <td colspan="3">
                        <select id="slc-pais" class="form-control">
                            <option value="" hidden="">Pais</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Dirección:</td>
                        <td colspan="3"><textarea id="txt-direccion" class="form-control" placeholder="Dirección"></textarea></td>
                      </tr>
                      <tr>
                        <td>Tipo Usuario:</td>
                        <td colspan="3">
                          <select id="slc-tipo-usuario" class="form-control">
                              <option value="" hidden="">Tipo Usuario</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Nombre Centro Médico:</td>
                        <td colspan="3"><input type="text"  class="form-control" id="txt-nombre-centro" placeholder="Nombre Centro Médico"></td>
                      </tr>
                      <tr>
                        <td>Tipo Centro Médico:</td>
                        <td colspan="3">
                        <select id="slc-tipo-centro-medico" class="form-control">
                            <option value="" hidden="">Tipo Centro Médico</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Dirección del centro:</td>
                        <td colspan="3"><textarea id="txt-direccion-centro" class="form-control" placeholder="Dirección"></textarea></td>
                      </tr>
                      <tr>
                        <td>E-mail:</td>
                        <td colspan="3"><input type="text"  class="form-control" id="txt-correo" placeholder="E-mail"></td>
                      </tr>
                      <tr>
                        <td>Contraseña:</td>
                        <td colspan="2"><input type="password"  class="form-control" id="txt-contra" placeholder="Ingrese Contraseña"></td>
                        <td colspan="2"><input type="password"  class="form-control" id="txt-contra2" placeholder="Confirme Contraseña"></td>
                      </tr>
                      <tr>
                        <td colspan="4"><button type="button" class="btn btn-primary btn-block" onclick="registrar()">Registrar</button></td>
                      </tr>
                    </table>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizar()">Guardar Cambios</button>
                  </div> -->
                </div>
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
