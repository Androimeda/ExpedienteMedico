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
            <li class="dropdown-header">Emergencias</li>
            <li><a href="./emergencia-hoy.php">Listado de hoy</a></li>
            <li><a href="./emergencia-fecha.php">Listar por fecha</a></li>
            <li><a href="./agregar-emergencia.php">Agrega Emergencia</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Hospitalizacion</li>
            <li><a href="./dar-alta.php">Dar Alta</a></li>
            <li><a href="./hospitalizar.php">Hospitalizar Paciente</a></li>
            <li><a href="./listar-hospitalizados.php">Listado de Hospitalizaciones</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Consulta Externa</li>
            <li><a href="./agregar-consulta.php">Agregar Consulta</a></li>
            <li><a href="./consulta-hoy.php">Consultas de Hoy</a></li>
            <li><a href="./agenda-consultorio.php">Agenda Consultorios</a></li>
          </ul>
        </li>
        <!-- Edificios -->
        <li id="nav-item-edificio"><a href="./edificio.php">Edificios</a></li>
        <!-- Tratamientos -->
        <li class="dropdown" id="nav-item-tratamiento">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-haspopup="true" 
            aria-expanded="false">Medicina<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Tratamiento</li>
            <li><a href="./gestionar-tratamiento.php">Gestionar Tratamiento</a></li>
            <li><a href="./gestionar-via-suministro.php">Gestionar Via Suministro</a></li>
            <li><a href="./gestionar-tipo-enfermedad.php">Gestionar Tipo de Tratamiento</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Enfermedad</li>
            <li><a href="./gestionar-enfermedad.php">Gestionar Enfermedad</a></li>
            <li><a href="./gestionar-tipo-enfermedad.php">Gestionar Tipo Enfermedad</a></li>
          </ul>
        </li>
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
            <li><a href="./datos-centro.php">Datos del centro</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Ajustes</li>
            <li><a href="./preferencias.php">Preferencias</a></li>
            <li><a href="#">Manual de Usuario</a></li>
            <li><a href="./acerca-de.php">Acerca de</a></li>
          </ul>
   </div>       
</nav>