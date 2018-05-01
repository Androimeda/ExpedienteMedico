$.ajax({
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idMedico': null,
    'idConsultorio': null,
    'diagnostico': null,
    'sintomas': null,
    'idExpediente': null,
    'observacion': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPaciente',
    'idExpediente': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorHoy',
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedicoFecha',
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorConsultorio',
    'idConsultorio': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedico',
    'idMedico': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idMedico': null,
    'idConsultorio': null,
    'diagnostico': null,
    'idConsulta': null,
    'sintomas': null,
    'idExpediente': null,
    'observacion': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedico',
    'idCentroMedico': null,
    'nombreCentro': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarDiariasPorConsultorio',
    'idConsultorio': null,
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
  url:CONST_SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
    'idConsulta': null,
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


