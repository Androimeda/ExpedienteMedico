$.ajax({
  url:CONST_SITIO_URL+'/services/HojaTrabajoSocial.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'descripcion': null,
    'idCentroMedico': null,
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
  url:CONST_SITIO_URL+'/services/HojaTrabajoSocial.php',
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
  url:CONST_SITIO_URL+'/services/HojaTrabajoSocial.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTodos',
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
  url:CONST_SITIO_URL+'/services/HojaTrabajoSocial.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'descripcion': null,
    'idExpediente': null,
    'idCentroMedico': null,
    'idTS': null,
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


