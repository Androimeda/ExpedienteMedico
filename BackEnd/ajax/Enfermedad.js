$.ajax({
  url:SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'enfermedad': null,
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
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'quitarDiagnostico',
    'idEnfermedad': null,
    'idExpediente': null,
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


$.ajax({
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idEnfermedad': null,
    'penfermedad': null,
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
  url:SITIO_URL+'/services/Enfermedad.php',
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
  url:SITIO_URL+'/services/Enfermedad.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'diagnosticarEnfermedad',
    'idEnfermedad': null,
    'idMedico': null,
    'fechaDiagnostico': null,
    'idExpediente': null,
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


