$.ajax({
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'observacion': null,
    'fechaHoraIngreso': null,
    'fechaHoraAlta': null,
    'idPiso': null,
    'cama': null,
    'idMedico': null,
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorPiso',
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorMedico',
    'idCentroMedico': null,
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorFecha',
    'fechaHoraIngreso': null,
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'darAlta',
    'idIngreso': null,
    'fechaHoraAlta': null,
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
  url:SITIO_URL+'/services/Hospitalizacion.php',
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


