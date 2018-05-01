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
        <li id="nav-item-inicio"><a href="index.php">Inicio</a></li>
        <!-- Pacientes -->
        <li class="dropdown" id="nav-item-paciente">
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
        </li>
        <!-- Medicos -->
        <li class="dropdown" id="nav-item-medico">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Médicos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Gestiones</li>
            <li><a href="./directorio-medico.php">Directorio de médicos</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Administración</li>
            <li><a href="./agregar-medico.php">Agregar Médico</a></li>
            <li><a href="./vincular-medico.php">Víncular Consultorio</a></li>
          </ul>
        </li>
        <!-- Paramedicos-->
        <li class="dropdown" id="nav-item-paramedico">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Paramédicos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Gestiones</li>
            <li><a href="./directorio-paramedico.php">Directorio de paramédicos</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Administración</li>
            <li><a href="./agregar-paramedico.php">Agregar Paramédico</a></li>
          </ul>
        </li>
        <!-- Consultas -->
        <li class="dropdown" id="nav-item-consulta">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Consultas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Hospitalizacion</li>
            <li><a href="./dar-alta.php">Dar Alta</a></li>
            <li><a href="./hospitalizar.php">Hospitalizar Paciente</a></li>
            <li><a href="./listar-hospitalizados.php">Listado de Hospitalizaciones</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Consulta Externa</li>
            <li><a href="./agregar-consulta.php">Agregar Consulta</a></li>
            <li><a href="./consulta-hoy.php">Consultas de Hoy</a></li>
          </ul>
        </li>
        <!-- Emeregencias -->
        <li class="dropdown" id="nav-item-emergencia">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Emergencia<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Atención Pre-Hospitalaria</li>
            <li><a href="./atencion-hoy.php">Listado de hoy</a></li>
            <li><a href="./atencion-fecha.php">Listar por fecha</a></li>
            <li><a href="./agregar-atencion.php">Agregar APH</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Emergencias</li>
            <li><a href="./emergencia-hoy.php">Listado de hoy</a></li>
            <li><a href="./emergencia-fecha.php">Listar por fecha</a></li>
            <li><a href="./agregar-emergencia.php">Agrega Emergencia</a></li>
          </ul>
        </li>
        <!-- Edificios -->
        <li id="nav-item-edificio"><a href="./edificio.php">Edificios</a></li>
        <li id="nav-item-medicina"><a href="./gestionar-enfermedad.php">Enfermedad</a></li>
        <!-- Tratamientos -->
<!--         <li class="dropdown" id="nav-item-medicina">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Medicina<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Tratamiento</li>
            <li><a href="./indicar-tratamiento.php">Indicar Tratamiento</a></li>
            <li><a href="./gestionar-tratamiento.php">Gestionar Tratamiento</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Enfermedad</li>
            <li><a href="./diagnosticar-enfermedad.php">Diagnosticar Enfermedad</a></li>
            <li><a href="./gestionar-enfermedad.php">Gestionar Enfermedad</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- Menu de Administradror -->
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
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Ayuda</li>
            <li><a href="#">Manual de Usuario</a></li>
            <li><a href="./acerca-de.php">Acerca de</a></li>
            <li><a href="./logout.php" class="logout">Cerrar Sesión</a></li>
          </ul>
   </div>       
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offsset-8">
    </div>
    <div class="col-lg-4 well card" id="card-info">
     <div class="row">
       <div class="col-lg-9">
         <p>Centro Médico: <?php echo $user["CENTRO_MEDICO"] ?></p>
         <p>Dirección: <?php echo $user['DIRECCION_CENTRO'] ?></p>
       </div>
       <div class="col-lg-3">
         <img src="./img/foto-centro.png" alt="Centro" class="img img-responsive img-rounded foto-centro">
       </div>
     </div>
    </div>
  </div>
 </div>