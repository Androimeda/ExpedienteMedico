$.ajax({
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idTipoSangre': null,
    'idPais': null,
    'noIdentidad': null,
    'pNombre': null,
    'idAscendencia': null,
    'sNombre': null,
    'sApellido': null,
    'idEstadoCivil': null,
    'direccion': null,
    'correo': null,
    'idOcupacion': null,
    'idEscolaridad': null,
    'pApellido': null,
    'sexo': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarNatalidad',
    'idMadre': null,
    'ordenPartoMultiple': null,
    'idPadre': null,
    'idExpediente': null,
    'idCentroMedico': null,
    'fechaHora': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorApellido',
    'sApellido': null,
    'pApellido': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarDefuncion',
    'observacionCausa': null,
    'idExpediente': null,
    'fechaHora': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'buscarPorNoIdentidad',
    'idPersona': null,
    'idPaciente': null,
    'noIdentidad': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'direccion': null,
    'idOcupacion': null,
    'idPaciente': null,
    'idEstadoCivil': null,
    'correo': null,
    'idEscolaridad': null,
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
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
  url:CONST_SITIO_URL+'/services/Paciente.php',
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


