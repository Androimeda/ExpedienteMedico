$.ajax({
  url:SITIO_URL+'/services/Cirugia.php',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarCirugia',
    'idIngreso': null,
    'idTipoCirugia': null,
    'idMedico': null,
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
  url:SITIO_URL+'/services/Cirugia.php',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipoCirugia',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroFecha',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizarTipoCirugia',
    'descripcion': null,
    'idPiso': null,
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
  url:SITIO_URL+'/services/Cirugia.php',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedicoFecha',
    'idMedico': null,
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentroMedico',
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
  url:SITIO_URL+'/services/Cirugia.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarTipoCirugia',
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


