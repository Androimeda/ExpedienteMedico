$.ajax({
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'urlDocumento': null,
    'idTipo': null,
    'idCentroMedico': null,
    'observacion': null,
    'idExpediente': null,
    'fecha': null,
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
  url:SITIO_URL+'/services/Examen.php',
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorTipo',
    'idTipo': null,
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentro',
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
  url:SITIO_URL+'/services/Examen.php',
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizarTipoExamen',
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idExamen': null,
    'urlDocumento': null,
    'idTipo': null,
    'idCentroMedico': null,
    'observacion': null,
    'idExpediente': null,
    'fecha': null,
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTipoExamen',
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
  url:SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipoExamen',
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


