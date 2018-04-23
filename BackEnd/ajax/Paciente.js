$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'pNombre': null,
    'sNombre': null,
    'pApellido': null,
    'sApellido': null,
    'direccion': null,
    'noIdentidad': null,
    'idPais': null,
    'sexo': null,
    'correo': null,
    'idTipoSangre': null,
    'idEscolaridad': null,
    'idOcupacion': null,
    'idEstadoCivil': null,
    'idAscendencia': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorApellido',
    'pApellido': null,
    'sApellido': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorNoIdentidad',
    'noIdentidad': null,
    'idPersona': null,
    'idPaciente': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTodos',
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idPaciente': null,
    'pdireccion': null,
    'pcorreo': null,
    'idEscolaridad': null,
    'idOcupacion': null,
    'idEstadoCivil': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorNombre',
    'pNombre': null,
    'sNombre': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


$.ajax({
  url:SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
    'idPaciente': null,
  },
  success:function(respuesta){
    console.log(respuesta);
  },
  error: function(error){
    console.log(error);
  },
  complete: function(){
    //TO-DO
  }
});


