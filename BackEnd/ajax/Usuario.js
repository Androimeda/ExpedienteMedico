$.ajax({
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'login',
    'correo': null,
    'contrasena': null,
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
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'registrar',
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


