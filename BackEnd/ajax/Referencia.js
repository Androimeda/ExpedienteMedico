$.ajax({
  url:SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'descripcion': null,
    'idMedico': null,
    'idExpediente': null,
    'idCentroMedicoRemite': null,
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
  url:SITIO_URL+'/services/Referencia.php',
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
  url:SITIO_URL+'/services/Referencia.php',
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
  url:SITIO_URL+'/services/Referencia.php',
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
  url:SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedico',
    'idMedico': null,
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
  url:SITIO_URL+'/services/Referencia.php',
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
  url:SITIO_URL+'/services/Referencia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idReferencia': null,
    'descripcion': null,
    'idMedico': null,
    'idExpediente': null,
    'idCentroMedicoRemite': null,
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
  url:SITIO_URL+'/services/Referencia.php',
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
  url:SITIO_URL+'/services/Referencia.php',
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


