$.ajax({
  url:CONST_SITIO_URL+'/services/Estadisticas.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'medicos',
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
  url:CONST_SITIO_URL+'/services/Estadisticas.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'centros',
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
  url:CONST_SITIO_URL+'/services/Estadisticas.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'pacienteMax',
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


