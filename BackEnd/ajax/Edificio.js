$.ajax({
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'crear',
    'nombre': null,
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
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'actualizarPiso',
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
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'agregarPiso',
    'idEdificio': null,
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


$.ajax({
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPiso',
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
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listarPorCentro',
    'idCentroMedico': null,
    'nombreCentro': null,
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
  url:SITIO_URL+'/services/Edificio.php',
  method:'POST',
  dataType:'JSON',
  data:{
    'accion':'listar',
    'idEdificio': null,
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


