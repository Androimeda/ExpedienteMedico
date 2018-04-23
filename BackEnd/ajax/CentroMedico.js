$.ajax({
  url:SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'nombre': null,
    'direccion': null,
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


$.ajax({
  url:SITIO_URL+'/services/CentroMedico.php',
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
  url:SITIO_URL+'/services/CentroMedico.php',
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
  url:SITIO_URL+'/services/CentroMedico.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizar',
    'idCentroMedico': null,
    'pnombre': null,
    'pdireccion': null,
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


$.ajax({
  url:SITIO_URL+'/services/CentroMedico.php',
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


