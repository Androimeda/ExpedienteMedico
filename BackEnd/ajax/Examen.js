$.ajax({
  url:CONST_SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idCentroMedico': null,
    'fecha': null,
    'urlDocumento': null,
    'idExpediente': null,
    'observacion': null,
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idTipo': null,
    'idCentroMedico': null,
    'fecha': null,
    'urlDocumento': null,
    'idExpediente': null,
    'observacion': null,
    'idExamen': null,
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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
  url:CONST_SITIO_URL+'/services/Examen.php',
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


