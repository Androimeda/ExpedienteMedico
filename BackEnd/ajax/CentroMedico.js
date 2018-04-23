$.ajax({
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'nombre': null,
    'idTipoCentro': null,
    'direccion': null,
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
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarTipos',
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
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
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
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'pnombre': null,
    'idTipoCentro': null,
    'idCentroMedico': null,
    'pdireccion': null,
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
  url:CONST_SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorTipo',
    'descripcion': null,
    'idTipoCentro': null,
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


