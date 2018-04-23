$.ajax({
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarOcupacion',
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
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarAscendencia',
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
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarEstadoCivil',
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
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPais',
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
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipoSangre',
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
  url:CONST_SITIO_URL+'/services/Persona.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarEscolaridad',
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


