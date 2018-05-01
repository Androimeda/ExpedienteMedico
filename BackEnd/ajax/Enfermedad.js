$.ajax({
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idTipoEnfermedad': null,
    'enfermedad': null,
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTipoEnfermedad',
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorTipo',
    'idTipoEnfermedad': null,
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'quitarDiagnostico',
    'idConsulta': null,
    'idExpediente': null,
    'idEnfermedad': null,
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizarTipoEnfermedad',
    'descripcion': null,
    'idTipoEnfermedad': null,
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idTipoEnfermedad': null,
    'penfermedad': null,
    'idEnfermedad': null,
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipoEnfermedad',
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
  url:CONST_SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'diagnosticarEnfermedad',
    'idConsulta': null,
    'idExpediente': null,
    'idMedico': null,
    'idEnfermedad': null,
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


