$.ajax({
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'observacion': null,
    'fechaHoraAtencion': null,
    'idExpediente': null,
    'idMedico': null,
    'idCentroMedico': null,
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroFecha',
    'idCentroMedico': null,
    'fechaHoraAtencion': null,
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idCentroMedico': null,
    'idIngreso': null,
    'idMedico': null,
    'idAtencion': null,
    'idExpediente': null,
    'observacion': null,
    'fechaHoraAtencion': null,
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedicoFecha',
    'fechaHoraAtencion': null,
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
  url:CONST_SITIO_URL+'/services/Emergencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'eliminar',
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


