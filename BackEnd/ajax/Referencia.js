$.ajax({
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'descripcion': null,
    'idCentroMedicoRecibe': null,
    'idExpediente': null,
    'idCentroMedicoRemite': null,
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPaciente',
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarRecibidas',
    'idCentroMedicoRecibe': null,
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroRemite',
    'idCentroMedicoRemite': null,
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedico',
    'idCentroMedicoRemite': null,
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idCentroMedicoRecibe': null,
    'idMedico': null,
    'idReferencia': null,
    'idExpediente': null,
    'idCentroMedicoRemite': null,
    'descripcion': null,
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
  url:CONST_SITIO_URL+'/services/Referencia.php',
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


$.ajax({
  url:CONST_SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
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


