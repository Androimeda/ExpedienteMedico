$.ajax({
  url:CONST_SITIO_URL+'/services/Usuario.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'login',
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


