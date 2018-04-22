$.ajax({
  url:SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idConsultorio': null,
    'idExpediente': null,
    'idMedico': null,
    'fechaHora': null,
    'sintomas': null,
    'diagnostico': null,
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idConsulta': null,
    'idExpediente': null,
    'idConsultorio': null,
    'idMedico': null,
    'fechaHora': null,
    'sintomas': null,
    'diagnostico': null,
    'observ': null,
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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
  url:SITIO_URL+'/services/ConsultaExterna.php',
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


