$.ajax({
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'idPiso': null,
    'idMedico': null,
    'fechaHoraAlta': null,
    'fechaHoraIngreso': null,
    'observacion': null,
    'idExpediente': null,
    'cama': null,
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idPiso': null,
    'idIngreso': null,
    'idMedico': null,
    'fechaHoraIngreso': null,
    'observacion': null,
    'cama': null,
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorFecha',
    'idCentroMedico': null,
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'darAlta',
    'fechaHoraAlta': null,
    'idIngreso': null,
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
  url:CONST_SITIO_URL+'/services/Hospitalizacion.php',
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


